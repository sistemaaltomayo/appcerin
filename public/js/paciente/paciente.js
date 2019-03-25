$(document).ready(function(){

    var carpeta = $("#carpeta").val();

    $(".ajaxpersonal").on('click','#buscarpaciente', function() {

        var dni     = $("#dni").val();
        var _token  = $('#token').val();
        abrircargando();

        $.ajax({
            type    :   "POST",
            url     :   carpeta+"/ajax-buscar-paciente-essalud",
            data    :   {
                            _token  : _token,
                            dni     : dni
                        },
            success: function (data) {
                debugger;
                if(data == 'error'){
                    alerterrorajax("No se encontro paciente");
                }
                cerrarcargando();
                $(".formpaciente").html(data);
            },
            error: function (data) {
                cerrarcargando();
                if(data.status = 500){
                    /** error 505 **/
                    var contenido = $(data.responseText);
                    alerterror505ajax($(contenido).find('.trace-message').html()); 
                    console.log($(contenido).find('.trace-message').html());     
                }
            }
        });

    }); 

	$(".ajaxpersonal").on('change','#departamentos_id', function() {
		var departamentos_id = $('#departamentos_id').val();
    	var _token 		= $('#token').val();

        $.ajax({
            
            type	: 	"POST",
            url		: 	carpeta+"/ajax-select-provincia",
            data	: 	{
            				_token	: _token,
            				departamentos_id : departamentos_id
            	 		},
            success: function (data) {

            	$(".ajaxprovincia").html(data);
            },
            error: function (data) {

                console.log('Error:', data);
            }
        });
    });



	$(".ajaxpersonal").on('change','#provincia_id', function() {

		var provincia_id = $('#provincia_id').val();
        var departamentos_id = $('#departamentos_id').val();
    	var _token 		= $('#token').val();

        $.ajax({

            type	: 	"POST",
            url		: 	carpeta+"/ajax-select-distrito",
            data	: 	{
            				_token	: _token,
            				provincia_id : provincia_id,
                            departamentos_id : departamentos_id                            
            	 		},
            success: function (data) {

            	$(".ajaxdistrito").html(data);
            },
            error: function (data) {

                console.log('Error:', data);
            }
        });

    });





});
