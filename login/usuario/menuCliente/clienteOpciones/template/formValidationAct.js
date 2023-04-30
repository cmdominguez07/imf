//archivo template/form-validation.js


$(function () {

  // Initialize form validation on the registration form.

  // It has the name attribute "registration"

  $("form[name='actualizarDatos']").validate({

    // Specify validation rules

    rules: {

      // The key name on the left side is the name attribute

      // of an input field. Validation rules are defined

      // on the right side

      nombre: {

        lettersonly: true,

        minlength: 3

      },

      apellido: {
        lettersonly: true,

        minlength: 3
        
      },

      passWord:{
        minlength: 4
      }

    },

    // Specify validation error messages

    messages: {

      nombreCliente: {
        minlength: "Introduzca al menos 3 caracteres"
      },

      apellido: {
        minlength: "Introduzca al menos 3 caracteres"
      },

      passWord:{
        minlength: "Introduzca al menos 4 caracteres"
      }

    },

    submitHandler: function (form) {

      form.submit();

    }

  });

});