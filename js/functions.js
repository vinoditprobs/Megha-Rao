$(document).ready(function () {
  $('#subscribeBtn').on('click', function () {
    // Remove previous status message
    $('.status').html('');

    // Email and name regex
    var regEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var regName = /^[a-zA-Z]+ [a-zA-Z]+$/;

    // Get input values
    var name = $('#name').val();
    var email = $('#email').val();

    // Validate input fields
    if (name.trim() == '') {
      alert('Please enter your name.');
      $('#name').focus();
      return false;
    } else if (!regName.test(name)) {
      alert('Please enter a valid name (first & last name).');
      $('#name').focus();
      return false;
    } else if (email.trim() == '') {
      alert('Please enter your email.');
      $('#email').focus();
      return false;
    } else if (email.trim() != '' && !regEmail.test(email)) {
      alert('Please enter a valid email.');
      $('#email').focus();
      return false;
    } else {
      // Post subscription form via Ajax
      $.ajax({
        type: 'POST',
        url: 'subscription.php',
        dataType: "json",
        data: {
          subscribe: 1,
          name: name,
          email: email
        },
        beforeSend: function () {
          $('#subscribeBtn').attr("disabled", "disabled");
          $('.content-frm').css('opacity', '.5');
        },
        success: function (data) {
          if (data.status == 'ok') {
            $('#subsFrm')[0].reset();
            $('.status').html('<p class="success">' + data.msg + '</p>');
          } else {
            $('.status').html('<p class="error">' + data.msg + '</p>');
          }
          $('#subscribeBtn').removeAttr("disabled");
          $('.content-frm').css('opacity', '');
        }
      });
    }
  });
});

$(document).ready(function () {
  $('.animsition').animsition({
    inClass: 'zoom-in-sm',
    outClass: 'zoom-out-sm'
  });
});


if ($(window).width() > 1200) {

  $(".menu .menu_click").on('mouseenter', function () {
    $(this).parents('.menu').addClass('open');
    $('main').addClass('add_overlay');
  });
  $(".menu").on('mouseleave', function () {
    $(this).removeClass('open');
    $('main').removeClass('add_overlay');
  });


} else {

  $(".menu .menu_click").on('click', function (e) {
    $(this).parents('.menu').toggleClass('open');
    $('.menu .close_menu').fadeToggle();
    $('main').toggleClass('add_overlay');
    e.preventDefault();
  });

  $(".menu .close_menu").on('click', function (e) {
    $('.menu').removeClass('open');
    $(this).fadeOut();
    $('main').removeClass('add_overlay');
    e.preventDefault();
  });
	
 $(document).on('click', function (event) {
  if (!$(event.target).closest('.menu').length) {
    $('.menu').removeClass('open');
    $('.menu .close_menu').fadeOut();
    $('main').removeClass('add_overlay');
  }
});	
	
}

$(window).scroll(function () {
  var scrollDistance = $(window).scrollTop() + 150;
  $('.page-section').each(function () {
    if ($(this).position().top <= scrollDistance) {

      $(this).addClass('in_view');

    } else {

      $(this).removeClass('in_view');
    }
  });
}).scroll();

if ($('body').hasClass('homepage')) {
  $(".homepage").addClass("active");
}
if ($('body').hasClass('about')) {
  $(".about").addClass("active");
}
if ($('body').hasClass('links')) {
  $(".links").addClass("active");
}
if ($('body').hasClass('sign_up')) {
  $(".sign_up").addClass("active");
}
if ($('body').hasClass('books')) {
  $(".books").addClass("active");
}
if ($('body').hasClass('contact')) {
  $(".contact").addClass("active");
}
