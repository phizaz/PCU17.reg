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

	function scrollToAnchor(aid){
		 var aTag = $("a[name='"+ aid +"']");
		 $('html,body').animate({scrollTop: aTag.offset().top},'slow');
	}

	$("#link-detail").click(function() {
	   scrollToAnchor('details');
	});

	$(window).scroll(function() {    
	    var scroll = $(window).scrollTop();
	    console.log(scroll);
	    if (scroll >= $("a[name='details']").offset().top - 50) {
	        $("#side3").addClass("nav-select");
	        $("#side2").removeClass("nav-select");
	    } else {
	        $("#side2").addClass("nav-select");
	        $("#side3").removeClass("nav-select");
	    }
	});



});




