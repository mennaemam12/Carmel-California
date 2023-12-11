$(document).ready(function () {
  addActiveClass();
});

//Add active class to nav-link based on url dynamically
function addActiveClass() {
  var currentPage = location.pathname
    .split("/")
    .slice(-1)[0]
    .replace(/^\/|\/$/g, "");

  if (currentPage.indexOf("?") > -1)
      currentPage = currentPage.substring(0, currentPage.indexOf("?"));

  currentPage = currentPage.toLowerCase();
  var element;
  
  switch (currentPage) {
    case "dashboard":
      element = $("#sidebar-dashboard");
      break;

    case "additem":
    case "viewitems":
      element = $("#sidebar-menu");
      break;

    case 'edititem':
      element = $("#sidebar-menu");
      break;
  }

  element.addClass("active");
  element.find("#ui-basic").addClass("collapsing");
}

(function ($) {
  "use strict";
  $(function () {
    var body = $("body");
    var sidebar = $(".sidebar");

    //Close other submenu in sidebar on opening any
    sidebar.on("show.bs.collapse", ".collapse", function () {
      sidebar.find(".collapse.show").collapse("hide");
    });

    //Change sidebar and content-wrapper height
    applyStyles();

    function applyStyles() {
      //Applying perfect scrollbar
      if (!body.hasClass("rtl")) {
        if ($(".settings-panel .tab-content .tab-pane.scroll-wrapper").length) {
          const settingsPanelScroll = new PerfectScrollbar(
            ".settings-panel .tab-content .tab-pane.scroll-wrapper"
          );
        }
        if ($(".chats").length) {
          const chatsScroll = new PerfectScrollbar(".chats");
        }
        if (body.hasClass("sidebar-fixed")) {
          if ($("#sidebar").length) {
            var fixedSidebarScroll = new PerfectScrollbar("#sidebar .nav");
          }
        }
      }
    }

    $('[data-toggle="minimize"]').on("click", function () {
      if (
        body.hasClass("sidebar-toggle-display") ||
        body.hasClass("sidebar-absolute")
      ) {
        body.toggleClass("sidebar-hidden");
      } else {
        body.toggleClass("sidebar-icon-only");
      }
    });

    //checkbox and radios
    $(".form-check label,.form-radio label").append(
      '<i class="input-helper"></i>'
    );

    //Horizontal menu in mobile
    $('[data-toggle="horizontal-menu-toggle"]').on("click", function () {
      $(".horizontal-menu .bottom-navbar").toggleClass("header-toggled");
    });
    // Horizontal menu navigation in mobile menu on click
    var navItemClicked = $(".horizontal-menu .page-navigation >.nav-item");
    navItemClicked.on("click", function (event) {
      if (window.matchMedia("(max-width: 991px)").matches) {
        if (!$(this).hasClass("show-submenu")) {
          navItemClicked.removeClass("show-submenu");
        }
        $(this).toggleClass("show-submenu");
      }
    });

    $(window).scroll(function () {
      if (window.matchMedia("(min-width: 992px)").matches) {
        var header = $(".horizontal-menu");
        if ($(window).scrollTop() >= 70) {
          $(header).addClass("fixed-on-scroll");
        } else {
          $(header).removeClass("fixed-on-scroll");
        }
      }
    });
  });

  // focus input when clicking on search icon
  $("#navbar-search-icon").click(function () {
    $("#navbar-search-input").focus();
  });
})(jQuery);
