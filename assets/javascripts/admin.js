$('.card').on('click', function() {
  if ($(this).hasClass('open')) {
    $('.card').removeClass('open');
    $('.card').removeClass('shadow-2');
    $(this).addClass('shadow-1');
    return false;
  } else {
    $('.card').removeClass('open');
    $('.card').removeClass('shadow-2');
    $(this).addClass('open');
    $(this).addClass('shadow-2');
  }
});