<?php $lugar = 'Contacto'; ?> 
<!DOCTYPE HTML> 
<html> 
<head>
<title><?php echo $lugar; ?> | Pizza al cuadrado, Pizzas y Empanadas - Bah�a Blanca</title>
<meta charset="UTF-8" />
<link rel="stylesheet" href="css/global.css" />
<link rel="stylesheet" href="css/footer.css" />
<link rel="stylesheet" href="css/contacto.css" />
<link rel="shortcut icon" href="img/icono.png" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="https://fonts.googleapis.com/css?family=Montserrat|Satisfy" rel="stylesheet">
<meta name="description" content="Con recetas cl�sicas o una selecta variedad de gustos especiales en nuestras pizzas y empanadas, y con tentadoras promociones, hemos hecho que sea un placer comer en las casas bahienses." />
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js'></script> 
<script type="text/javascript">
$(function() {
	var imagenes = ['header.jpg', 'header2.jpg', 'header3.jpg', 'header4.jpg'];
  $('header#top #titulo').css({'background-image': 'url(img/' + imagenes[Math.floor(Math.random() * imagenes.length)] + ')'});
});
</script>

</head>
 
<body>
	<?php include_once 'bloques/header.php'; ?>
	<section id="contacto">	
	  <div id="consulta">
	  
		<?php 
		  if(isset($_GET['envio'])){
			if($_GET['envio']=='si')		  
				echo '<div id="titulo">Se envi&oacute; la consulta</div>';  
			elseif($_GET['envio']=='no')
				echo '<div id="titulo">No se envi&oacute; la consulta</div>';
		  }
		?>
	    <div id="titulo">Formulario de contacto</div>
	    <form id="formulario" method="post" action="actions/contacto.php">
		  <input id="campo" name="nombre" type="text" placeholder="Nombre *" required>
		  <input id="campo" name="correo" type="email" placeholder="Correo *" required>
		  <input id="campo" name="telefono" type="text" placeholder="Tel&eacute;fono">
		  <input id="campo" name="asunto" type="text" placeholder="Asunto *" required>
		  <textarea name="consulta" rows="5" required id="consulta" placeholder="Mensaje *"></textarea> 
		  <input id="boton" value="Enviar consulta" type="submit">
		</form>
	  </div>
	  <div id="mapa">
	    <iframe class="plano" width="100%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4402.944091635277!2d-62.25672630539749!3d-38.7097353407844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc6e0b58a6c04d1a6!2spizza+al+cuadrado!5e0!3m2!1ses!2sar!4v1491583753904" frameborder="0" style="border:0" allowfullscreen></iframe>  
	  </div>
	</section>	
	<?php include_once 'bloques/footer.php'; ?>    
</body>
</html>