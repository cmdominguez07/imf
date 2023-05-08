
$(function () {

  // Initialize form validation on the registration form.

  // It has the name attribute "registration"
  $( document ).ready(function() {
    console.log( "ready!" );


  $("form[name='validarActualizar']").validate({

    // Specify validation rules

    rules: {

      // The key name on the left side is the name attribute

      // of an input field. Validation rules are defined

      // on the right side

      nombrePlanta: {
        required:true,
        lettersonly: true,
        minlength: 3,
        maxlength: 15


      },

      codigoPlanta: {

        number: true,
        maxlength: 4
      },

      precio: {
        number: true,

      }

    },

    // Specify validation error messages

    messages: {

      nombrePlanta: {

        minlength: "El nombre debe tener al menos 3 caracteres.",
        maxlength: "El nombre debe tener máximo 15 caracteres."

      },
      codigoPlanta: {

        number: "Por favor, intruduzca un valor numérico",
        minlength: "El nombre debe tener al menos 3 caracteres.",
        maxlength: "El código debe tener máximo 4 dígitos."

      },

      numeroEjemplares: {
        number: "Por favor, intruduzca un valor numérico",
        minlength: "El nombre debe tener al menos 3 caracteres.",
        maxlength: "El código debe tener máximo 4 dígitos."

      },
      precio: {
        number: "Por favor, intruduzca un valor numérico",

      },


    },

    submitHandler: function (form) {

      form.submit();

    }
  });
  });
});