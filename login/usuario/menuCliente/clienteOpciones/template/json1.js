//$("<img />", {src: "imagenes/imgRosa.jpg", id: "miImagen", class: "miClase", width: "700", margin: "0", height: "400"}).appendTo("#contenedorimg");
var contenido = document.getElementById("contenedorimg");
var botonNext = document.getElementById("startBtn");
var datosJSON;
var arrayImg = [];
var imgURl;
var enlaceJson =
  "http://localhost/dashboard/AJAXCristinaModAuto/datos/img.json";
var divisionjson = "json";

$(document).ready(function() {
  console.log("en json");
});

makeRequest(enlaceJson, divisionjson);

function makeRequest(url, extension) {
  http_request = false;

  if (window.XMLHttpRequest) {
    // Mozilla, Safari,...
    http_request = new XMLHttpRequest();

    if (http_request.overrideMimeType) {
      if (extension == "json") {
        http_request.overrideMimeType("aplication/xml");
        console.info("entra json");
      }
    }
    if (extension == "xml") {
      http_request.overrideMimeType("text/xml");
      console.info("entra xml");
    }
  } else if (window.ActiveXObject) {
    // IE
    try {
      http_request = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
      try {
        http_request = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (e) {}
    }
  }

  if (!http_request) {
    alert("Falla :( No es posible crear una instancia XMLHTTP");
    return false;
  }
  if (extension == "json") {
    http_request.open("GET", url, true);
    http_request.onreadystatechange = verConexionJson;
    http_request.send();
  }
  if (extension == "xml") {
    http_request.open("GET", url, true);
    http_request.onreadystatechange = verConexionXML;
    http_request.send();
  }
}

function verConexionJson() {
  if (http_request.readyState == 4) {
    if (http_request.status == 200) {
      datosJSONstring = this.responseText;
      if (datosJSONstring == "") {
        //valido que no esté vacío
        alert("Archivo JSON vacio");
      }
      if (JSON) {
        //carga json
        datosJSON = JSON.parse(this.responseText);
        sacarYGuardarURL();
      }
    } else {
      alert(http_request.status);
      alert("Hubo problemas con la petición.");
    }
  }
}

function sacarYGuardarURL() {
  //valida que cargue todas las imagenes
  let contador = 0;
  for (let i = 0; i < 5; i++) {
    arrayImg[i] = datosJSON.arrayFotos[i].imgPath;

    if (arrayImg[i] == "") {
      alert("Error ruta vacia.");
    }
    if (arrayImg[i] != "") {
      contador = contador + 1;
    }
  }

  if (contador == 5) {
    for (let i = 0; i < 5; i++) {
      $("<img />", {
        // crea img con el valor recogido del fichero.
        src: arrayImg[i],
        id: "miImagen",
        class: "miClase",
        width: "700",
        margin: "0",
        height: "400"
      }).appendTo("#contenedorimg");
    }
  } else {
    alert("Error, verifica datos de archivo.");
  }
}
