//Smooth Scrolling
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } 
  });
});

/*Menu ativo apos clique*/
$(document).ready(function(){
	'use strict';

	$('.navbar li a').click(function(){
		'use strict';

		$('.navbar li a').parent().removeClass("active");

		$(this).parent().addClass("active");

	});
});

/*Acende o menu referente a sessão em que está*/
$(document).ready(function(){
	'use strict';

	$(window).scroll(function(){
		'use strict';

		$("section").each(function(){
			'use strict';
			var bb = $(this).attr("id");
			var hei = $(this).outerHeight();
			var grttop = $(this).offset().top - 70;

			if($(window).scrollTop() > grttop && $(window).scrollTop() < grttop + hei){
				$(".navbar li a[href='#"+ bb + "']").parent().addClass("active");
			} else {
				$(".navbar li a[href='#"+ bb + "']").parent().removeClass("active");
			}
		});		
	});

});


/* ==== Wow.js ==== */
$(document).ready(function(){
	'use strict';

	new WOW().init();

});

/* ==== DECRYPT ==== */

$(document).ready(function(){

	$("#dec1").decrypt_effect({
		delay:200,
		speed: 150,
		decrypted_text: "HOME",
	});
	$("#dec2").decrypt_effect({
		speed: 150,
		decrypted_text: "MAPA",
	});
	$("#dec3").decrypt_effect({
		speed: 150,
		decrypted_text: "RELATÓRIOS",
	});
	$("#dec4").decrypt_effect({
		speed: 80,
		decrypted_text: "HONEYPOT DETECTION",
	});
	$("#dec5").decrypt_effect({
		speed: 110,
		decrypted_text: "INTRODUÇÃO",
	});
});


