$(document).ready(function(){
    $('.food-slider').slick({
       autoplay:true,
      slidesToShow:4,
       slidesToScroll:1,
        prevArrow:".prev-btn",
        nextArrow:".next-btn",
      responsive:[

         {
            breakpoint:992,
            settings:{
             slidesToShow:2,
            }
         },

         {
          breakpoint:765,
          settings:{
           slidesToShow:1,
          }
       }

      ]
 
    });

 
    $('.nav-trigger').click(function(){
       $('.site-content-wrapper').toggleClass('scaled');
    })
 });


