const jsWider = document.querySelectorAll('.js-wider');
jsWider.forEach((el) => {
  el.style.width = el.offsetWidth + 32 + 'px';
});