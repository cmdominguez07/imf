$(function () {

  // Initialize form validation on the registration form.

  // It has the name attribute "registration"
console.log("entra en validar");
  $("form[name='registration']").validate({

    // Specify validation rules

    rules: {

      nombreAct: {
        lettersonly: true,
        minlength: 3,
        maxlength: 15


      },

      apellidoAct: {
        lettersonly: true,

        minlength: 3
        
      },

      passWordAct:{
        minlength: 4
      }


    },

    messages: {

      nombreAct: {
        minlength: "El nombre debe tener al menos 3 caracteres.",
        maxlength: "El nombre debe tener máximo 15 caracteres."

      },

      apellidoAct: {
        minlength: "Introduzca al menos 3 caracteres"
      },

      numeroEjemplares: {
        number: "Por favor, intruduzca un valor numérico",
        minlength: "El nombre debe tener al menos 3 caracteres.",
        maxlength: "El código debe tener máximo 4 dígitos."

      },
   
      passWordAct:{
        minlength: "Introduzca al menos 4 caracteres"
      }
    },

    submitHandler: function (form) {

alert("Actualizado");
      form.submit();

    }
  });
});


