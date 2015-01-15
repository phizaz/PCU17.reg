var sidebar_height = 580;
var window_height;
var document_height;
var scrollable;
var he;
//var ratio = he/($(document).height()-$(window).height());
var ratio;

function update() {
	console.log('update');
	window_height = $(window).height();
	document_height = $(document).height();
	scrollable = document_height - window_height;
	he = window_height - sidebar_height;
	ratio = (he - 75) / scrollable;
}
$(window).resize(function() {
	update();
	$('.sidebar').css({"top": (he - $(window).scrollTop() * ratio) + 'px' });
});

$(document).ready(function(){
	update();
	// ----------------- Parallax scroll --------------------------
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




