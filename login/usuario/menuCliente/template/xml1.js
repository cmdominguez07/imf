var contenido1 = document.getElementById("titulito");
var contenido2 = document.getElementById("curiosidad");
var datos;
var http_request = false;
var enlaceXML = "http://localhost/dashboard/AJAXCristinaModAuto/datos/img.xml";
var divisionxml = "xml";

$(document).ready(function() {
  console.log("Hello xml!");
  makeRequest(enlaceXML, divisionxml);
});

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

function verConexionXML() {
  let datos1;
  if (http_request.readyState == 4) {
    if (http_request.status == 200) {
      datos1 = http_request.responseXML;
      if (datos1 == null) {
        //que xml no esté vacío.
        alert("archivo XML vacio");
      } else {
        datos = http_request.responseXML.documentElement.getElementsByTagName(
          "flor"
        );

        sacarYGuardarMetadatos();
      }
    } else {
      alert(http_request.status);
      alert("Hubo problemas con la petición.");
    }
  }
}

function sacarYGuardarMetadatos() {
  let arrayTitulos = [];
  let arrayCuriosidad = [];
  let titulos;
  let curiosidades;

  for (let i = 0; i < 5; i++) {
    console.log("entra en for");
    titulos = datos[i].getElementsByTagName("titulo");

    //recoge titulos
    arrayTitulos.push(titulos[0].firstChild.nodeValue);
    tituloIndividual = arrayTitulos[i];

    //Crea etiqueta y da valor de titulo
    let tituloH4 = document.createElement("h4");
    let pTexto = document.createTextNode(tituloIndividual);
    tituloH4.appendChild(pTexto);
    contenido1.appendChild(tituloH4);

    //recoge curiosidades
    curiosidades = datos[i].getElementsByTagName("curiosidad");
    arrayCuriosidad.push(curiosidades[0].firstChild.nodeValue);
    curiosidadIndividual = arrayCuriosidad[i];

    //Crea etiqueta y da valor de curiosidad
    let curiosidadP = document.createElement("p");
    let pTexto1 = document.createTextNode(curiosidadIndividual);
    curiosidadP.appendChild(pTexto1);
    contenido2.appendChild(curiosidadP);
  }
  console.log(arrayTitulos);
  console.log(arrayCuriosidad);
}
