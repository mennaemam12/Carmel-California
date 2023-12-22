document.addEventListener('DOMContentLoaded', () => {
    let tabs = document.querySelectorAll('.ftco-menu .nav-link');
    let tab_panes = document.querySelectorAll('.tab-pane');

    tabs.forEach((tab, index) => {
        tab.addEventListener('click', (e) => {
            e.preventDefault();
            tabs.forEach((tab) => {
                tab.classList.remove('active');
            });
            tab.classList.add('active');
            tab_panes.forEach((pane) => {
                pane.classList.remove('active');
                pane.classList.remove('show');
            });
            tab_panes[index].classList.add('active');
            tab_panes[index].classList.add('show');
        });
    }); // Added a closing parenthesis here
});
