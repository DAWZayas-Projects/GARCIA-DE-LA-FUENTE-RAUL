
<?php //include "localidades.php"; ?>


 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<script type="text/javascript" src="jquery-3.1.1.min.js"></script>
 	<link rel="stylesheet" type="text/css" href="../includes/awesomplete-gh-pages/awesomplete.css" >
	<script src="../includes/awesomplete-gh-pages/awesomplete.js"></script>
 	<title>Tiempo</title>
	<script>
		
		function taketiempo(){
			var name= document.getElementById('nombre').value;
			console.log(name);
			
			$.ajax({
				type:'POST',
				url:'../tiempo/takeurllocalidad.php',
				data:{name :name},
				success:function(respuesta) {
					console.log(respuesta);

					 var datos = takedatos(respuesta);
				}
				
			});
		}

		function cogeeer(){
			var name= document.getElementById('nombre').value;

			if(name.length == 3 ){
				console.log(name);
				
				$.ajax({
					type:'POST',
					url:'localidades.php',
					data:{texto :name},
					success:function(respuesta) {
						console.log(respuesta);

							var elemento = document.getElementById('nombre');
				//debugger
							
							new Awesomplete(elemento,{
								list: JSON.parse(respuesta),
								minChar: 3,
								maxItems: 8
							});
						
					}
					
				});

				focuss('nombre');

			
			}
			
		}
		function focuss(id){
			//console.log("caca");
			setTimeout(function(){$("#"+id).focus()}, 100);
		
		}


		function takedatos(urlsend){
			//console.log(urlsend);
			debugger
			$.ajax({
			type:'POST',
			url:'../tiempo/takeldateslocalidades.php',
			data:{urlsend : urlsend},
			success:function(respuesta) {
				debugger
				var respuesta = JSON.parse(respuesta);
							
				console.log(respuesta);
				
				
			}

			
			});

		}






	</script>
 </head>
 <body >
 	
 <input  class="form-control " id="nombre" name="nombre"  onkeyup="cogeeer()" class="mayusculas" required>
 <button onclick="taketiempo();"  >ver tiempo</button>
 
	<script>
	

	</script>




 </body>
 </html> 
  