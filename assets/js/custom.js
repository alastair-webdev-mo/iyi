/**
 * Custom JS.
 *
 * Custom JS scripts.
 *
 * @since 1.0.0
 */
console.log('CustomJS');

var s = skrollr.init({
  forceHeight: false,
  edgeStrategy: 'set',
  easing: {
    WTF: Math.random,
    inverted: function(p) {
      return 1-p;
    }
  }
});

if (s.isMobile()) {
    s.destroy();
}

$(document).ready(function($) {
	$('.slider').unslider({
		animation: 'fade',
		autoplay: true,
		delay: 6000,
		speed: 1000,
		nav: false,
		arrows: false,
		fluid: true,
	});
});

$('.form').each(function() {

var form = $(this);
var formMessages = $(this).find('#form-messages');

$(this).validate({
  errorClass: "error",
  validClass: "valid",
  rules: {
    email: {
      required: true,
      email: true
    },
  },
  messages: {
    email: {
      required: "Your email address is required.",
    } 
  },
  highlight: function(element) {
    $(element).removeClass('has-success').addClass('has-error');
    $(element).parent().removeClass('has-success').addClass('has-error');
  },
  unhighlight: function(element) {
    $(element).removeClass('has-error').addClass('has-success');
    $(element).parent().addClass('has-success').removeClass('has-error');
  },
  errorPlacement: function(error, element) {
     error.insertAfter(element.parent());
  },
  submitHandler: function(form, response, data) {
      $.ajax({
        type: 'POST',
        url: $(form).attr('action'),
        data: $(form).serialize(),
      })
      .done(function(response) {
        $('#email').val('');
            var blob=new Blob([data]);
            var link=document.createElement('a');
            link.href=window.URL.createObjectURL(blob);
            link.download="REPORT_"+new Date()+".pdf";
            link.click();
      })
      .fail(function(data) {
        $(formMessages).removeClass('success');
        $(formMessages).addClass('error');

        // Set the message text.
        if (data.responseText !== '') {
          $(formMessages).text(data.responseText);
        } else {
          $(formMessages).text('Oops! An error occured and your message could not be sent.');
        }         
      });
  },
});
});