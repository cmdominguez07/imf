//archivo template/form-validation.js


$(function () {

  // Initialize form validation on the registration form.

  // It has the name attribute "registration"

  $("form[name='msgMail']").validate({

    // Specify validation rules

    rules: {

      // The key name on the left side is the name attribute

      // of an input field. Validation rules are defined

      // on the right side

      nombreMail: {

        lettersonly: true,

        required: true,

        minlength: 3

      },

      email: {
        required: true,
        email: true
      },

    },

    // Specify validation error messages

    messages: {

      nombreMail: {
        required: "Por favor, introduzca su nombre",
        minlength: "Introduzca al menos 3 caracteres"
      },

      email: {
        required: "Por favor, introduzca un email",
        email: "El formato debe ser 'abc@domain.tld'"
      },

    },

    submitHandler: function (form) {

      form.submit();

    }

  });

});