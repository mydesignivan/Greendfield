// Script para enviar mail a traves de AJAX

var Class_SendMail = function(){
	this.id_progress = "elm_progress";
	this.id_container = "formConsult";
	
	this.send = function(id){
		eval('var f = document.'+id);
		if( typeof f=="undefined" ) return false;
		
		var fields="";
		for( var i=0; i<=f.length-1; i++ ){		
			if( !f[i].nodeName ) continue;
			
			if( (f[i].nodeName.toLowerCase()=="input"&&f[i].type=="text") || f[i].nodeName.toLowerCase()=="textarea" ){
						
				if( (f[i].getAttribute("required")!=null||f[i].getAttribute("ismail")!=null||(f[i].getAttribute("message")!=null&&f[i].nodeName.toLowerCase()=="textarea")) && f[i].value.length==0 ){
					alert('El campo "'+f[i].name+'" es obligatorio.');
					f[i].focus();
					return false;
				}				
				if( f[i].getAttribute("ismail")!=null ){
					if( /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(f[i].value)==false ){
						alert('El ema il ingresado es incorrecto.');
						f[i].focus();
						return false;
					}
				}
				if( f[i].getAttribute("message")!=null ) fields+= "s_message="+escape(f[i].value)+"&";
				else if( f[i].getAttribute("ismail")!=null ) fields+= "s_from="+escape(f[i].value)+"&"+f[i].name+"="+f[i].value+"&";
				else if( f[i].getAttribute("isname")!=null ) fields+= "s_fromtext="+escape(f[i].value)+"&"+f[i].name+"="+f[i].value+"&";
				else fields+= f[i].name+"="+escape(f[i].value)+"&";
			}
		}	
		fields += "to="+f.to.value+"&";
		fields += "subject="+f.subject.value;
			
		Progress.show();
		$Ajax.on_finalizer = function(){
			Progress.hidden();
			if( this.resultText=="error" ){
				alert("Ha ocurrido un error durante el envio, por favor, intentelo nuevamente."+"\n"+
					  "Si el error continua comuniquese con el webmaster.");
				return;
			}else{
				clear(f);
			}
		}
		$Ajax.execute("POST", "js/sendmail/ajax.php?action=send", fields);
		
		return false;
	};
	
	var This=this;
	
	var Progress={
		show: function(){
			if( document.getElementById(This.id_progress) && document.getElementById(This.id_container) ){
				document.getElementById(This.id_container).style.display="none";
				document.getElementById(This.id_progress).style.display="";
			}			
		},
		hidden: function(){
			if( document.getElementById(This.id_progress) && document.getElementById(This.id_container) ){
				document.getElementById(This.id_container).style.display="";
				document.getElementById(This.id_progress).style.display="none";
			}			
		}
	};
	
	var clear = function(f){
		for( var i=0; i<=f.length-1; i++ ){		
			if( !f[i].nodeName ) continue;			
			if( (f[i].nodeName.toLowerCase()=="input"&&f[i].type=="text") || f[i].nodeName.toLowerCase()=="textarea" ){
				f[i].value = "";
			}
		}
	}
	
}
var SendMail = new Class_SendMail();