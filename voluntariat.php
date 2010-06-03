<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
define(PAGE_FILENAME, "voluntariat.php");
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include("includes/head.php");?>
<!--======= SCRIPT: SLIDER ========-->
<script type="text/javascript" src="js/jquery.slider/js/jquery.slider.js"></script>
<script type="text/javascript">
<!--
var Slider = new Class_Slider({
	selector_content : '#container_intro',
	selector_container : '#intro,#content',
	url_default: 'includes/voluntariat.php',
	min_height: 340
});
-->
</script>
<!--======== END SCRIPT SLIDER =========-->

<!--======= SCRIPT: POPUP (SIMPLEMODAL) ========-->
<!--[if IE 6]>
<link rel="stylesheet" media="all" type="text/css" href="js/jquery.simplemodal/basic_ie.css" />
<![endif]-->
<link rel="stylesheet" media="all" type="text/css" href="js/jquery.simplemodal/basic.css" />
<script type="text/javascript" src="js/jquery.simplemodal/jquery.simplemodal-1.3.5.min.js"></script>
<script type="text/javascript">
<!--
function open_popup(filename){
    var url = 'store/'+filename;
    $.get(url, '', function(data){
        $("#popup").html(data).modal({
            overlayClose : true
        });
    });
}
-->
</script>
<!--======= END SCRIPT ========-->
</head>

<body>

<div id="container">
    <div id="header">
      <? include("includes/header.php");?>
    </div>
      
<!--<div id="sidebar1">
        <h3>Contenido de Sidebar1</h3>
        <p>El color de fondo de este div sólo se mostrará a lo largo del contenido. Si desea utilizar una línea divisoria en su lugar, coloque un borde en el lado derecho del div #mainContent si siempre va a incluir más contenido. </p>
        <p>Donec eu mi sed turpis feugiat feugiat. Integer turpis arcu, pellentesque  eget, cursus et, fermentum ut, sapien. Fusce metus mi, eleifend  sollicitudin, molestie id, varius et, nibh. Donec nec libero.</p>
     </div>-->
     <div class="voluntariat-top"></div>
        <div id="mainContent" class="voluntariat">      
	        <!--top-menu-secundary-->
        <br />
        <div class="container-top"></div>
			<div id="intro" class="">
                <div class="img-left"><img src="images/fotos_voluntariat_left.png" alt="" /></div>
                <div id="content">
                    <div id="container_intro"></div>
                </div>
                <!--<div class="intro-more curved">+info</div>-->
          	</div>
        <!--end intro-->
        
            <div id="stickies-right">
            	<? include("includes/stickies-right.php");?>
          </div> 
          <!--end videos-->
<div class="clear"></div>
<br />
  </div><!-- end #mainContent -->
      <div class="voluntariat-bottom"></div>
    	<!-- Este elemento de eliminación siempre debe ir inmediatamente después del div #mainContent para forzar al div #container a que contenga todos los elementos flotantes hijos --><br class="clearfloat" />

      <div id="footer">
      <? include("includes/footer.php");?>
      </div><!-- end #footer -->
      
</div><!-- end #container -->

<div id="popup"></div>
</body>
</html>
