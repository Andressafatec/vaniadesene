function destaqueResize(){	
	$("#slider .lista li").width($(window).width());
}


function home() {
	destaqueResize();
	destaque();
	$(window).resize(destaqueResize);
		
	$("#slider").cycle({
		fx: 'fade' 
	});  
	
}

function destaque() {
	
	var qty = 1;	
	var obj = $("#slider");		
	var nav = $(".navegacao", obj);
	var slider = $('.lista ul', obj).bxSlider({ 		
		mode: 'fade', 	
		controls: false,
		displaySlideQty: qty,
		moveSlideQty: qty,
		auto: true,
		speed: 800,
		pause: 8000,
		autoHover: true,
		onBeforeSlide: function(currentSlide, totalSlides){
			var pos = $("a", nav).index($("a", nav).eq(currentSlide));
			var title = $("a", nav).eq(pos).attr("title");
			
			$("a", nav).removeClass("sel");
			$("a", nav).eq(pos).addClass("sel");
			
			$(".destaque_titulo", obj).text(title);

		}
	});
	
}

$(document).ready(function(){

	// hide #back-top first
	$("#back-top").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

});

//Google +
window.___gcfg = {lang: 'pt-BR'};

(function() {
	var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
	po.src = 'https://apis.google.com/js/plusone.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();