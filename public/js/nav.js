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