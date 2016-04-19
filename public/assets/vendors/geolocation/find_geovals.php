<?php 
	$transaddress	= mysql_real_escape_string(trim($_REQUEST['transaddress']));
	$address	= mysql_real_escape_string(trim($_REQUEST['address']));
	$area		= mysql_real_escape_string(trim($_REQUEST['area']));
	$city		= mysql_real_escape_string(trim($_REQUEST['city']));
	$country	= mysql_real_escape_string(trim($_REQUEST['country']));
	$countrycode= mysql_real_escape_string(trim($_REQUEST['countrycode']));
	$geoloclat	= mysql_real_escape_string(trim($_REQUEST['geoloclat']));
	$geoloclng	= mysql_real_escape_string(trim($_REQUEST['geoloclng']));
	$nomos		= mysql_real_escape_string(trim($_REQUEST['nomos']));
	$number		= mysql_real_escape_string(trim($_REQUEST['number']));
	$postcode	= mysql_real_escape_string(trim($_REQUEST['postcode']));

	$ret_arr = array();
	$ret_arr['country_code']= $countrycode;
	$ret_arr['postcode'] 	= $postcode;
	$ret_arr['area'] 		= $area;
	$ret_arr['geoloclat'] 	= $geoloclat;
	$ret_arr['geoloclng'] 	= $geoloclng;
	$ret_arr['transaddress']= $transaddress;

	if($countrycode=='GR'){
		$query = 'select d22.p01 as d22p01, d22.p02 as d22p02,
						 d27.p01 as d27p01, d27.p02 as d27p02
					from d22 
					join d27 on d22.p03=d27.p01
				   where d22.p04<="'.$postcode.'" 
					 and d22.p05>="'.$postcode.'"';
		pegasus_mysql_use($query, $d22_d27);
		$ret_arr['city_code'] 	= $d22_d27['d22p01'];
		$ret_arr['city'] 		= $d22_d27['d22p02'];
		$ret_arr['state_code']	= $d22_d27['d27p01'];
		$ret_arr['state']		= $d22_d27['d27p02'];
		$ret_arr['query']		= $query;
	}else{
		$ret_arr['city_code'] 	= 0;
		$ret_arr['state_code']	= 0;
	}
	echo json_encode($ret_arr);
?>