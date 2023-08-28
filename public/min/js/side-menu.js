const mySidenav = $("#mySidenav");
const mySimaindenav = $("#mySimaindenav");

function openNav() {
  //quando o botão é clicado
  mySidenav.css({ "width": "70%" });
  mySimaindenav.css("opacity", "0.2");
}

function closeNav() {
  mySidenav.css({ "width": "0" });
  mySimaindenav.css("opacity", "1");
}

function closeOrOpenSideMenu() {
  mySidenav.innerWidth() == 0 ? openNav() : closeNav();
}
