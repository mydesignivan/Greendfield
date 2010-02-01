/*
 * jQuery JavaScript Library v1.3
 * http://jquery.com/
 *
 * Copyright (c) 2009 Ivan Mattoni
 * Empresa MyDesign
 * Dual licensed under the MIT and GPL licenses.
 * http://docs.jquery.com/License
 *
 * Ultima Actualizacion: 
 */
 
var Class_Slider = function(options){
	//////////////////////////////////////////////////////////////////////////////////////////////
	///							  	      CONSTRUCTOR									  	   ///
	//////////////////////////////////////////////////////////////////////////////////////////////		
	var DEFAULTS={
		selector_content	:	'',	  // [STRING]
		selector_container	:	'',	  // [STRING]
		url_default			:	'',	  // [STRING]
		interval			:   400,  // [INTEGER] microsegundos
		slide_speed			:   900,  // [INTEGER]
		max_height 			:	  0,  // [INTEGER]
		min_height 			:	  0   // [INTEGER]
	};
	
	options = $.extend({}, DEFAULTS, {}, options);
	if( options.include_result=="" ) {error=true;return;}	
	
	var container = false;
	var content1 = false;
	var content2 = false;
	var leftFrom = 0;
	var widthFrom = 0;
	
	var error = false;
	$(document).ready(function(){
		content1 = $(options.selector_content);
		
		if( content1.length==1 ){
			container = $(options.selector_container);
			if( container.length>0 ){
				
				content2 = content1.clone().prependTo(container[container.length-1]);
	
				leftFrom = content1[0].offsetLeft+"px";
				widthFrom = content1[0].offsetWidth+"px";
				
				This.slide({url : options.url_default});
			}else error=true;
			
		}else error=true;
		//else slide(options.url_default);
	});
	

	//////////////////////////////////////////////////////////////////////////////////////////////
	///							  	      PUBLIC PROPERTIES								  	   ///
	//////////////////////////////////////////////////////////////////////////////////////////////		


	//////////////////////////////////////////////////////////////////////////////////////////////
	///							  	      PUBLIC METHODS								  	   ///
	//////////////////////////////////////////////////////////////////////////////////////////////		
	this.slide = function(params, index){
		if( error || working ) return;
		working=true;
		var P={
			url : '',
			data : '',
			callback : Function(),
			max_height : 0,
			min_height : 0
		}
		params = $.extend({}, P, {}, params);
		if( params.max_height>0 ) options.max_height = params.max_height;
		if( params.min_height>0 ) options.min_height = params.min_height;

		var pos = get_position(index);
		if( index && index>0 ) index_page = index;
		
		$.post(params.url, params.data, function(data){
			switch( pos ){
				case "left":
					var leftTo = "-="+widthFrom;					
					var widthTo = container[container.length-1].offsetWidth+"px";
				break;				
				
				case "right":				
					var leftTo = container[container.length-1].offsetWidth+"px"
					var widthTo = "-"+widthFrom;
				break;
				
				default:
					content1.html(data);
					set_height_container(content1.innerHeight());
					working=false;
				break;
			}
			
			
			
			if( pos!=null ){
				content1.animate({
					left : leftTo
				}, options.slide_speed);
	
				content2.css("left", widthTo).html(data);
				setTimeout(function(){
					content2.css("display", "block");
					
					set_height_container(content2.innerHeight());
					
					content2.animate({
						left : leftFrom
					}, options.slide_speed, function(){
						var left = content2.css("left");
						var cont1 = content1.html();
						var cont2 = content2.html();
						content1.css("left", left).html(cont2);
						content2.css("left", left).hide().html(cont1);
						working=false;
						
						if( typeof params.callback=="function" ) params.callback();
					});
					
				}, options.interval);
			}

		});
		
		return false;
	};


	//////////////////////////////////////////////////////////////////////////////////////////////
	///							  	      PRIVATE PROPERTIES							  	   ///
	//////////////////////////////////////////////////////////////////////////////////////////////		
	var This = this;
	var working=false;
	var index_page=1;
	var temp=false;
	

	//////////////////////////////////////////////////////////////////////////////////////////////
	///							  	      PRIVATE METHODS								  	   ///
	//////////////////////////////////////////////////////////////////////////////////////////////		
	var get_position = function(index){
		if( index==0 || !index ) return null;
		if( index>index_page ) return "right";
		else if( index<index_page ) return "left";
		else return null;
	}
	var set_height_container = function(height){		
		if( options.min_height>0 && height < options.min_height ) height = options.min_height;
		if( options.max_height>0 && height > options.max_height ) height = options.max_height;
		
		$(container).animate({ height:height }, 300);
	}
	
	
}