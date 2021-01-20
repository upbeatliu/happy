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
  
  // add class to first card-body at accordion from Articles page
  $("#accordion .card:first .collapse").addClass("show");

  // load more click on Articles page
  // loop each list-group-item to find their index and identify ul id
  $(".list-group-item").each(function (i) {
    $("#listCat" + i + " li.card")
      .slice(0, 3)
      .show();
    $("#loadMore" + i).on("click", function (e) {
      e.preventDefault();

      $("#listCat" + i + " li.card:hidden")
        .slice(0, 3)
        .slideDown();
      // if no more hidden item, hide loadMore btn
      if ($("#listCat" + i + " li.card:hidden").length == 0) {
        $("#loadMore" + i).fadeOut("slow");
      }
      // if visible items more than 3, show showLess btn else hide it
      if ($("#listCat" + i + " li.card:visible").length > 3) {
        $("#showLess" + i)
          .fadeIn("slow")
          .show();
      } else {
        $("#showLess" + i)
          .fadeOut("slow")
          .hide();
      }
    });

    // showLess btn: show 3 items, show loadMore btn and hide showLess btn
    $("#showLess" + i).on("click", function (e) {
      e.preventDefault();

      $("#listCat" + i + " li.card")
        .not(":lt(3)")
        .hide()
        .slideUp();
      $("#showLess" + i)
        .fadeOut("slow")
        .hide();
      $("#loadMore" + i).show();
    });
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