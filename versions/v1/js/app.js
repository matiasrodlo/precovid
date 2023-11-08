$(document).ready(function(){
    $("input[name='tel']").on("change", function(){
    	var tel = $(this).val();
    	console.log(tel.length);
    	if(tel.length >= 10)
    	{
    		//Si es solo numerico, puede ser un posible numero legitimo
    		if(!isNaN(tel))
    		{
    			//**El numero de telefono se podría validar recibiendo un texto, y verificandolo**
    			$("#continuar").attr('disabled', false);
    			$("#continuar").removeClass("btn-secondary").addClass("btn-primary");
    			//console.log("es positivo");

    			// Como es un posible numero, lo cargamos
    			$.ajax({
					type:"POST",
					url: "/app/login/send",
					data: {tel: tel},
					success:function(data){
						if(data == "reload"){
							window.location.replace("/app/evaluacion");
						}
						console.log("Success: "+data);
						//$("#form_login").html("<p class='alert alert-success text-center'><b>"+name+"</b>, thank you for send your message. In short, we respond to your message.</p>");
					},
					error:function(data){
						console.log("error: ", data);
					}
				});
				return false;
    		}
    		else
    		{
    			$("#continuar").attr('disabled', true);
    			$("#continuar").removeClass("btn-primary").addClass("btn-secondary");
    			//console.log("es falso");
    		}
    	}
    	else
    	{
    		$("#continuar").attr('disabled', true);
    		$("#continuar").removeClass("btn-primary").addClass("btn-secondary");
    		//console.log("es falso");
    	}
    });

    $("#continuar").on("click", function(){
    	var falta_de_aire = $("input[name='falta_de_aire']:checked").val();
    	var fiebre = $("input[name='fiebre']:checked").val();
    	var tos_seca = $("input[name='tos_seca']:checked").val();
    	var relacion_con_paciente = $("input[name='relacion_con_paciente']:checked").val();
    	var mucosidad = $("input[name='mucosidad']:checked").val();
    	var dolor_muscular = $("input[name='dolor_muscular']:checked").val();
    	var sintomatologia_gastrointestinal = $("input[name='sintomatologia_gastrointestinal']:checked").val();	
    	var tiempo_prolongado = $("input[name='tiempo_prolongado']:checked").val();	


    	if(falta_de_aire !== undefined && fiebre !== undefined && tos_seca !== undefined && relacion_con_paciente !== undefined && mucosidad !== undefined && dolor_muscular !== undefined && sintomatologia_gastrointestinal !== undefined && tiempo_prolongado !== undefined)
    	{
    		console.log("Todas las variables traen algun valor");
    		//Como todas traen un valor, cargamos los datos test y mostramos un resultado
    		$.ajax({
					type:"POST",
					url: "/app/evaluacion/send",
					data: {falta_de_aire: falta_de_aire, fiebre: fiebre, tos_seca: tos_seca, relacion_con_paciente: relacion_con_paciente, mucosidad: mucosidad, dolor_muscular: dolor_muscular, sintomatologia_gastrointestinal: sintomatologia_gastrointestinal, tiempo_prolongado: tiempo_prolongado},
					success:function(data){
						$("#resultado").html("<p>Tu probabilidad es del: "+data+"</p>");
					},
					error:function(data){
						console.log("error: ", data);
					}
				});
				return false;
    		
    	}
    	else
    	{
    		//Mostramos un mensaje diciendo que hay que responder todas las preguntas
    		console.log("Hay que completar todos los valores");
    	}
    });
});    