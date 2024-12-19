document.addEventListener("DOMContentLoaded", function () {

  //****************************
  // Theme Onload Toast
  //****************************
  window.addEventListener("load", () => {
    let myAlert = document.querySelectorAll('.toast')[0];
    if (myAlert) {
      let bsAlert = new bootstrap.Toast(myAlert);
      bsAlert.show();
    }
  })

  //
  // Carousel
  //
  $(".counter-carousel").owlCarousel({
    loop: true,
    rtl: true,
    margin: 30,
    mouseDrag: true,

    nav: false,

    responsive: {
      0: {
        items: 2,
        loop: true,
      },
      576: {
        items: 2,
        loop: true,
      },
      768: {
        items: 3,
        loop: true,
      },
      1200: {
        items: 4,
        loop: true,
      },
      1400: {
        items: 4,
        loop: true,
      },
    },
  });

});
