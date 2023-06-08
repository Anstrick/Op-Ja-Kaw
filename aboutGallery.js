var galleryItems = document.querySelectorAll(".gallery-item");
var galleryDots = document.querySelectorAll(".gallery-dot");
var currentIndex = 0;

function showItem(index) {
  if (index < 0 || index >= galleryItems.length) {
    return;
  }

  galleryItems.forEach(function (item) {
    item.style.display = "none";
  });

  galleryDots.forEach(function (dot) {
    dot.classList.remove("active");
  });

  galleryItems[index].style.display = "block";
  galleryDots[index].classList.add("active");
}

function showPreviousItem() {
  currentIndex--;
  if (currentIndex < 0) {
    currentIndex = galleryItems.length - 1;
  }
  showItem(currentIndex);
}

function showNextItem() {
  currentIndex++;
  if (currentIndex >= galleryItems.length) {
    currentIndex = 0;
  }
  showItem(currentIndex);
}

// Show the initial item
showItem(currentIndex);
