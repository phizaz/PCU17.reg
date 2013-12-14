$(document).ready(function(){

	// ----------------- Parallax scroll --------------------------

	var he = $(window).height() - $('.sidebar').height()-50;
	var ratio = he/($(document).height()-$(window).height());
	console.log(ratio);
	$('.sidebar').css({"top": he});
	

	$(window).scroll(function(){
	       $('.sidebar').css({"top": '0' + (he - $(window).scrollTop() * ratio) + 'px' });
	});	

	// ----------------- Auto suggest province, amphur, tambol dropdown -------------------------

	$.ajax({
		//url: '/PCU17/public/service/province',
		url: 'service/province',
		type: 'GET',
		dataType: 'json',		
	}).success(function(province){
		var select = $('#province');
		var options = select.prop('options');
		$('option', select).remove();

		$.each(province, function(index, array) {
			options[options.length] = new Option(array['PROVINCE_NAME'], array['PROVINCE_ID']);
		});
		
	});

	var amphur,tambol;

	$.ajax({
			//url: '/PCU17/public/service/amphur/',
			url: 'service/amphur/',
			type: 'GET',
			dataType: 'json',		
	}).success(function(amphur_in){
			var select = $('#amphur');
			var options = select.prop('options');
			$('option', select).remove();

				amphur = amphur_in;

			$.each(amphur, function(index, array) {
				if(array['PROVINCE_ID'] == $("#province option:selected").val())
					options[options.length] = new Option(array['AMPHUR_NAME'], array['AMPHUR_ID']);				
			});			
			
	});

	

	$.ajax({
			//url: '/PCU17/public/service/tambol/1',
			url: 'service/tambol/1',
			type: 'GET',
			dataType: 'json',		
		}).success(function(tambol_in){
			var select = $('#tambol');
			var options = select.prop('options');
			$('option', select).remove();

				tambol = tambol_in;

			$.each(tambol, function(index, array) {
				if(array['AMPHUR_ID'] == 1)
					options[options.length] = new Option(array['DISTRICT_NAME'], array['DISTRICT_ID']);	
				console.log(array['AMPHUR_ID'] + " " + $("#amphur option:selected").val());		
			});			
			
	});


	$('#province').on('change',function(event) {
		var select = $('#amphur');
		var options = select.prop('options');
		$('option', select).remove();
		$.each(amphur, function(index, array) {
				if(array['PROVINCE_ID'] == $("#province option:selected").val())
					options[options.length] = new Option(array['AMPHUR_NAME'], array['AMPHUR_ID']);				
		});	

		var prov_id = $("#province option:selected").val();

		$.ajax({
			//url: '/PCU17/public/service/tambol/' + prov_id,
			url: 'service/tambol/' + prov_id,
			type: 'GET',
			dataType: 'json',		
		}).success(function(tambol_in){
			var select = $('#tambol');
			var options = select.prop('options');
			$('option', select).remove();

				tambol = tambol_in;

			$.each(tambol, function(index, array) {
				if(array['AMPHUR_ID'] == $("#amphur option:selected").val())
					options[options.length] = new Option(array['DISTRICT_NAME'], array['DISTRICT_ID']);			
			});			
			
		});

	});

	$('#amphur').on('change', function(event) {
		var select = $('#tambol');
		var options = select.prop('options');
		$('option', select).remove();
		
		$.each(tambol, function(index, array) {
				if(array['AMPHUR_ID'] == $("#amphur option:selected").val())
					options[options.length] = new Option(array['DISTRICT_NAME'], array['DISTRICT_ID'])		
						
		});		
	});

	// ----------------- Auto suggest school_province, school_amphur ----------------------

	$.ajax({
		url: '/PCU17/public/service/province',
		type: 'GET',
		dataType: 'json',		
	}).success(function(province){
		var select = $('#school_province');
		var options = select.prop('options');
		$('option', select).remove();

		$.each(province, function(index, array) {
			options[options.length] = new Option(array['PROVINCE_NAME'], array['PROVINCE_ID']);
		});
		
	});

	var school_amphur;

	$.ajax({
			url: '/PCU17/public/service/amphur/',
			type: 'GET',
			dataType: 'json',		
		}).success(function(amphur_in){
			var select = $('#school_amphur');
			var options = select.prop('options');
			$('option', select).remove();

				school_amphur = amphur_in;

			$.each(school_amphur, function(index, array) {
				if(array['PROVINCE_ID'] == $("#school_province option:selected").val())
					options[options.length] = new Option(array['AMPHUR_NAME'], array['AMPHUR_ID']);				
			});			
			
	});

	$('#school_province').on('change', function(event) {
		var select = $('#school_amphur');
			var options = select.prop('options');
			$('option', select).remove();
			$.each(school_amphur, function(index, array) {
				if(array['PROVINCE_ID'] == $("#school_province option:selected").val())
					options[options.length] = new Option(array['AMPHUR_NAME'], array['AMPHUR_ID']);				
			});	
	});


});




