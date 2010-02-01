<title>Green Fields</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />

<link rel="stylesheet" href="styles/style.css" type="text/css" />
<script type="text/JavaScript" src="js/curvycorners.js"></script> 
<!--[if IE]> 
<link rel="stylesheet" href="styles/styleIE.css" type="text/css" />
<![endif]-->

<!--[if IE 8]> 
<link rel="stylesheet" href="styles/style_IE8.css" type="text/css" />
<![endif]-->

<!--[if IE 5]>
    <style type="text/css"> 
        /* coloque las reparaciones del modelo de cuadro para IE 5* en este comentario condicional */
         #sidebar1 { width: 180px; }
         #sidebar2 { width: 190px; }
    </style>
<![endif]-->

<!--[if lt IE 8]> 
<script type="text/javascript"> 
    /*Load jQuery if not already loaded*/ if(typeof jQuery == 'undefined'){ document.write("<script type=\"text/javascript\"   src=\"js/ie6update/jquery.min.js\"></"+"script>"); var __noconflict = true; } 
    var IE6UPDATE_OPTIONS = {
        icons_path: "js/ie6update/ie6update/images/"
    }
</script>
<script type="text/javascript" src="js/ie6update/ie6update/ie6update.js"></script>
<![endif]-->


<script type="text/javascript" src="js/comun.js"></script>
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>

<style type="text/css">
body{
<?
	$array_path = explode("/", strtolower($_SERVER['REQUEST_URI']));
	$pagename = strtolower($array_path[count($array_path)-1]);
	$pagename = explode("?", $pagename);
	
	switch($pagename[0]){
	case "index.php";
		echo 'background: url(images/back-top.png) top left repeat-x #ffffff;';
	break;
	case "sprachkurse.php";
		echo 'background: url(images/back-top_aprenderes.png) top left repeat-x #ffffff;';
	break;
	case "fachpraktika.php";
		echo 'background: url(images/back-top_pasantias.png) top left repeat-x #ffffff;';
	break;
	case "voluntariat.php";
		echo 'background: url(images/back-top_voluntariado.png) top left repeat-x #ffffff;';
	break;
	case "tipps.php";
		echo 'background: url(images/back-top_oferta.png) top left repeat-x #ffffff;';
	break;
	default:
		echo 'background: url(images/back-top.png) top left repeat-x #ffffff;';
	break;
	}
?>
}
</style>
