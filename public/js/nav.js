document.addEventListener("DOMContentLoaded", () => {
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
window.addEventListener("resize", () => {
    if (window.innerWidth > 992) {
        nav.style.maxHeight = "100vh";
        nav.style.padding = "0px";
    }
    else {
        nav.style.maxHeight = "0px";
        nav.style.padding = "0px";
    }
});

if (window.innerWidth > 992) {
    nav.style.maxHeight = "100vh";
    nav.style.padding = "0px";
}
else {
    nav.style.maxHeight = "100vh";
    nav.style.padding = "0px";
}

navbar_toggler.addEventListener("click", () => {
    if (parseInt(nav.style.maxHeight) === 0) {
        nav.style.maxHeight = "100vh";
        nav.style.padding = "15px 0px";
    } else {
        nav.style.maxHeight = "0px";
        setTimeout(() => {
            nav.style.padding = "0px";
        }, 400);
    }
});