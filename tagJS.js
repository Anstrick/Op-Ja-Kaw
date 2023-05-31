document.addEventListener('DOMContentLoaded', function () {
    const tagsInput = document.getElementById('tagsInput');
    const tagsContainer = document.getElementById('tagsContainer');

    tagsInput.addEventListener('keydown', function (event) {
        if (event.key === 'Enter' && tagsInput.value.trim() !== '') {
            const tag = document.createElement('span');
            tag.classList.add('tag');
            tag.textContent = tagsInput.value.trim();

            const closeButton = document.createElement('span');
            closeButton.classList.add('tag-close');
            closeButton.innerHTML = '&times;';

            closeButton.addEventListener('click', function () {
                tag.remove();
            });

            tag.appendChild(closeButton);
            tagsContainer.appendChild(tag);

            tagsInput.value = '';
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
  