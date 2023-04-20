// codigo animado jquery comentar tecnicamente
let contenedor_img = $(".tarjeta"); //recojo div que contiene las imagenes
let contenedor_titulo = $(".contenido"); //recojo titulo
let contenedor_parrafo = $(".curiosidad"); //recojo dato o descripcion.

let img =$(".image").length; //recojo todos los elementos img en el contenedor de imagen
let tit = $(".tituloH4").length; //recojo todos los elementos h4 en el contenedor de texto
let parr = $(".parrafoFoto").length; //recojo todos los elementos p en el contenedor de texto
let valor = contenedor_img.css("width", img * 100 + "%"); //calculo que cada imagen tenga un ancho de 100% del div en css

let prev = $(".contenedor-btn__prev"); //traigo a variables los botones para pasar fotos
let next = $(".contenedor-btn__next");
let reset = 0; //contador que sirve para que se active la función de automático

$(document).ready(function() {
  console.log("Hello Main!");

  $(document).ready(function() {
    // animacion
    $(".parrafoFoto").hover(
      function() {
        $(this).css("background-color", "rgba(4, 3, 3, 0.424)"); //cambia el fondo del parrafo de descripicion si pasa el raton por el.
        $(this).fadeTo("slow", 0.7); //degradado de parrafo si ratón encima
      },
      function() {
        $(this).css("background-color", "rgba(206, 114, 114, 0.424)"); //Devuelve el fondo parrafo a su color si no esta el raton sobre el.
        $(this).fadeTo("slow", 1); //vuelve el parrafo a su nitidez
      }
    );
  });

  $(".tituloH4").hover(
    //animacion bground titulo
    function() {
      $(this).css("background-color", "rgba(4, 3, 3, 0.424)"); //cambia color si pasa el raton sobre el
    },
    function() {
      $(this).css("background-color", "rgba(206, 114, 114, 0.424)"); //vuelve a su color de fondo
    }
  );
  $(".pasarImg").hover(
    //animacion contenedor imagenes
    function() {
      $(this).css("border-color", "rgba(206, 114, 114, 0.424)"); //apararece un borde si el raton pasa por el contenedor img
      $(this).fadeTo("slow", 1); //nitidez si el raton está por el contenedor img
      $(".tituloH4").fadeTo("slow", 1);
      $(".parrafoFoto").fadeTo("slow", 1); //nitidez parrafo si raton en el contenedor img
    },
    function() {
      $(this).css("border-color", "rgba(255, 245, 245, 0.846)"); //desaparece el borde si el raton no esta en el contenedor img
      $(this).fadeTo("slow", 0.5); //se degrada la img si no esta el raton sobre ella
      $(".tituloH4").fadeTo("slow", 1);
      $(".parrafoFoto").fadeTo("slow", 0); //desaparece el texto de descripcion si no está el raton sobre el div
    }
  );
});

$(".image:last").insertBefore(".image:first"); //la ultima img pasa a primer lugar siempre, de modo que no quedan finales sin fotos.
$(".tituloH4:last").insertBefore(".tituloH4:first"); //ultimo titulo se inserta delante del primero
$(".parrafoFoto:last").insertBefore(".parrafoFoto:first"); //igual que titulo pero con parrafo
contenedor_img.css({ left: "-" + 100 + "%" }); //pasa a primer lugar con la propiedad left, coge el 100% la imagen

function siguiente() {
  //ANIMACION EXTRA //Al pulsar boton
  contenedor_img.animate({ left: "-" + 200 + "%" }, 900, function() {
    // ANIMACION. evita el cambio brusco al cambio de foto.
    $(".image:first").insertAfter(".image:last"); //La imagen que ha pasado la pone al final
    $(".tituloH4:first").insertAfter(".tituloH4:last"); //con h4
    $(".parrafoFoto:first").insertAfter(".parrafoFoto:last"); // con p.
    contenedor_img.css({ left: "-" + 100 + "%" });
  });
}

function anterior() {
  contenedor_img.animate({ left: 0 }, 900, function() {
    //ANIMACION EN SENTIDO CONTRARIO DEL BOTÓN. IGUAL QUE LA ANTERIOR
    $(".image:last").insertBefore(".image:first"); //La imagen pasada la coloca al inicio para que sea circular
    $(".tituloH4:last").insertBefore(".tituloH4:first"); //igual que imagen pero el  titulo
    $(".parrafoFoto:last").insertBefore(".parrafoFoto:first"); //pasa a ser circular también como imagen el parrafo
    contenedor_img.css({ left: "-" + 100 + "%" }); //indica el % que la pasa
  });
}

next.on("click", function() {
  //con el click se pone en marcha la funcion hacia la derecha
  siguiente(); //llama a funcion para el boton
  reset = 0;
});
prev.on("click", function() {
  //con el click se pone en marcha la funcion hacia la izuierda
  anterior(); //llamada a funcion boton izquierdo
  reset = 0; //contador
});

setInterval(() => {
  //si no pulso boton, cada 3 segundos pasa la imagen sola hacia la derecha
  reset++; //aumenta el valor de reset 0 a uno
  if (reset > 1) {
    // si aumenta el valor de reset, ejecuta la funcion
    siguiente(); //funcion de paso a la derecha
  }
}, 3000); //intervalo de espera 3s
