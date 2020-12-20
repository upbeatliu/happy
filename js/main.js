jQuery(function ($) {
  
  // merge two burger menu in one
  $('.navbar-toggler').on('click', function (e) { 
    e.preventDefault();
    $('#main-nav #menu-header-menu').remove();
    $('#main-nav').prepend($('#header-nav').html());
  });  
  
  // add first item to main-nav
  $('.menu-item-164').on('click', function (){
    $('.nav-link').removeClass('active');
    $('#nav-appointment-tab').addClass('active');
  });
  
});

// sticky menu
window.onscroll = function() {stickyMenu()};

var header = document.getElementById("masthead");
var sticky = header.offsetTop;

function stickyMenu() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}