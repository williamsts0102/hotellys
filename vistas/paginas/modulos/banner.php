<!--=====================================
BANNER que me traiga los banners
======================================-->

<?php
    /*esta variable se utiliza en el foreach */
    $banner = ControladorBanner::mostrarBanner();
?>

<div class="banner container-fluid p-0">
	
	<div class="jd-slider fade-slider">
		
		<div class="slide-inner">
			
			<ul class="slide-area">
				
                <!-- Para poder mostrar en los <li></li> -->
            <?php foreach ($banner as $key => $value): ?>
				 <li>					
                    <!-- se tiene que mostrar las imagenes q hay en el backend, por eso servidor que viene de plantilla.php -->
                    <img src="<?php echo $servidor.$value["img"]; ?>" width="100%">
                </li>
            <?php endforeach ?>
			</ul>

		</div>

	 	<div class="controller d-none">
		 	
			<a class="auto" href="#">

                <i class="fas fa-play fa-xs"></i>
                <i class="fas fa-pause fa-xs"></i>

            </a>

            <div class="indicate-area"></div>

	 	</div>

	 	<div class="verMas text-center bg-white rounded-circle d-none d-lg-block" vinculo="#planes">
    
    		<i class="fas fa-chevron-down"></i>	

    	</div>

	</div>

</div>
