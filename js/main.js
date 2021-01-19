jQuery(function ($) {
  
  // merge two burger menu in one when 1199 breakpoint
  $('.navbar-toggler').on('click', function (e) { 
    e.preventDefault();
    $('#menu-public-primary-menu #menu-header-menu').remove();
    $('#menu-public-primary-menu').prepend($('#header-nav').html());
  });  
  
  // when at homepage remove ASK HELP acitve class
  if ( window.location.pathname == '/happy/' ){
    // Index (home) page
    $('.menu-item-164').removeClass('active');
    $('#menu-item-97').removeClass('active');
    $('#menu-item-99').removeClass('active');
  }
  // when on MY ACCOUNT page add active class
  if ( window.location.pathname == '/happy/my-account/' ){
    // Index (home) page
    $('.menu-my-account').removeClass('active');
    $('.menu-my-account').addClass('active');
  }
  
  // click your-idea and go to tab and show
  $('#go-idea').on('click', function (){
    $('.nav-link').removeClass('active'); // remove all from tabs name
    $('.tab-pane').removeClass('show active'); // romove all from sections
    $('#nav-idea-tab').addClass('active'); // only addclass for idea tab
    $('#nav-idea').addClass('show active'); // only addclass for idea section
  });
  
});

// sticky menu
window.onscroll = function() { stickyMenu() };

var header = document.getElementById("masthead");
var sticky = header.offsetTop;

function stickyMenu() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}