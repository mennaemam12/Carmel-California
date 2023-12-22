$(document).ready(function () {
    addActiveClass();
});

//Add active class to nav-link based on url dynamically
function addActiveClass() {
    let currentPage = location.pathname
        .split("/")
        .slice(-1)[0]
        .replace(/^\/|\/$/g, "");

    currentPage = currentPage.toLowerCase();

    let navItems = document.getElementsByClassName("nav-item");
    for (let i = 0; i < navItems.length; i++)
        if (navItems[i].id === currentPage)
            navItems[i].classList.add("active");
}

let navbar_toggler = document.querySelector(".navbar-toggler");
let nav = document.querySelector("#ftco-nav");

navbar_toggler.addEventListener("click", () => {
    if (nav.classList.contains("show"))
        nav.classList.remove("show");
    else
        nav.classList.add("show");

});