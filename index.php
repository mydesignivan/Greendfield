<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php 
define(PAGE_FILENAME, "index.php");
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include("includes/head.php");?>

<!--SCRIPT VENTANA SIMPLE MODAL-->
<link rel="stylesheet" media="all" type="text/css" href="js/jquery.impromptu/examples.css" />
<script type="text/javascript" src="js/jquery.impromptu/jquery-impromptu.js"></script>
<script type="text/javascript">
<!--
function view_movie(){
	$.prompt('<object width="425" height="340"><param name="movie" value="http://www.youtube-nocookie.com/v/-Y9n1GBWNCY&hl=es&fs=1&rel=0&color1=0x5d1719&color2=0xcd311b"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube-nocookie.com/v/-Y9n1GBWNCY&hl=es&fs=1&rel=0&color1=0x5d1719&color2=0xcd311b" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="425" height="344"></embed></object>')
}
function view_movie1(){
	$.prompt('<object width="425" height="340"><param name="movie" value="http://www.youtube-nocookie.com/v/AXsQUdLt3g4&hl=es&fs=1&rel=0&color1=0x5d1719&color2=0xcd311b"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube-nocookie.com/v/AXsQUdLt3g4&hl=es&fs=1&rel=0&color1=0x5d1719&color2=0xcd311b" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="425" height="340"></embed></object>')
}
function view_movie2(){
	$.prompt('<object width="425" height="344"><param name="movie" value="http://www.youtube-nocookie.com/v/1pONGn5esgk&hl=es&fs=1&rel=0&color1=0x5d1719&color2=0xcd311b"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube-nocookie.com/v/1pONGn5esgk&hl=es&fs=1&rel=0&color1=0x5d1719&color2=0xcd311b" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="425" height="344"></embed></object>')
}
function view_movie3(){
	$.prompt('<object width="425" height="344"><param name="movie" value="http://www.youtube-nocookie.com/v/BoHPpIyen6M&hl=es&fs=1&rel=0&color1=0x5d1719&color2=0xcd311b"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube-nocookie.com/v/BoHPpIyen6M&hl=es&fs=1&rel=0&color1=0x5d1719&color2=0xcd311b" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="425" height="344"></embed></object>')
}
-->
</script>
<!--END SCRIPT-->

<!--SCRIPT VISUALIZADOR DE FOTO-->
<link rel="stylesheet" type="text/css" href="js/jquery.fancybox/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="js/jquery.fancybox/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery.fancybox/jquery.fancybox-1.2.1.pack.js"></script>
<script type="text/javascript">
function set_images(){
    $("a.group").fancybox();
}
</script>    
<!--END SCRIPT-->

<!--======= SCRIPT: SLIDER ========-->
<script type="text/javascript" src="js/jquery.slider/js/jquery.slider.js"></script>
<script type="text/javascript">
<!--
var Slider = new Class_Slider({
	selector_content : '#container_intro',
	selector_container : '#intro,#content',
	url_default: 'includes/intro.php',
	min_height: 340
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
     <div class="tourism-top"></div>
        <div id="mainContent" class="tourism">      
	        <div class="top-menu-secundary ">
                <ul>
                    <li><a href="#" onclick="Slider.slide({url: 'includes/videos.php'}, 1); return false;"><img src="images/icon_video.png" alt="" border="0" align="absmiddle" width="24" /> Videos</a></li>
                  <li><a href="#" onclick="Slider.slide({url: 'includes/fotogalerie.php', callback: set_images}, 2); return false;"><img src="images/icon_fotogalerie.png" alt="" border="0" align="absmiddle" width="24" /> Fotogalerie</a></li>
              </ul>        
     		</div>
            <!--end top-menu-secundary-->
        <div class="container-top"></div>
            <div id="intro" class="">
                
                <div class="img-left"><img src="images/foto_intro_left.png" alt="" /></div>
                
                <div id="content">
                    
                    <div id="container_intro"></div>
                </div>
                
                 
              <!--<div class="intro-more curved">+info</div>-->
            </div>
       <div class="container-bottom"></div>
            <br />
            <!--end intro-->
        
            <div id="videos">
                <ul>
                <li class="curved"><a href="#" onclick="Slider.slide({url: 'includes/argentinien.php'}, 1); return false;">Argentinien</a></li>
                <li class="curved"><a href="#" onclick="Slider.slide({url: 'includes/warum-argentinien.php'}, 2); return false;">Warum in Argentinien und nach Mendoza</a></li>
                <li class="curved"><a href="#" onclick="Slider.slide({url: 'includes/spanisch-lernen.php'}, 3); return false;">Spanisch lernen in Mendoza</a></li>
                <li class="curved"><a href="#" onclick="Slider.slide({url: 'includes/angebot-uberblick.php', min_height:340}, 4); return false;">Unser umfangreiches Angebot im &Uuml;berblick</a></li>
                <li class="curved"><a href="#" onclick="Slider.slide({url: 'includes/tipps-fur-sie.php'}, 5); return false;">TIPPs f&uuml;r Sie</a></li>
                </ul>
            </div>
	        <!--end videos-->
			<div class="clear">
        </div>
        
            <div id="stickies-bottom">
            	<div class="stickies-verde">
                <h3><a href="sprachkurse.php">Sprachkurse in Spanisch +Fachspanisch</a></h3>
                
                </div>
            	<div class="stickies-naranja">
                <h3><a href="fachpraktika.php">Fachpraktika</a></h3>
                </div>
            	<div class="stickies-rosa">
                <h3><a href="voluntariat.php">Voluntariat<br />Freiwillgenarbeit</a></h3>
                </div>
            	<div class="stickies-azul">
            	<h3><a href="angebot-im-einzelnen.php">Unser umfangreiches Angebot im Einzelnen</a></h3>
            	</div>
            </div>  
            <div class="water">
            	<object type="application/x-shockwave-flash" data="images/lakewater.swf" width="950" height="130">
				<param name="movie" value="images/lakewater.swf" />
				<param name="wmode" value="transparent" />
				</object>
			</div>    
	<div class="clearfloat"></div>
  </div><!-- end #mainContent -->
      
    	<!-- Este elemento de eliminación siempre debe ir inmediatamente después del div #mainContent para forzar al div #container a que contenga todos los elementos flotantes hijos --><br class="clearfloat" />

      <div id="footer">
      <? include("includes/footer.php");?>
      </div><!-- end #footer -->
      
</div><!-- end #container -->

</body>
</html>
