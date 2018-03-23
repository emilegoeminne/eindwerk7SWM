function openNav() {
    document.getElementById("mySidenav").style.width = "300px";
    document.querySelector(".hamburger-icon").style.display = "none";
  }
  /* Set the width of the side navigation to 0 */
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.querySelector(".hamburger-icon").style.display = "inherit";
  }

  document.getElementById("btnCloseNav").addEventListener("click", function(event){
    event.preventDefault();
    closeNav();
  });
  document.getElementById("btnOpenNav").addEventListener("click", function(event){
    openNav();
  });