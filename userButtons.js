document.addEventListener("DOMContentLoaded", function(){
const buttons = document.querySelectorAll('.section-button');
const contents = document.querySelectorAll('.section-content');

buttons.forEach((button) => {
  button.addEventListener('click', () => {
    const section = button.dataset.section;

    contents.forEach((content) => {
      if (content.id === section) {
        content.style.display = 'block';
      } else {
        content.style.display = 'none';
      }
    });

    buttons.forEach((btn) => {
      if (btn === button) {
        btn.classList.add('active');
      } else {
        btn.classList.remove('active');
      }
    });
  });
});
});