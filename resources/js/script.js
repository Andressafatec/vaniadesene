$(document).ready(function() {
  // your code
  var window = $(window);

  $('#nav-icon2').click(function(){
	
    var target = $(this).data('alvo');
    

    if (!$(this).hasClass('open')){
      $(".arrow").addClass('d-none');
    $(target).animate({
      left:'30px',
    },function(){
          $("#nav-icon2").toggleClass('abrir');	
        })
    }
    else{
      $(target).animate({
      left:'-250px',
    },function(){
          $("#nav-icon2").toggleClass('abrir');	
          $(".arrow").removeClass('d-none');
        })
    }
    $(this).toggleClass('open');
  });


  $("body").on('click','.btnClose',function(e){
    e.preventDefault();
    $(".modalSuccess").removeClass('active')
    })
    var window = $(window);
    $(".formSubmit").submit(function(e) {
      $(".formSubmit .btnSubmit").attr('disabled',true)
              e.preventDefault();
              $(".loading").addClass('active');
              var url = "../../enviar.php"; // the script where you handle the form input.
              if(
                $(this).find('input[name="nome"]').val() == "" && 
                $(this).find('input[name="telefone"]').val() == "" &&  
                $(this).find('input[name="email"]').val() == ""){
                  alert("Atenção, Todos os campos são obrigatórios.")
              }
              $.ajax({
                     type: "POST",
                     url: url,
                     data: $(this).serialize(), // serializes the form's elements.
                     success: function(data)
                     {
                       console.log(data)
                        if(data == "enviado"){
                  $(".modalSuccess").addClass('active')
                  $(".formSubmit")[0].reset()
                  $(".loading").removeClass('active');
                        }
                        $(".formSubmit .btnSubmit").attr('disabled',false)
                     },error:function(data){
                console.log(data)
                $(".loading").removeClass('active');
                alert("Erro ao envior e-mail, por favor tente mais tarde")
                 }
                   });
  
              e.preventDefault(); // avoid to execute the actual submit of the form.
          });
})

/* Created by Tivotal */

var swiper = new Swiper(".slider-content-locacao", {
  slidesPerView: 3,
  spaceBetween: 15,
  loop: "true",
  centerSlide: "true",
  fade: "true",
  grabCursor: "true",
  pagination: {
    el: ".swiper-pagination",
    clickable: "true",
    dynamicBullets: "true",
  },
  navigation: {
    nextEl: ".swiper-button-next-locacao",
    prevEl: ".swiper-button-prev-locacao",
  },

  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    520: {
      slidesPerView: 2,
    },
    950: {
      slidesPerView: 3,
    },
  },
});

var swiper = new Swiper(".slider-content-venda", {
  slidesPerView: 3,
  spaceBetween: 15,
  loop: "true",
  centerSlide: "true",
  fade: "true",
  grabCursor: "true",
  pagination: {
    el: ".swiper-pagination",
    clickable: "true",
    dynamicBullets: "true",
  },
  navigation: {
    nextEl: ".swiper-button-next-venda",
    prevEl: ".swiper-button-prev-venda",
  },

  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    520: {
      slidesPerView: 2,
    },
    950: {
      slidesPerView: 3,
    },
  },
});

var swiper = new Swiper(".slider-content-locais", {
  slidesPerView: 4,
  spaceBetween: 15,
  loop: "true",
  centerSlide: "true",
  fade: "true",
  grabCursor: "true",
  pagination: {
    el: ".swiper-pagination",
    clickable: "true",
    dynamicBullets: "true",
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    520: {
      slidesPerView: 2,
    },
    950: {
      slidesPerView: 3,
    },
  },
});
/* Menu */

// An object literal
var app = {
  init: function() {
    app.functionOne();
  },
  functionOne: function () {
  },
  scrollTop: function() {
    window.scrollTo({top: 0, behavior: 'smooth'});
  }
};
(function() {
  $(window).scroll(function(){
    // sticky navbar on scroll script
    if(this.scrollY > 20){
        $('.navbar').addClass("sticky");
    }else{
        $('.navbar').removeClass("sticky");
    }
    
    // scroll-up button show/hide script
    if(this.scrollY > 500){
        $('.scroll-up-btn').addClass("show");
    }else{
        $('.scroll-up-btn').removeClass("show");
    }
});

// slide-up script
$('.scroll-up-btn').click(function(){
    $('html').animate({scrollTop: 0});
    // removing smooth scroll on slide-up button click
    $('html').css("scrollBehavior", "auto");
});

$('.navbar .menu li a').click(function(){
    // applying again smooth scroll on menu items click
    $('html').css("scrollBehavior", "smooth");
});

// toggle menu/navbar script
$('.menu-btn').click(function(){
    $('.navbar .menu').toggleClass("active");
    $('.menu-btn i').toggleClass("active");
});
  
  // the DOM will be available here
  app.init();
})();