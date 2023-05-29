document.addEventListener("DOMContentLoaded", function() {
    var animatedLogo = document.getElementById("animatedLogo");
    var staticLogo = document.getElementById("staticLogo");
  
    // After the page loads, set the width of the static logo to match the animated logo
    staticLogo.style.width = animatedLogo.offsetWidth + "px";
  
    // Show the animated logo initially
    animatedLogo.style.display = "block";
  
    // After 3 seconds, hide the animated logo and show the static logo
    setTimeout(function() {
      animatedLogo.style.display = "none";
      staticLogo.style.display = "block";
    }, 3000);
});
  

// Navbar

document.addEventListener("DOMContentLoaded", function() {
  const menuIcon = document.getElementById("menu-icon");
  const navBar = document.getElementById("navLinks");

  menuIcon.addEventListener("click", function() {
    navBar.classList.toggle("open");
  });
});


//typing effect
document.addEventListener("DOMContentLoaded", function() {
  const welcomeText = document.getElementById('welcome').textContent;
  document.getElementById('welcome').textContent = '';

  let currentIndex = 0;
  const typingInterval = 100; // Adjust the typing speed (in milliseconds)
  const delayBetweenRepeats = 2000; // Adjust the delay between repeats (in milliseconds)
  
  function typeEffect() {
    if (currentIndex < welcomeText.length) {
      document.getElementById('welcome').textContent += welcomeText[currentIndex];
      currentIndex++;
      setTimeout(typeEffect, typingInterval);
    } else {
      setTimeout(resetTyping, delayBetweenRepeats);
    }
  }

  function resetTyping() {
    document.getElementById('welcome').textContent = '';
    currentIndex = 0;
    typeEffect();
  }

  typeEffect();
});

//scrollTrigger effect

document.addEventListener("DOMContentLoaded", function() {
gsap.registerPlugin(ScrollTrigger);
// REVEAL //
gsap.utils.toArray(".introduce").forEach(function (elem) {
  ScrollTrigger.create({
    trigger: elem,
    start: "top 80%",
    end: "bottom 10%",
    markers: false,
    onEnter: function () {
      gsap.fromTo(
        elem,
        { y: 100, autoAlpha: 0 },
        {
          duration: 1.25,
          y: 0,
          autoAlpha: 1,
          ease: "back",
          overwrite: "auto"
        }
      );
    },
    onLeave: function () {
      gsap.fromTo(elem, { autoAlpha: 1 }, { autoAlpha: 0, overwrite: "auto" });
    },
    onEnterBack: function () {
      gsap.fromTo(
        elem,
        { y: -100, autoAlpha: 0 },
        {
          duration: 1.25,
          y: 0,
          autoAlpha: 1,
          ease: "back",
          overwrite: "auto"
        }
      );
    },
    onLeaveBack: function () {
      gsap.fromTo(elem, { autoAlpha: 1 }, { autoAlpha: 0, overwrite: "auto" });
    }
  });
});
});

document.addEventListener("DOMContentLoaded", function() {
  gsap.registerPlugin(ScrollTrigger);

  gsap.utils.toArray(".intro-content").forEach(function(elem) {
    gsap.fromTo(
      elem,
      { y: 100, autoAlpha: 0 },
      {
        duration: 1.25,
        y: 0,
        autoAlpha: 1,
        ease: "back",
        scrollTrigger: {
          trigger: elem,
          start: "top 80%",
          end: "bottom 10%",
          markers: false,
          onEnter: function() {
            gsap.fromTo(
              elem,
              { y: 100, autoAlpha: 0 },
              {
                duration: 1.25,
                y: 0,
                autoAlpha: 1,
                ease: "back",
                overwrite: "auto"
              }
            );
          },
          onLeave: function() {
            gsap.fromTo(elem, { autoAlpha: 1 }, { autoAlpha: 0, overwrite: "auto" });
          },
          onEnterBack: function() {
            gsap.fromTo(
              elem,
              { y: -100, autoAlpha: 0 },
              {
                duration: 1.25,
                y: 0,
                autoAlpha: 1,
                ease: "back",
                overwrite: "auto"
              }
            );
          },
          onLeaveBack: function() {
            gsap.fromTo(elem, { autoAlpha: 1 }, { autoAlpha: 0, overwrite: "auto" });
          }
        }
      }
    );
  });
});

document.addEventListener("DOMContentLoaded", function() {
  gsap.registerPlugin(ScrollTrigger);
  // REVEAL //
  gsap.utils.toArray(".benefits").forEach(function (elem) {
    ScrollTrigger.create({
      trigger: elem,
      start: "top 80%",
      end: "bottom 10%",
      markers: false,
      onEnter: function () {
        gsap.fromTo(
          elem,
          { y: 100, autoAlpha: 0 },
          {
            duration: 1.25,
            y: 0,
            autoAlpha: 1,
            ease: "back",
            overwrite: "auto"
          }
        );
      },
      onLeave: function () {
        gsap.fromTo(elem, { autoAlpha: 1 }, { autoAlpha: 0, overwrite: "auto" });
      },
      onEnterBack: function () {
        gsap.fromTo(
          elem,
          { y: -100, autoAlpha: 0 },
          {
            duration: 1.25,
            y: 0,
            autoAlpha: 1,
            ease: "back",
            overwrite: "auto"
          }
        );
      },
      onLeaveBack: function () {
        gsap.fromTo(elem, { autoAlpha: 1 }, { autoAlpha: 0, overwrite: "auto" });
      }
    });
  });
  });


  document.addEventListener("DOMContentLoaded", function() {
    gsap.registerPlugin(ScrollTrigger);
    // REVEAL //
    gsap.utils.toArray(".joinNow").forEach(function (elem) {
      ScrollTrigger.create({
        trigger: elem,
        start: "top 80%",
        end: "bottom 10%",
        markers: false,
        onEnter: function () {
          gsap.fromTo(
            elem,
            { y: 100, autoAlpha: 0 },
            {
              duration: 1.25,
              y: 0,
              autoAlpha: 1,
              ease: "back",
              overwrite: "auto"
            }
          );
        },
        onLeave: function () {
          gsap.fromTo(elem, { autoAlpha: 1 }, { autoAlpha: 0, overwrite: "auto" });
        },
        onEnterBack: function () {
          gsap.fromTo(
            elem,
            { y: -100, autoAlpha: 0 },
            {
              duration: 1.25,
              y: 0,
              autoAlpha: 1,
              ease: "back",
              overwrite: "auto"
            }
          );
        },
        onLeaveBack: function () {
          gsap.fromTo(elem, { autoAlpha: 1 }, { autoAlpha: 0, overwrite: "auto" });
        }
      });
    });
    });
  