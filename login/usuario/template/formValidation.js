//archivo template/form-validation.js


$(function () {

  // Initialize form validation on the registration form.

  // It has the name attribute "registration"

  $("form[name='registration']").validate({

    // Specify validation rules

    rules: {

      // The key name on the left side is the name attribute

      // of an input field. Validation rules are defined

      // on the right side

      nombreCliente: {

        lettersonly: true,

        required: true,

        minlength: 3

      },

      apellidoCliente:{

        lettersonly: true,

        required: true
      },


      passWordCliente: {
   
        required: true,

        minlength: 3

      }

    },

    // Specify validation error messages

    messages: {

      nombreCliente: {
        required: "Por favor, introduzca su nombre",
        minlength: "Introduzca al menos 3 caracteres"
      },

      apellidoCliente: {
        required: "Por favor, introduzca su apellido",
      },

      passWordCliente: {

        required: "Por favor proporcione una contraseña",

        minlength: "Su contraseña debe tener al menos 3 caracteres."

      },


    },

    submitHandler: function (form) {

      form.submit();

    }

  });

});