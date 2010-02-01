Array.prototype.IsArray = function(){
	return typeof(this)=='object'&&(this instanceof Array);
}
Array.prototype.find = function(searchStr) {
  var returnArray = false;
  for (i=0; i<this.length; i++) {
    if (typeof(searchStr) == 'function') {
      if (searchStr.test(this[i])) {
        if (!returnArray) { returnArray = [] }
        returnArray.push(i);
      }
    } else {
      if (this[i]===searchStr) {
        if (!returnArray) { returnArray = [] }
        returnArray.push(i);
      }
    }
  }
  return returnArray;
}
String.prototype.dateDDMMAAAA = function() {
	return this.replace(/^(\d{2})\/(\d{2})\/(\d{4})$/, "$2/$1/$3");
}
String.prototype.dateMMDDAAAA = function() {
	return this.replace(/^(\d{2})\/(\d{2})\/(\d{4})$/, "$2/$1/$3");
}
function remove_element(o){
	if( typeof(o)!="undefined" ){
		node = o.parentNode;
		if( node!=null)	node.removeChild(o);
	}
}	

function addEvent(elemento, nombre_evento, funcion){ 
    // para IE 
    if (elemento.attachEvent){ 
        elemento.attachEvent('on' + nombre_evento, funcion); 
        return true; 
    }else   // para navegadores respetan Estándares DOM(Firefox,safari) 
        if (elemento.addEventListener){ 
            elemento.addEventListener(nombre_evento, funcion, true); 
            return true; 
        }else  return false; 
}  
function removeEvent(obj, evType, fn, useCapture){
    if (obj.removeEventListener){
      obj.removeEventListener(evType, fn, useCapture);
      return true;
    } else if (obj.detachEvent){
      var r = obj.detachEvent("on"+evType, fn);
      return r;
    } else {
      alert("Handler could not be removed");
    }
} 

function Trim(str){
       return(str.replace(/^\s+/,'').replace(/\s+$/,''));
}

function FormatNumber(o, decimal){
	if( Trim(o.value)=="" ) return;
	if( typeof decimal!="number" || decimal<0 ) decimal=2;	
	
	var d="";
	for( var n=1; n<=decimal; n++ ) {d+="0";}
	
	var value = o.value.replace(/,/g, '.');
	if( isNaN(o.value) ) {
		o.value = "0."+d;
		return;
	}	
	
	var p = new Array();
		p = value.split(".");
		
	if( p.length==1 ) {
		o.value = p[0]+"."+d;
		
	}else if( p.length==2 ) {
		if( p[1].length<decimal ){
			decimal -= p[1].length;			
			d="";
			for( var n=1; n<=decimal; n++ ) {d+="0";}
			o.value = p[0]+"."+p[1]+d;
		}else if( p[1].length>decimal ){
			document.title = decimal;
			o.value = p[0]+"."+p[1].substr(0,decimal);
		}
	}	
}

function getKeyCode(e){
	if (!e) var e = window.event;						
	if( e.keyCode ) {
		return e.keyCode;  //DOM
	} else if( e.which ) { 
		return e.which;    //NS 4 compatible
	} else if( e.charCode ) {		
		return e.charCode; //also NS 6+, Mozilla 0.9+
	} else { //total failure, we have no way of obtaining the key code
		return false;
	}
}

function getElementsByClassName(cl, sTagName, el) {  
	var retnode = [];  
	var myclass = new RegExp('\\b'+cl+'\\b');  
	var elem = el.getElementsByTagName((sTagName===""||sTagName===null)?"*":sTagName);  
	for (var i = 0; i < elem.length; i++) {  
		 var classes = elem[i].className;  
		 if (myclass.test(classes)) retnode.push(elem[i]);  
	 } 
	 return retnode;  
};  

function getPropertyCss(el, prop){
	if( document.defaultView && document.defaultView.getComputedStyle ) {
		return document.defaultView.getComputedStyle(el,'').getPropertyValue(prop);
	}else{
		if( el.currentStyle ){
			eval("var result = el.currentStyle."+prop);
			return result;
		}else return "";
	}
}

function setOpacity(el, opacity){
	var s = el.style;
	var alphaRe = /alpha\([^\)]*\)/gi;
	if(window.ActiveXObject){ // IE
		s.zoom = 1;
		s.filter = (s.filter || '').replace(alphaRe, '') +
				   (opacity == 1 ? '' : ' alpha(opacity=' + opacity * 100 + ')');
	}else{		
		s.opacity = opacity*0.1;
	}
}

function getSizeWindow(){
	var x, y;
	if (self.innerHeight) { // MOS
		x = self.innerWidth + window.pageXOffset + document.body.scrollWidth;
		y = self.innerHeight + window.pageYOffset + document.body.scrollHeight;
	} else if (document.documentElement && document.documentElement.clientWidth) { // IE6 Strict
		x = document.documentElement.clientWidth + document.documentElement.scrollLeft+document.body.scrollWidth;
		y = document.documentElement.clientHeight + document.documentElement.scrollTop+document.body.scrollHeight;
	} else if (document.body.clientHeight) { // IE quirks
		x = document.body.clientWidth + document.body.scrollLeft + document.body.scrollWidth;
		y = document.body.clientHeight + document.body.scrollTop + document.body.scrollHeight;
	}
	return {x: x, y: y};
}	

function getSizeWindow2(){
	var x, y;
	if (self.innerHeight) { // MOS
		x = self.innerWidth - (self.innerWidth-document.body.scrollWidth);
		y = self.innerHeight - (self.innerHeight-document.body.scrollHeight);
	} else if (document.documentElement && document.documentElement.clientWidth) { // IE6 Strict
		x = document.documentElement.clientWidth - (document.documentElement.clientWidth-document.body.scrollWidth);
		y = document.documentElement.clientHeight - (document.documentElement.clientHeight-document.body.scrollHeight);
	} else if (document.body.clientHeight) { // IE quirks
		x = document.body.clientWidth - (document.body.clientWidth-document.body.scrollWidth);
		y = document.body.clientHeight - (document.body.clientHeight-document.body.scrollHeight);
	}
	return {x: x, y: y};
}

function AddDataCookie(Var, value, miliseg) {
	if( miliseg ) {
		var date = new Date();
		date.setTime(date.getTime() + miliseg);
		document.cookie = (Var + '=' + escape(value) +
		';expires=' + date.toGMTString());		
	}else{
		document.cookie = Var + '=' + escape(value);
	} 
}
function readyCookie(name) {
   var a = document.cookie.substring(document.cookie.indexOf(name + '=') + name.length + 1,document.cookie.length);
   if( a.indexOf(';') != -1 ) a = a.substring(0, a.indexOf(';'))
   return a;
}
