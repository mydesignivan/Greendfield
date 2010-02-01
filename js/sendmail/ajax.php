<?
if( $_GET["action"]=="send" ){
	
	$to = $_POST["to"];
	$from = $_POST["s_from"];
	$fromtext = $_POST["s_fromtext"];
	$subject = $_POST["subject"];
	$header  = "MIME-Version: 1.0\r\n";
	$header .= "Content-type: text/html; charset=utf-8\r\n";
	$header .= "From: ".$from_text." <".$from.">\r\n";

	$html = '
		<style type="text/css">
		body{
			font-family:Arial, Helvetica, sans-serif;
			font-size:14px;
		}
		
		#container{		
			position:relative;
			width:800px;
		}
			#container .row{
				position:relative;
				float:left;
				width:100%;
				margin-bottom:5px;
			}
				#container .row .cell{
					float:left;
					text-align:left;
					width:70px;
					font-weight:bold;
				}
				#container .row span{
					float:left;
					font-weight:normal;
				}	
		#container .linea{
			position:relative;
			float:left;
			border-bottom:2px solid #3366CC;
			width:100%;
			margin-top:5px;
			margin-bottom:8px;
			font-weight:bold;
		}
		</style>';
	
	$html.='<div id="container">';
		
	foreach( array_keys($_POST) as $key ) {
		if( $key!="s_from"&&$key!="s_fromtext"&&$key!="subject"&&$key!="to"&&$key!="s_message"&&$key!="s_mail" ){
			
			$value = $_POST[$key];
			
			$html.='<div class="row"><div class="cell">'.$key.'</div>';
			$html.='<span>'. $value .'</span></div>';		
		}
	} 
	
	$html.='<div class="linea">Consulta</div>';	
	
	$html.='<p>'. ereg_replace("\n", "<br>", $_POST["s_message"]) .'</p>';
	$html.='</div>';
		
	
	if( @mail($to, $subject, $html, $header) ){
		die("ok");	        
	}else{
		die("error");
	}
	
}
?>