<?php
/*esto viene de planes.controlador.php que se encuentra en la carpeta controladores */
	$planes = ControladorPlanes::mostrarPlanes();
?>

<!--=====================================
PLANES
======================================-->

<div class="planes container-fluid bg-white p-0" id="planes">
	
	<div class="container p-0">
		
		<div class="grid-container">
			
			<div class="grid-item">
				
				<h1 class="text-center py-3 py-lg-5 tituloPlan" tituloPlan="Bienvenidos" >Bienvenidos</h1>

				<p class="text-muted text-left px-4 descripcionPlan" descripcionPlan="En el corazón de la hermosa Máncora, donde el sol brilla eternamente y el océano Pacífico susurra su eterna canción, te damos la bienvenida a una experiencia única en nuestro exclusivo Hotel [Nombre de tu Hotel].

				Ubicado en una de las playas más deslumbrantes del norte de Perú, nuestro hotel es un refugio de serenidad y comodidad, diseñado para hacer que cada momento de tu estancia sea inolvidable. Con un entorno natural de belleza incomparable y una atención personalizada, nuestro hotel se ha convertido en un destino favorito para aquellos que buscan escapar de la rutina y relajarse en un paraíso costero."></p>

			</div>

			<?php foreach ($planes as $key => $value): ?>
					
			<div class="grid-item d-none d-lg-block" data-toggle="modal" data-target="#modalPlanes">
				
				<figure class="text-center">
					
					<h1 descripcion="<?php echo $value["descripcion"]; ?>">Plan <?php echo $value["tipo"]; ?></h1>

				</figure>

				<img src="<?php echo $servidor.$value["img"]; ?>" class="img-fluid" width="100%">

			</div>

				<?php endforeach ?>

			
		</div>

	</div>

</div>
