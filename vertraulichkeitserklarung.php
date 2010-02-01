<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
define(PAGE_FILENAME, "vertraulichkeitserklarung.php");
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
	url_default: 'includes/vertraulichkeitserklarung.php'
});
-->
</script>
<!--======== END SCRIPT SLIDER =========-->
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
     
    <div id="mainContent" class="tipps">      
    <!--top-menu-secundary-->
		<br />
		<div id="intro" class="">
			<div id="content">
				<div id="container_intro"></div>
			</div>
		</div>
        <!--end #intro-->

        <div id="stickies-right">
        <? include("includes/stickies-right.php");?>
        </div> 
          
		<div class="clear"></div>
		<br />   			      
		<div class="clearfloat"></div>
        
	</div>
    <!-- end #mainContent -->
      
	<br class="clearfloat" />

    <div id="footer">
    <? include("includes/footer.php");?>
    </div>
      
</div>
<!-- end #container -->

</body>
</html>
