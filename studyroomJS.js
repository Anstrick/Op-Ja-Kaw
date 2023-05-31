document.addEventListener("DOMContentLoaded", function() {
    const userMenu = document.getElementById("userMenu");
    const profileBtn = document.querySelector(".profile-button"); // Update the selector to use the correct class name
  
    userMenu.addEventListener("click", function() {
      profileBtn.classList.toggle("open");
    });
  
    document.addEventListener("click", function(e) {
      if (!profileBtn.contains(e.target) && !userMenu.contains(e.target)) {
        profileBtn.classList.remove("open");
      }
    });
  });

  document.addEventListener("DOMContentLoaded", function() {
    const menuIcon = document.getElementById("menu-icon");
    const navBar = document.getElementById("navLinks");
  
    menuIcon.addEventListener("click", function() {
      navBar.classList.toggle("open");
    });
  });
  