<?php	
	include("../php/functions.php");

	$images[0] = array("image_pathdir"=>"container/images/gallery",
					   "image_filename"=>"gallery_Landschaft _it_Intensivweinbau.jpg");
					   
	$images[1] = array("image_pathdir"=>"container/images/gallery",
					   "image_filename"=>"gallery_Asado_am_Wegesrand_unter_Freunden_Tradition_an_jedem_Ort.jpg");
					   
	$images[2] = array("image_pathdir"=>"container/images/gallery",
					   "image_filename"=>"gallery_La_Fuente_de_Los_Continentes_im_Parque_General_San_Martin.jpg");
					   
	$images[3] = array("image_pathdir"=>"container/images/gallery",
					   "image_filename"=>"gallery_Asado_Criollo.jpg");
					   
	$images[4] = array("image_pathdir"=>"container/images/gallery",
					   "image_filename"=>"gallery_Brunnen_auf_der_Plaza_Independencia_mit_dem_Turm_Kilometro_cero_im_Hintergrund.jpg");
					   
	$images[5] = array("image_pathdir"=>"container/images/gallery",
					   "image_filename"=>"gallery_Bittgaben_fur_Difunta_Correa.jpg");
					   
	$images[6] = array("image_pathdir"=>"container/images/gallery",
					   "image_filename"=>"gallery_Asado_de_Cordero.jpg");
					   
	$images[7] = array("image_pathdir"=>"container/images/gallery",
					   "image_filename"=>"gallery_Asado_de_Cordero2.jpg");
					   
	$images[8] = array("image_pathdir"=>"container/images/gallery",
					   "image_filename"=>"gallery_Ausgetrocknete_Tonpfanne_im_trockenen_Mendoza.jpg");
					   
	$images[9] = array("image_pathdir"=>"container/images/gallery",
					   "image_filename"=>"gallery_Bittgaben_fur_Difunta_Correa.jpg");
?>

<h3>Fotogalerie</h3>


<div class="gallery">
	<?php
    $n=0;
	
    //while( $rowImages=mysql_fetch_array($images) ){
	for( $i=0; $i<=count($images)-1; $i++){
		list($key, $val) = each($images[$i]); $rowImages[$key] = $val;
		list($key, $val) = each($images[$i]); $rowImages[$key] = $val;
		list($key, $val) = each($images[$i]); $rowImages[$key] = $val;
	
    	if( $n==0 ){?><ul class="container_images"><?php }?>
                   
	        <li><a class="group" rel="group" href="<?php echo $rowImages["image_pathdir"]."/".$rowImages["image_filename"];?>"><img src="<?php echo valid_image($rowImages["image_filename"], $rowImages["image_pathdir"]);?>" alt="<?php echo $rowImages["image_filename"];?>" title="" border="0" width="128" /></a></li>
        
    <?php
		if( $n==2 ) {
			$n=0;
			echo "</ul>";
		}else $n++;
                            
    }
    if( $n<2 ) {?></ul><?php }?>
</div>

