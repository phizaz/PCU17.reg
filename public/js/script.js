$(document).ready(function(){
	var he = $(window).height() - $('.sidebar').height()-50;
	var ratio = he/($(document).height()-$(window).height());
	console.log(ratio);
	$('.sidebar').css({"top": he});
	// $('.sidebar').css({"top": $(document).height() - $('.sidebar').height();});
	
	//$object.css({top:400});

	$(window).scroll(function(){
	       $('.sidebar').css({"top": '0' + (he - $(window).scrollTop() * ratio) + 'px' });
	});
	// $(window).scroll(function() {
 //            var yPos = -($window.scrollTop() / $bgobj.data('speed')); 
             
 //            // Put together our final background position
 //            var coords = '50% '+ yPos + 'px';
 
 //            // Move the background
 //            $bgobj.css({ top: yPos });
 //        }); 
	
	
	// $(window).scroll(function(){
	// 	var yPos = -($window.scrollTop() / 20);
	// 	// var coords = '50% ' + yPos + 'px;
	// 	$object.fadeIn("slow");
	// 	$object.css({top: yPos});
	// });
	// $(window).scroll(function (event) {
 //    // what the y position of the scroll is
	//     var yPos = -($window.scrollTop() / 20);
	// 	// var coords = '50% ' + yPos + 'px;
	// 	$object.fadeIn("slow");
	// 	$object.css({top: yPos});
 //  	});

	
});


