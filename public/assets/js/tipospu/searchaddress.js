function initialize() {
	var input = document.getElementById('address');
	var autocomplete = new google.maps.places.Autocomplete(input);
	google.maps.event.addListener(autocomplete, 'place_changed', function () {
		var place = autocomplete.getPlace();
		//document.getElementById('city2').value = place.name;
		//document.getElementById('cityLat').value = place.geometry.location.lat();
		//document.getElementById('cityLng').value = place.geometry.location.lng();
		document.getElementById('lat').value = place.geometry.location.lat();
		document.getElementById('lng').value = place.geometry.location.lng();
		console.log(place);
		//alert("This function is working!");
		//alert(place.name);
		// alert(place.address_components[0].long_name);
		var pcode = '';
		jQuery.each(place.address_components, function(i, val) {
			if(val.types[0]=='postal_code'){
				pcode = val.long_name;
			}
		});
		var CSRF_TOKEN = $('input[name="_token"]').val();
		$.ajax({
			url: 'ajax/postalcode',
			type: 'POST',
			data: {_token: CSRF_TOKEN, postalcode:pcode.replace(' ', '')},
			dataType: 'JSON',
			success: function (data) {
				console.log(data.city_gr);
				console.log(data.states.state_gr);
				console.log(pcode.replace(' ', ''));
				// $("#city").val(data.city);
				// $("#state").val(data.state);
				$("#my_new_city").val(data.city_gr);
				$("#my_new_state").val(data.states.state_gr);
				$("#my_new_postalcode").val(pcode.replace(' ', ''));
			}
		});

	});
}
google.maps.event.addDomListener(window, 'load', initialize); 