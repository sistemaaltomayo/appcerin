function isJson(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}

$('.decimal').numeric(".");
$(".solonumero").keydown(function(event) {

   if(event.shiftKey)
   {
        event.preventDefault();
   }

   if (event.keyCode == 9 || event.keyCode == 46 || event.keyCode == 8)    {
   }
   else {
        if (event.keyCode < 95) {
          if (event.keyCode < 48 || event.keyCode > 57) {
                event.preventDefault();
          }
        } 
        else {
              if (event.keyCode < 96 || event.keyCode > 105) {
                  event.preventDefault();
              }
        }
      }
});


function validate_fechaMayorQue(fechaInicial,fechaFinal)
{
    valuesStart=fechaInicial.split("-");
    valuesEnd=fechaFinal.split("-");

    debugger;
    // Verificamos que la fecha no sea posterior a la actual
    var dateStart=new Date(valuesStart[2],(valuesStart[1]-1),valuesStart[0]);
    var dateEnd=new Date(valuesEnd[2],(valuesEnd[1]-1),valuesEnd[0]);
    if(dateStart>=dateEnd)
    {
        return false;
    }
    return true;
}




function alertajax(alert){

	var aleatorio = Math.floor((Math.random() * 500) + 1);
    var cadena = '';            
	cadena += "          <div role='alert' class='rd"+aleatorio+" alertawrelative  alert alert-success alert-dismissible'>";
	cadena += "                <button type='button' data-dismiss='alert' aria-label='Close' class='close'>";
	cadena += "                    <span aria-hidden='true' class='mdi mdi-close'></span>";
	cadena += "                </button>";
	cadena += "                <span class='icon mdi mdi-check'></span>";
	cadena += "                <strong>Bien Hecho!</strong> "+alert;
	cadena += "          </div>";
	$(".panel-ajax-alert").append(cadena);
	setTimeout(function(){ $(".rd"+aleatorio).fadeOut(200).fadeIn(100).fadeOut(400).fadeIn(400).fadeOut(100);}, 1200);

}

function alerterrorajax(alert){

	var aleatorio = Math.floor((Math.random() * 500) + 1);
    var cadena = '';            
	cadena += "          <div role='alert' class='rd"+aleatorio+" alertawrelative  alert alert-danger alert-dismissible'>";
	cadena += "                <button type='button' data-dismiss='alert' aria-label='Close' class='close'>";
	cadena += "                    <span aria-hidden='true' class='mdi mdi-close'></span>";
	cadena += "                </button>";
	cadena += "                <span class='icon mdi mdi-check'></span>";
	cadena += "                <strong>Error!</strong> "+alert;
	cadena += "          </div>";
	$(".panel-ajax-alert").append(cadena);
	setTimeout(function(){ $(".rd"+aleatorio).fadeOut(500).fadeIn(100).fadeOut(400).fadeIn(400).fadeOut(100);}, 1500);

}


function alerterror505ajax(alert){

    var aleatorio = Math.floor((Math.random() * 500) + 1);
    var cadena = '';            
    cadena += "          <div role='alert' class='rd"+aleatorio+" alertawrelative  alert alert-danger alert-dismissible'>";
    cadena += "                <button type='button' data-dismiss='alert' aria-label='Close' class='close'>";
    cadena += "                    <span aria-hidden='true' class='mdi mdi-close'></span>";
    cadena += "                </button>";
    cadena += "                <span class='icon mdi mdi-check'></span>";
    cadena += "                <strong>Error!</strong> "+alert;
    cadena += "          </div>";
    $(".panel-ajax-alert").append(cadena);
    setTimeout(function(){ $(".rd"+aleatorio).fadeOut(1000).fadeIn(200).fadeOut(400).fadeIn(400).fadeOut(100);}, 3000);

}



/************************ modal cargando ************************/


function cerrarcargando() {
    // eliminamos el div que bloquea pantalla
    $("#WindowLoad").remove();
 
}
 
function abrircargando(mensaje) {
    //eliminamos si existe un div ya bloqueando
    cerrarcargando();
 
    //si no enviamos mensaje se pondra este por defecto
    if (mensaje === undefined) mensaje = "<div class='texto'>Procesando la información<br>espere por favor</div>";
 
    //centrar imagen gif
    height = 20;//El div del titulo, para que se vea mas arriba (H)
    var ancho = 0;
    var alto = 0;
 
    //obtenemos el ancho y alto de la ventana de nuestro navegador, compatible con todos los navegadores
    if (window.innerWidth == undefined) ancho = window.screen.width;
    else ancho = window.innerWidth;
    if (window.innerHeight == undefined) alto = window.screen.height;
    else alto = window.innerHeight;
 
    //operación necesaria para centrar el div que muestra el mensaje
    var heightdivsito = alto/2 - parseInt(height)/2 - 100;//Se utiliza en el margen superior, para centrar
 
   //imagen que aparece mientras nuestro div es mostrado y da apariencia de cargando
    imgCentro = "<div style='text-align:center;height:" + alto + "px;'><div style='margin-top:" + heightdivsito + "px;'><img style='width: 200px;' src='/appcerin/public/img/gif/cargando1.gif'></div><div class='msjcargando'>" + mensaje + "</div></div>";
 
        //creamos el div que bloquea grande------------------------------------------
        div = document.createElement("div");
        div.id = "WindowLoad"
        div.style.width = ancho + "px";
        div.style.height = alto + "px";
        $("body").append(div);
 
        //creamos un input text para que el foco se plasme en este y el usuario no pueda escribir en nada de atras
        input = document.createElement("input");
        input.id = "focusInput";
        input.type = "text"
 
        //asignamos el div que bloquea
        $("#WindowLoad").append(input);
 
        //asignamos el foco y ocultamos el input text
        $("#focusInput").focus();
        $("#focusInput").hide();
 
        //centramos el div del texto
        $("#WindowLoad").html(imgCentro);
 
}


function abrircargandomarcacion(mensaje) {
    //eliminamos si existe un div ya bloqueando
    cerrarcargando();
 
    //si no enviamos mensaje se pondra este por defecto
    if (mensaje === undefined) mensaje = "<div class='texto'>Procesando la información<br>espere por favor</div>";
 
    //centrar imagen gif
    height = 20;//El div del titulo, para que se vea mas arriba (H)
    var ancho = 0;
    var alto = 0;
 
    //obtenemos el ancho y alto de la ventana de nuestro navegador, compatible con todos los navegadores
    if (window.innerWidth == undefined) ancho = window.screen.width;
    else ancho = window.innerWidth;
    if (window.innerHeight == undefined) alto = window.screen.height;
    else alto = window.innerHeight;
 
    //operación necesaria para centrar el div que muestra el mensaje
    var heightdivsito = alto/2 - parseInt(height)/2 - 100;//Se utiliza en el margen superior, para centrar
 
   //imagen que aparece mientras nuestro div es mostrado y da apariencia de cargando
    imgCentro = "<div style='text-align:center;height:" + alto + "px;'><div style='margin-top:" + heightdivsito + "px;'><img style='width: 200px;' src='../asistencia/public/img/gif/cargando1.gif'></div><div class='msjcargando'>" + mensaje + "</div></div>";
 
        //creamos el div que bloquea grande------------------------------------------
        div = document.createElement("div");
        div.id = "WindowLoad"
        div.style.width = ancho + "px";
        div.style.height = alto + "px";
        $("body").append(div);
 
        //creamos un input text para que el foco se plasme en este y el usuario no pueda escribir en nada de atras
        input = document.createElement("input");
        input.id = "focusInput";
        input.type = "text"
 
        //asignamos el div que bloquea
        $("#WindowLoad").append(input);
 
        //asignamos el foco y ocultamos el input text
        $("#focusInput").focus();
        $("#focusInput").hide();
 
        //centramos el div del texto
        $("#WindowLoad").html(imgCentro);
 
}