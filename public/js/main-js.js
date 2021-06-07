$(document).ready(function () {
  /* ANIMATIONS */
  $('.main-content').addClass('main-show');
  $('.main-title').addClass('opacity-show');
  setTimeout(() => {
    $('.main-title').removeClass('opacity-show');
    $('.main-form').addClass('opacity-show');
  }, 4000);
  /* ANIMATIONS */
});