//archivo template/form-validation.js


$(function () {


  $("form[name='introducirPlanta']").validate({

    // Specify validation rules

    rules: {

      // The key name on the left side is the name attribute

      // of an input field. Validation rules are defined

      // on the right side

      nombrePlanta: {
        lettersonly: true,
        required: true,
        number: false,
        minlength: 3,
        maxlength: 15


      },

      codigoPlanta: {
        required: true,
        number: true,
        maxlength: 4
      },

      numeroEjemplares: {

        number: true,
        maxlength: 3
      },

      precio: {

        required: true,
        number: true,
        maxlength: 8
      }



    },

    // Specify validation error messages

    messages: {

      nombrePlanta: {
        required: "Por favor, introduzca el nombre del producto",
        minlength: "El nombre debe tener al menos 3 caracteres.",
        maxlength: "El nombre debe tener máximo 15 caracteres."

      },
      codigoPlanta: {
        required: "Por favor, introduzca el código del producto",
        number: "Por favor, intruduzca un valor numérico",
        maxlength: "El código debe tener máximo 4 dígitos."

      },

      numeroEjemplares: {
        required: "Por favor, introduzca la cantidad disponible",
        number: "Por favor, intruduzca un valor numérico",
        maxlength: "El código debe tener máximo 3 dígitos."

      },
      precio: {
        required: "Por favor, introduzca el precio",
        number: "Por favor, intruduzca un valor numérico",
        maxlength: "Precio no válido."

      },


    },

    submitHandler: function (form) {

      form.submit();

    }
  });

});