$(document).ready(function(){

	// ----------------- Parallax scroll --------------------------

	//var he = $(window).height() - $('#sidebar').height();
	var he = $(window).height() - 670;
	var ratio = he/($(document).height()-$(window).height());
	//console.log(ratio);
	$('.sidebar').css({"top": he});
	

	$(window).scroll(function(){
		$('.sidebar').css({"top": (he - $(window).scrollTop() * ratio) + 'px' });
	});	

	// ----------------- Auto suggest province, amphur, tambol dropdown -------------------------
	var amphur,tambol;
	var province_def = 1; //Default province.
	if(credential.province) province_def = credential.province;
	var amphur_def = 1; //Default amphur.
	if(credential.amphur) amphur_def = credential.amphur;
	var tambol_def = 1; //Default tambol.
	if(credential.tambol) tambol_def = credential.tambol;

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
		select.val(province_def);
	});

	$.ajax({
			//url: '/PCU17/public/service/amphur/',
			url: 'service/amphur',
			type: 'GET',
			dataType: 'json',		
		}).success(function(amphur_in){
			var select = $('#amphur');
			var options = select.prop('options');
			$('option', select).remove();

			amphur = amphur_in;

			$.each(amphur, function(index, array) {
				if(array['PROVINCE_ID'] == province_def)
					options[options.length] = new Option(array['AMPHUR_NAME'], array['AMPHUR_ID']);				
			});
			select.val(amphur_def);
		});

		$.ajax({
			//url: '/PCU17/public/service/tambol/1',
			url: 'service/tambol/' + province_def,
			type: 'GET',
			dataType: 'json',		
		}).success(function(tambol_in){
			var select = $('#tambol');
			var options = select.prop('options');
			$('option', select).remove();

			tambol = tambol_in;

			$.each(tambol, function(index, array) {
				if(array['AMPHUR_ID'] == amphur_def)
					options[options.length] = new Option(array['DISTRICT_NAME'], array['DISTRICT_ID']);	
				// console.log(array['AMPHUR_ID'] + " " + $("#amphur option:selected").val());		
			});
			select.val(tambol_def);
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
	var school_amphur;
	var school_province_def = 1; //Default school province.
	if(credential.school_province) school_province_def = credential.school_province;
	var school_amphur_def = 1; //Default school amphur.
	if(credential.school_amphur) school_amphur_def = credential.school_amphur;
	$.ajax({
		url: 'service/province',
		type: 'GET',
		dataType: 'json',		
	}).success(function(province){
		var select = $('#school_province');
		var options = select.prop('options');
		$('option', select).remove();

		$.each(province, function(index, array) {
			options[options.length] = new Option(array['PROVINCE_NAME'], array['PROVINCE_ID']);
		});
		select.val(school_province_def);
	});

	$.ajax({
		url: 'service/amphur/',
		type: 'GET',
		dataType: 'json',		
	}).success(function(amphur_in){
		var select = $('#school_amphur');
		var options = select.prop('options');
		$('option', select).remove();

		school_amphur = amphur_in;

		$.each(school_amphur, function(index, array) {
			if(array['PROVINCE_ID'] == school_province_def)
				options[options.length] = new Option(array['AMPHUR_NAME'], array['AMPHUR_ID']);				
		});			
		select.val(school_amphur_def);
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

	//------------------- Input Form Control -----------------------------------
	$('.required').attr("title", "จำเป็นต้องกรอกข้อมูล");
	$( document ).tooltip({
	  track: true,
	  items: ".required",
      position: {
        my: "center bottom-20",
        at: "center top",
        using: function( position, feedback ) {
          $( this ).css( position );
          $( "<div>" )
            .addClass( "arrow" )
            .addClass( feedback.vertical )
            .addClass( feedback.horizontal )
            .appendTo( this );
        }
      }
    });

    $('.example-parent').focusin(function() {
    	$(this).next().slideDown('fast');
    	$(this).css('border-radius', '5px 5px 0 0');
    });

    $('.example-parent').focusout(function() {
    	$(this).next().slideUp('fast');
    	$(this).css('border-radius', '5px');
    });

});




