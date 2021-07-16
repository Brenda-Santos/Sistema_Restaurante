/* <!-- Função que mostra dropdown com pesquisa --> */
  
$(document).ready(function() {
    $('#produtos').select2();
});
    
/* <!-- FIM - Função que mostra dropdown com pesquisa --> */


/* <!-- Função que calcula troco --> */

function id(valor_campo)
{
    return document.getElementById(valor_campo);
}
function getValor(valor_campo)
{
    var valor = document.getElementById(valor_campo).value.replace( ',', '.');
    return parseFloat( valor ) * 100;
}

function subtrair()
{
    var total = getValor('valor') - getValor('valor_recebido');
    id('troco').value = total/100;
}


/* <!-- FIM - Função que calcula troco --> */



(function($) {
    "use strict"; 
	
	
	
	/* Navbar Scripts */
	// jQuery to collapse the navbar on scroll
    $(window).on('scroll load', function() {
		if ($(".navbar").offset().top > 60) {
			$(".fixed-top").addClass("top-nav-collapse");
		} else {
			$(".fixed-top").removeClass("top-nav-collapse");
		}
    });

	// jQuery for page scrolling feature - requires jQuery Easing plugin
	$(function() {
		$(document).on('click', 'a.page-scroll', function(event) {
			var $anchor = $(this);
			$('html, body').stop().animate({
				scrollTop: $($anchor.attr('href')).offset().top
			}, 600, 'easeInOutExpo');
			event.preventDefault();
		});
	});

    // closes the responsive menu on menu item click
    $(".navbar-nav li a").on("click", function(event) {
    if (!$(this).parent().hasClass('dropdown'))
        $(".navbar-collapse").collapse('hide');
    });



})(jQuery);