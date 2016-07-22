

///////////////////////////////////////
//////////	FUNCTIONS		///////////
///////////////////////////////////////
	
	// IMPLODE()
	function implode(glue, pieces) {
		//  discuss at: http://phpjs.org/functions/implode/
		// original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
		// improved by: Waldo Malqui Silva
		// improved by: Itsacon (http://www.itsacon.net/)
		// bugfixed by: Brett Zamir (http://brett-zamir.me)
		//   example 1: implode(' ', ['Kevin', 'van', 'Zonneveld']);
		//   returns 1: 'Kevin van Zonneveld'
		//   example 2: implode(' ', {first:'Kevin', last: 'van Zonneveld'});
		//   returns 2: 'Kevin van Zonneveld'

		var i = '',
		retVal = '',
		tGlue = '';
		
		if (arguments.length === 1) {
			pieces = glue;
			glue = '';
		}
		
		if (typeof pieces === 'object') {
			
			if (Object.prototype.toString.call(pieces) === '[object Array]') {
				return pieces.join(glue);
			}
			
			for (i in pieces) {
				retVal += tGlue + pieces[i];
				tGlue = glue;
			}
			
			return retVal;
			
		}
		
		return pieces;
		
	}


///////////////////////////////////////
//////////	END FUNCTIONS	  /////////
///////////////////////////////////////


$(document).ready(function(){
	
	$('.carouselSlider').slick({
		dots: true,
		infinite: true,
		speed: 500,
		cssEase: 'linear',
		autoplay: true,
		autoplaySpeed: 3000
	});
	
	var winWidth = $(window).width();
	var winHeight = $(window).height();
	var CarImg = $(".carouselContainer img").height();
	
	
	var carousel = $(".carouselContainer")
		.css("height", $(window).height() - "60");
	//$("section").css("min-height", $(window).height());
	//$("#bio").css("min-height", $(window).height() + "200");
	
	
	
	
	$(window).resize(function() {
	
		// Window sizes
		// MAKE UNIVERSAL
		var winWidth = $(window).width();
		var winHeight = $(window).height();
	
		var carousel = $(".carouselContainer")
			.css("min-height", $(window).height() - "60");
		
		//$("section").css("min-height", $(window).height());
		//$("#bio").css("min-height", $(window).height() + "200");
			
		
	});
	
	
	
	// Click the toolbar link
	// Scroll down to the link
	$(".navLink").on("click", function() {
		
		// Get the id attribute. It will determine where to go.
		var id = $(this).attr("id");
		var navigate = "#" + id.slice(0, -4);
		
		$.scrollTo(navigate, 1000);
		
	});
	
	$("#backToTop").on("click", function() {
		$.scrollTo("body", 1000);
	});
	
	
	
	var toolTip = [
		{
			text: 'Facebook',
			color: '#004364',
			margin: '0'
		},
		{
			text: 'YouTube',
			color: '#e14646',
			margin: '60'
		},
		{
			text: 'Twitter',
			color: '#00aced',
			margin: '130'
		}
	];
	
	
	
	$(".socialIcons li").on("mouseover", function() {
		
		var i = $(this).index();
		
		$(".tooltipCustom")
			.css("display", "block")
			.css("background", toolTip[i].color)
			.css("margin-left", toolTip[i].margin + "px");
			
		$(".tooltipCustom h3")
			.text(toolTip[i].text);
			
		$("tooltipCustom")
			.addClass(toolTip[i].text.toLowerCase());
		
	});
	
	$(".socialIcons li").on("mouseout", function() {
		$(".tooltipCustom")
			.css("display", "none")
			.removeClass(toolTip[i].text.toLowerCase());
	});
	
	
	
	
	// Clone the <nav> data to the <header>
	$(".center-nav").clone().attr("id", "center-nav").appendTo("header");
	
	
	// Waypoint just below the header
	// It's invisible, but still fires when passed
	$('.waypoint-header').waypoint(function(d) {
		
		switch(d) {
			
			// This will slide down to show <header>
			case 'up':
			default:
				$("header").slideToggle(500, function(){});
				break;
				
			// This will slide up to hide <header>
			case 'down':
				$("header").slideToggle(500, function(){});
				break;
		}
		
	});
	
	
	// Toggle mobile button classes on click
	$(".mobileButton").on("touchstart mousedown", function() {
		$(this).addClass("mobileButtonClicked");
	});
	$(".mobileButton").on("touchend mouseup", function() {
		$(this).removeClass("mobileButtonClicked");
	});
	
	
	$(".mobileButton").on("click", function() {
		
		$("#center-nav").slideToggle(400);
		
	});
	
	
	
	// The navigation panel for mobile
	if ($(window).width() <= 767) {
		$("#center-nav")
			.css("height", $(window).height() - 60); // Adjust for <header>	
	}
	
	// Make sure the size difference is only on the mobile version
	// On screen resize
	$(window).resize(function() {
		if ($(window).width() <= 767) {
			$("#center-nav")
				.css("height", $(window).height() - 60); // Adjust for <header>	
		}
	});
	
	

	
	
	
		
});





















