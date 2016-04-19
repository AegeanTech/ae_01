<?php
	$query	= mysql_real_escape_string(trim($_REQUEST['query']));
	$geoCodingRes = kernel_googleGeoCoding($query);
	
	$ret_data = array();
	foreach ($geoCodingRes["data"] as $key => $oneRec) {
		$tmpAr	= array( 'address' => "", 'area' => "", 'city' =>  "", 'nomos' => "" , 'postcode' => "", 'country' => "");
		$fullname	=  $oneRec["formatted_address"];
		$streetnumber = '';
		foreach ( $oneRec["address_components"] as $subkey => $value) {
			switch ($value["types"]['0']) {
				case "route": //Οδός
					$tmpAr['address'] =  $value["long_name"];
					break;
				case "administrative_area_level_1": //Οδός
					if(empty($tmpAr['address'])) 
						$tmpAr['address'] =  $value["long_name"];
					break;
				case "street_number": //αριθμός
					$tmpAr['number'] =  $value["long_name"];
					break;
				case "locality": //περιοχή
					$tmpAr['area'] =  $value["long_name"];
					break;
				case "administrative_area_level_5": //Πόλη
					$tmpAr['city'] =  $value["long_name"];
					break;
				case "point_of_interest": //Σημείο ενδιαφέροντος
					$tmpAr['point_of_interest'] = $value["long_name"];
					break;
				case "premise": 
					if(empty($tmpAr['point_of_interest']))
						$tmpAr['point_of_interest'] =   $value["long_name"];
					break;
				case "postal_code": //Τ.Κ.
					$tmpAr['postcode'] =  str_replace(' ','', $value["long_name"]);
					break;
				case "country": //Χώρα
					$tmpAr['country'] =   $value["long_name"];
					$tmpAr['countrycode'] =   $value["short_name"];
					break;
				default:
					break;
			}
		}
		
		$tmpAr['geoloclat'] = $oneRec['geometry']['location']['lat'];
		$tmpAr['geoloclng'] = $oneRec['geometry']['location']['lng'];
		
		$tmpAr['value'] = $fullname;
		$transaddress = $fullname;
		mb_internal_encoding("UTF-8");
		$fname_length = mb_strlen($fullname);
		if($fname_length > 40){
			$overflow = 40 - $fname_length;
			$transaddress = mb_substr($fullname, 0, mb_strrpos($fullname, ',', $overflow));
		}
		$tmpAr['transaddress'] = $transaddress;
		array_push($ret_data, $tmpAr);
	}

	$ret_arr = array();
	$ret_arr['suggestions'] = $ret_data;
	echo json_encode($ret_arr);

	/**
	 * 
	 * @param string $address H dieuthinsi pou tha anazitisei
	 * @param string $country Periorizei ta apotelesmata vasi ths xwras
	 * @param string $tk periorizei ta apotelesmata vasi tou TK
	 * @return array
	 */
	function kernel_googleGeoCoding($address, $country='',$tk = ''){
		$ret 		= array('ok' => TRUE, 'msg' => '','data');
		$url = 'https://maps.googleapis.com/maps/api/geocode/json?';
		$key 		= $_SESSION['crm000_00_mapsapikey'];
		$reslang 	= 'el';
		$components	= '';
		$componentsBr = '&components=';

		if(empty($_SESSION['crm000_00_mapsapikey'])){
			
			$ret['ok'] = FALSE;
			$ret['msg'] = dic_kernel_geocodingapi_emptykey;
			return $ret;
		}

		$query 	= urldecode($address);
		$queryPar = '&address=' . str_replace(' ', '+', $query);

		if(!empty($country)){
			$country = strtoupper($country);
			$components = $componentsBr.'country:'.$country;
			$componentsBr ='|';
		}
		if(!empty($tk)){
			$tkreq = 'postal_code='.$tk;
			$components .=$componentsBr.$tkreq;
			$componentsBr ='|';
		}

		$url .=	'language='.$reslang.'&key=' .$key.$queryPar.$components;
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$ret_json = json_decode(curl_exec($ch), true);

		$resultData = json_decode($ret_json,true);
		if($resultData['status'] != 'OK'){
			$ret['ok'] = FALSE;
			if ($resultData['status'] == 'ZERO_RESULTS'){
				$ret['msg'] = dic_kernel_geocodingapi_zero_res;
			}elseif ($resultData['status'] == 'OVER_QUERY_LIMIT'){
				$ret['msg'] = dic_kernel_geocodingapi_overquerylimit;
			}elseif ($resultData['status'] == 'REQUEST_DENIED'){
				$ret['msg'] = dic_kernel_geocodingapi_requestdenied;
			}elseif($resultData['status'] == 'INVALID_REQUEST'){
				$ret['msg'] = dic_kernel_geocodingapi_invalidrequest;
			}else{
				$ret['msg'] = dic_kernel_geocodingapi_unknowner . '<br/>Error message: '. $resultData['error_message'];
			}
			return $ret;
		}
		$ret['data'] = $resultData["results"];
		return $ret;
	}
?>