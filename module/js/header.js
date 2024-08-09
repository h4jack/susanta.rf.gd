const sidebar = document.getElementById("sidebar");
const showMenu = () => { return sidebar.style.display = "flex" };
const hideMenu = () => { return sidebar.style.display = "none" };
const isMenu = () => { return sidebar.style.display == "flex" };


const menuBtnOpen = document.getElementById("menuBtnOpen");
menuBtnOpen.onclick = showMenu;


const sidebarClose = document.getElementById("sidebar-close");
sidebarClose.onclick = hideMenu;

window.addEventListener('hashchange', () => {
    hideMenu();
});