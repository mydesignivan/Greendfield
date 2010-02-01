<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
define(PAGE_FILENAME, "contact-us.php");

if( $_SERVER['REQUEST_METHOD']=="POST" && $_POST["send"]=="ok" ){

	include("php/class.sendmail.php");
	$SendMail = new Class_SendMail();
	//$SendMail->to = "ivan@mydesign.com.ar";	
	$SendMail->to = "info@hinundwegfuerargentinien.com";	
	$SendMail->from = strtolower($_POST["txtEmail"]);
	$SendMail->name_from = ucwords($_POST["txtName"]);
	$SendMail->subject = $_POST["txtSubject"];
	
	$message = "<b>Nombre:</b> ".ucwords($_POST["txtName"])."<br>";
	$message.= "<b>Email:</b> ".ucwords($_POST["txtEmail"])."<br>";
	$message.= '<hr color="#5A5721">';
	$message.= $_POST["txtConsult"];	
	$SendMail->message = $message;
		
	$status_sendmail = $SendMail->send();					
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include("includes/head.php");?>

<script type="text/javascript">
<!--
    function validate(f){		
        if( f.txtName.value.length==0 ){
            alert('Field "Name" is required.');
            f.txtName.focus();
            return false;
        }
        if( f.txtEmail.value.length==0 ){
            alert('Field "Email" is required.');
            f.txtEmail.focus();
            return false;
        }
        if( /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(f.txtEmail.value)==false ){
            alert('Field "Email" is incorrect.');
            f.txtEmail.focus();
            return false;
        }
        if( f.txtSubject.value.length==0 ){
            alert('Field "Subject" is required.');
            f.txtSubject.focus();
            return false;
        }
        if( f.txtConsult.value.length==0 ){
            alert('Field "Consult" is required.');
            f.txtConsult.focus();
            return false;
        }
        
        return true;
    }
-->
</script>
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
<div class="spanish-top"></div>
    <div id="mainContent" class="spanish">      
        <!--top-menu-secundary-->
        <br />
        
        <div id="intro" class="">
		    <div class="img-left"><img src="images/fotos_cursos_en_espanol_left.png" alt="" /></div>
		    <div id="content">
				    <h3>Contact Us</h3>
    
                    <form method="post" enctype="application/x-www-form-urlencoded" onsubmit="return validate(this)">                
                        <ul class="container_contact">
                            <li><span class="cell">Name</span><input type="text" name="txtName" /><span class="required">&nbsp;*</span></li>
                            <li><span class="cell">Email</span><input type="text" name="txtEmail" /><span class="required">&nbsp;*</span></li>
                            <li><span class="cell">Subject</span><input type="text" name="txtSubject" /><span class="required">&nbsp;*</span></li>
                            <li>
                            Message<span class="required">&nbsp;*</span><br />
                            <textarea name="txtConsult" cols="20" rows="5"></textarea>
                            </li>
                            <li><input type="submit" class="button" value="Send" /></li>                    
                            <li class="legend">(*) Required fields</li>                    
                        </ul>
                        <input type="hidden" name="send" value="ok" />
                    </form>                    
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
    </div>
    <!-- end #mainContent -->
    
    <!-- Este elemento de eliminación siempre debe ir inmediatamente después del div #mainContent para forzar al div #container a que contenga todos los elementos flotantes hijos --><br class="clearfloat" />
    <div class="spanish-bottom"></div>
    <div id="footer">
    <? include("includes/footer.php");?>
    </div>
    
</div>

</body>
</html>
