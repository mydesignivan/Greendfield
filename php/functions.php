<?
function narrow_text($str, $length, $points){
	$n = 0;
	 
	$arrayText = array();
	$arrayText = explode(' ', $str);	
	$str = '';
	
	while($length >= strlen($str) + strlen($arrayText[$n])){
		$str .= ' '.$arrayText[$n];
		$n++;
	}		
	return $str.$points;
}
function narrow_text2($str, $length){
	$str = ereg_replace("</p>", chr(13), $str);
	$str = ereg_replace("<br>", chr(13), $str);
	$str = ereg_replace("<br />", chr(13), $str);
	$str = strip_tags($str);
	$str = ereg_replace(chr(13), "<br>", $str);	
	return substr($str, 0, $length);
}

function getMonth($lang){
	$m = date("n");
	switch( strtolower(trim($lang)) ){
	case "english":
		if( $m==1 ) return "January";
		else if( $m==2 ) return "February";
		else if( $m==3 ) return "March";
		else if( $m==4 ) return "April";
		else if( $m==5 ) return "may";
		else if( $m==6 ) return "June";
		else if( $m==7 ) return "July";
		else if( $m==8 ) return "August";
		else if( $m==9 ) return "September";
		else if( $m==10 ) return "October";
		else if( $m==11 ) return "November";
		else if( $m==12 ) return "December";
	break;
	case "spanish":
		if( $m==1 ) return "Enero";
		else if( $m==2 ) return "Febrero";
		else if( $m==3 ) return "Marzo";
		else if( $m==4 ) return "Abril";
		else if( $m==5 ) return "Mayo";
		else if( $m==6 ) return "Junio";
		else if( $m==7 ) return "Julio";
		else if( $m==8 ) return "Agosto";
		else if( $m==9 ) return "Septiembre";
		else if( $m==10 ) return "Octubre";
		else if( $m==11 ) return "Noviembre";
		else if( $m==12 ) return "Diciembre";
	break;
	}
}

function remove_accents($str){
	$tofind = "ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ";
	$replac = "AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn";
	return(strtr($str,$tofind,$replac));
}

function valid_image($filename, $path){
	return (file_exists($path."/thumbs/".$filename)) ? $path."/thumbs/".$filename : $path."/".$filename;
}
?>