$(document).ready(function () {
  addActiveClass();
});

//Add active class to nav-link based on url dynamically
function addActiveClass() {
  var currentPage = location.pathname
    .split("/")
    .slice(-1)[0]
    .replace(/^\/|\/$/g, "");

  currentPage = currentPage.toLowerCase();
  
  switch (currentPage) {
    case "":
    case "home":
    case "index":
      element = $("#ftco-navbar #home");
      break;
    case "menu":
      element = $("#ftco-navbar #menu");
      break;
    case "about":
      element = $("#ftco-navbar #about");
      break;
    case "contact":
      element = $("#ftco-navbar #contact");
      break;
    case "services":
      element = $("#ftco-navbar #services");
      break;
    case "login":
      element = $("#ftco-navbar #login");
      break;
  }

  element.addClass("active");
}
