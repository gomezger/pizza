<?php $lugar = 'Men&uacute;'; ?> 
<?php 
//libreria
include_once '_clases/productos.php';
$menu = new Menu();
$carta = $menu->getCarta();
$pizzas = $carta['Pizzas'];
$sabores = $menu->getSabores();
$cantidad = floor(count($pizzas)/2);
$resto = count($pizzas)%2;

if(isset($_GET['id'])){
	$sabor = urldecode($_GET['id']);
	$pizzas_f = $menu->getPosibilidades([$sabor]);
	$cantidad_f = floor(count($pizzas_f)/2);
	$resto_f = count($pizzas_f)%2;
}


?>
<!DOCTYPE HTML> 
<html> 
<head>
<title><?php echo $lugar; ?> | Pizza al cuadrado - Bah&iacute;a Blanca</title>
<meta charset="UTF-8" />

<!-- Cambia de imagenes slider -->
<script src="https://kit.fontawesome.com/591d68fa75.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
<link rel="stylesheet" href="css/footer.css?fecha=30l08l2019" />
<link rel="stylesheet" href="css/menu.css?fecha=31bl08l2019" />
<link rel="stylesheet" href="css/global.css?fecha=29l08l2019" />


<link rel="shortcut icon" href="img/icono.png" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="https://fonts.googleapis.com/css?family=Montserrat|Satisfy" rel="stylesheet">
<meta name="description" content="Con recetas cl&aacute;sicas o una selecta variedad de gustos especiales en nuestras pizzas y empanadas, y con tentadoras promociones, hemos hecho que sea un placer comer en las casas bahienses." />


<script type="text/javascript">


$(function() {
	var imagenes = ['header.jpg', 'header2.jpg', 'header3.jpg', 'header4.jpg'];
  $('header#top #titulo').css({'background-image': 'url(img/' + imagenes[Math.floor(Math.random() * imagenes.length)] + ')'});
});


function elegirSabor(sel){
	window.location="menu.php?id="+sel.value;
}


</script>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144567784-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-144567784-1');
</script>


</head>
 
<body>
	<?php include_once 'bloques/header.php'; ?>

	<section id="menu">		
		<!-- menu personalizados -->
		<?php if(isset($_GET['id'])){ ?>
			<!-- pizza con sabor a ... -->
			<h1 class="titulo">
				<img class="d-none d-lg-inline-block" src="img/linea-curva.png">
				Pizzas con <br class="d-lg-none"> <?php echo $sabor; ?> 
				<img  class="d-none d-lg-inline-block" src="img/linea-curva.png">
			</h1>
			<!-- imprimir columnas -->
			<?php  
			//tiene el valor donde empiezan la segunda y tercer columna
			$cantidad_f = $cantidad_f+$resto_f;
			$intervalos_f = [[0,$cantidad_f],[$cantidad_f,($cantidad_f)*2]];

			foreach($intervalos_f as $intervalo_f){ ?>			
		
				<div class="col">
					<?php for($i=$intervalo_f[0]; $i<$intervalo_f[1] && $i<count($pizzas_f); $i++){ ?>
						<div class="variedad">
							<!-- numeros -->
							<div class="num">
								<?php echo $pizzas_f[$i]['comida']['id']; ?>
							</div>
							<!-- nombre -->
							<?php if($pizzas_f[$i]['comida']['nombre']!=null){ ?>
								<i><?php echo $pizzas_f[$i]['comida']['nombre']; ?>: </i>
							<?php } ?>
							<!-- sabores -->
							<?php 
								$cant =  count($pizzas_f[$i]['sabores']);
								for($j=0; $j<$cant; $j++){
									$sabor = $pizzas_f[$i]['sabores'][$j];  
									if($j+1==$cant) $caracter = '.'; 
									elseif($j+2==$cant) $caracter = ' y ';  
									else $caracter = ','; 
									echo '<a href="?id='.urlencode($sabor['nombre']).'">'.$sabor['nombre'].''.$caracter.' </a>';
								} 
							?>
							<!-- opcionales -->
							<?php 
								$cant =  count($pizzas_f[$i]['opcionales']);
								if($cant>0) echo '(<i>Opcional: </i> '  ;
								for($j=0; $j<$cant; $j++){
									$sabor = $pizzas_f[$i]['opcionales'][$j];  
									if($j+1==$cant) $caracter = '.'; 
									elseif($j+2==$cant) $caracter = ' o ';  
									else $caracter = ','; 
									echo '<a href="?id='.urlencode($sabor['nombre']).'">'.$sabor['nombre'].''.$caracter.' </a>';
								} 
							?>
						</div>
					<?php }	?>
				</div>
			<?php } ?> 
		<?php } ?> 
	
	
		<!-- MENU COMPLETO -->
	  	<h1 id="tag-pizza" class="titulo">
			  <img src="img/linea-curva.png">
			  Pizzas
			  <img src="img/linea-curva.png">
		</h1>
		<!-- INFORMACION EXTRA DEL MENU COMPLETO -->
		<div id="info"><i><strong>¡Nuestras pizzas (43x43cm) equivalen a dos de las tradicionales!</strong> Comen 4, pican 5.</i> <br>
			En <a href="faq.php">Información</a> podés saber más del tamaño de nuestras pizzas<!-- Media pizza (43cm por 21cm) equivale a una tradicional y rinde para comer 2 o picar 3 personas. --></i></div>
		<!-- <div id="info"><i><strong>Hace clic sobre cualquier gusto</strong> para ajustar la búsqueda a pizzas que contengan ese sabor.</i></div> -->
		
		
		<div class="botones m-0 p-0">
			<h3 class="cuadro persona d-sm-none d-lg-inline-block m-0">
				<i class="fab fa-whatsapp mr-2"></i>
				<a href="https://api.whatsapp.com/send?phone=5492914400810" target="_blanck">Pedí por Whatsapp</a>
			</h3>

			<form class="btn-group m-0 p-0">
				<select id="sabor" class="selectpicker select"  onchange="elegirSabor(this);">
					<option value="">Filtrar pizzas por ingrediente</option>
					<?php 
					foreach($sabores as $s){
						echo '<option value="'.urlencode($s["nombre"]).'">'.$s["nombre"].'</option>';
					}
					?>
				</select>
			</form>	
		</div>
		<div class="clearfix"></div>

		<!-- imprimir columnas -->
		<?php  
			//tiene el valor donde empiezan la segunda y tercer columna
			$cantidad = $cantidad+3;
			//$intervalos = [[0,$cantidad],[$cantidad,($cantidad)*2],[$cantidad*2,$cantidad*3]];
			$intervalos = [[0,$cantidad],[$cantidad+1,$cantidad*4]];

			foreach($intervalos as $intervalo){ ?>			
		
				<div class="col col-12 col-md-6 col-xl-6 m-0 pr-4 pl-4">
					<?php for($i=$intervalo[0];$i<$intervalo[1]  && $i<count($pizzas);$i++){ ?>
						<div class="variedad">
							<!-- numeros -->
							<div class="num">
								<?php echo $pizzas[$i]['comida']['id']; ?>
							</div>
							<div class="pizza float-left">
							<!-- nombre -->
							<?php if($pizzas[$i]['comida']['nombre']!=null){ ?>
								<i><?php echo $pizzas[$i]['comida']['nombre']; ?>: </i>
							<?php } ?>
							<!-- sabores -->
							<?php 
								$cantidad =  count($pizzas[$i]['sabores']);
								for($j=0; $j<$cantidad; $j++){
									$sabor = $pizzas[$i]['sabores'][$j];  
									if($j+1==$cantidad) $caracter = '.'; 
									elseif($j+2==$cantidad) $caracter = ' y ';  
									else $caracter = ', '; 
									echo '<a href="?id='.urlencode($sabor['nombre']).'">'.$sabor['nombre'].'</a>'.$caracter;
								} 
							?>
							<!-- opcionales -->
							<?php 
								$cantidad =  count($pizzas[$i]['opcionales']);
								if($cantidad>0) echo '(<i>Opcional:</i> ';
								for($j=0; $j<$cantidad; $j++){
									$sabor = $pizzas[$i]['opcionales'][$j];  
									if($j+1==$cantidad) $caracter = '.'; 
									elseif($j+2==$cantidad) $caracter = ' o ';  
									else $caracter = ', '; 
									echo '<a href="?id='.urlencode($sabor['nombre']).'">'.$sabor['nombre'].'</a>'.$caracter;
								} 
							?>
							</div>
						</div>
					<?php }	?>
				</div>
			<?php } ?> 

		
		<!--<h1 id="tag-milanesa" class="titulo"><img src="img/linea-curva.png"> Milanesas a la pizza <img src="img/linea-curva.png"></h1>
		<div id="info"><i>
				Todas las variedades vienen con medio kilo de papa fritas. Preguntá por la opción de convertir tu milanesa en pizzanesa y sorpendete!
				<br />
				<b>Menú disponible de martes a jueves</b>
		</i></div>
		<div class="col">
		   <div class="variedad"><div class="num">1</div><div class="pizza"></div>Simple</div>
		   <div class="variedad"><div class="num">2</div><div class="pizza"></div>Muzza y cantimpalo</div>
		   <div class="variedad"><div class="num">3</div><div class="pizza"></div>Muzza, Jam&oacute;n, Palmitos y Salsa Golf</div>
		   <div class="variedad"><div class="num">4</div><div class="pizza"></div>Muzza y Panceta</div>
		   <div class="variedad"><div class="num">5</div><div class="pizza"></div>A caballo: Muzza, Panceta y Huevo Frito</div>
		</div>
		<div class="col">
		   <div class="variedad"><div class="num">6</div><div class="pizza"></div>Napolitana: Muzza, Jam&oacute;n, Tomate, Ajo y Salsa de tomate</div>
		   <div class="variedad"><div class="num">7</div><div class="pizza"></div>Muzza y Tomate</div>
		   <div class="variedad"><div class="num">8</div><div class="pizza"></div>Muzza y Roquefort</div>
		   <div class="variedad"><div class="num">9</div><div class="pizza"></div>Muzza, Jam&oacute;n y Anan&aacute;</div>
		   <div class="variedad"><div class="num">10</div><div class="pizza"></div>Muzza, Jam&oacute;n y Morr&oacute;n</div>
		</div>
		<div class="col">
		   <div class="variedad"><div class="num">11</div><div class="pizza"></div>Muzza y Cebolla</div>
		   <div class="variedad"><div class="num">12</div><div class="pizza"></div>Muzza, Roquefort y Cebolla</div>
		   <div class="variedad"><div class="num">13</div><div class="pizza"></div>Muzza y Champignones a la provenzal</div>
		   <div class="variedad"><div class="num">14</div><div class="pizza"></div>Muzza, Cebolla de Verdeo y Ajo</div>
		</div>
		-->
		
		<!-- <h1 id="tag-empanada" class="titulo titulo_chico"><img src="img/linea-curva.png"> Adicionales <img src="img/linea-curva.png"></h1>
		<div id="info"><i><strong>!Crea tu propia pizza agregandole cualquier sabor!</strong></i></div>
		<div class="col">
		   <div class="variedad"><div class="num">1</div><div class="pizza"></div>Carne</div>
		   <div class="variedad"><div class="num">3</div><div class="pizza"></div>Jam&oacute;n y queso</div>
		   <div class="variedad"><div class="num">4</div><div class="pizza"></div>Queso y cebolla de verdeo</div>
		</div>
		<div class="col">
		   <div class="variedad"><div class="num">6</div><div class="pizza"></div>Pollo</div>
		   <div class="variedad"><div class="num">8</div><div class="pizza"></div>Muzza y cantimpalo</div>
		   <div class="variedad"><div class="num">10</div><div class="pizza"></div>Verdura</div>
		</div>
		<div class="col">
		   <div class="variedad"><div class="num">12</div><div class="pizza"></div>Muzza, panceta y cebolla de verdeo</div>
		</div> -->
		
	</section>	
	<?php include_once 'bloques/footer.php'; ?>    
</body>
</html>