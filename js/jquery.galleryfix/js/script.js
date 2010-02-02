/*
 * SCRIPT: GalleryFix
 * AUTOR: Ivan Mattoni
 * EMPRESA: MyDesign
 * www.mydesign.com.ar
 *
 */


var ClassGalleryFix = function(options){

    /*  CONSTRUCTOR
     **************************************************************************/
    var DEFAULTS={
        selector       :    '',       // [STRING]
        countByPage    :     5,       // [INTEGER]
        maskOpacity    :   0.4,       // [INTEGER]
        basename       :    '',       // [STRING]
        effect         :     1,       // [INTEGER]
        callback       :  null,       // [FUNCTION]
        onLoadBefore   :  null,       // [FUNCTION]
        onLoadAfter    :  null,       // [FUNCTION]
        fancybox :{
            url     : '',
            options : null,
            rel     : 'group',
            title   : false
        }
    };

    options = $.extend({}, DEFAULTS, {}, options);


    /* PUBLIC PROPERTIES
     **************************************************************************/
     this.countpage = 0;
     this.indexpage = 0;


    /* PUBLIC METHODS
     **************************************************************************/
     this.next = function(){
        if( error||working ) return false;

        if( Page.index < Page.count ){
            Page.index++;
            if( typeof options.onLoadBefore=="function" ) options.onLoadBefore(Page.index);
            showThumbs('right');
        }

        return false;
     };

     this.back = function(){
        if( error||working ) return false;

        if( Page.index > 1 ){
            Page.index--;
            if( typeof options.onLoadBefore=="function" ) options.onLoadBefore(Page.index);
            showThumbs('left');
        }
         
        return false;
     };

     this.gopage = function(i){
        if( error||working || isNaN(i) ) return false;

        var direction="";
        if( i < Page.index ) direction="left";
        else if( i > Page.index ) direction="right";
        
        if( direction!="" ) {
            Page.index = i;
            showThumbs(direction);
        }
        return false;
     };


    /* PRIVATE PROPERTIES
     **************************************************************************/
    var error = false;
    var working = false;
    var This = this;
    var infoImg = new Array();
    var container = {};
    var Page={index:1, count:0};
    var tagLI = false;
    var temp = new Array();


    /* PRIVATE METHODS
     **************************************************************************/
     var apply_mask = function(ul){
         if( !ul ) ul = container.ul;
           ul.find("li").each(function(){
               $(this).css("opacity", options.maskOpacity);
               $(this).css("filter", "alpha(opacity="+(options.maskOpacity*100)+")");
               
               $(this).find("a").hover(function(){
                  $.fx.off=false;
                  $(this).parent().animate({
                       opacity : 1
                   }, 400);

               }, function(){
                   $.fx.off=false;
                   $(this).parent().animate({
                       opacity : options.maskOpacity
                   }, 500);
               });
           });
     };

     var set_info_page = function(){
        $.getJSON(options.basename+"/php/ajax.php", function(data){
            if( typeof data=="object") {
                infoImg = data;
                Page.count = infoImg.length / options.countByPage;
                if( Page.count.toString().indexOf(".")>-1 ) {
                    Page.count = parseInt(Page.count)+1;
                    This.countpage = Page.count;
                    if( typeof options.callback=="function" ) options.callback(Page.count);
                }
            }
            else error=true;
        });
     };

     var initializer = function(){
        container.size = {
            width  : container.div[0].offsetWidth,
            height : container.div[0].offsetHeight
        };

        switch(options.effect){
           case 1: default: //Slide
                                
                container.ul.wrap(
                    $("<DIV />").css({
                                    width  : ((container.size.width+200)*2)+"px",
                                    height : container.size.height+"px"
                                })
                );
                container.div = container.ul.parent();
                container.div.prepend(container.ul.clone().empty());
                                
                container.ul1 = container.div.find("ul").eq(0);
                container.ul2 = container.div.find("ul").eq(1);

                container.ul1.css({
                    position    : "relative",
                    "float"     : "left",
                    width       : container.size.width+"px",
                    height      : container.size.height+"px",
                    marginRight : "200px",
                    marginLeft  : "-"+(container.size.width+200)+"px"
                });

                container.ul2.css({
                    position    : "relative",
                    "float"     : "left",
                    width       : container.size.width+"px",
                    height      : container.size.height+"px"
                });
                                
                tagLI = container.ul2.find("li").eq(0).clone();
           break;

           case 2: case 3:
                tagLI = container.ul.find("li").eq(0).clone();
           break;
        }
     };

     var showThumbs = function(direction){

        working=true;
        $.fx.off = (temp.length>0);
        $(temp).each(function(i){clearInterval(this);});

        var start = (options.countByPage * Page.index) - options.countByPage;
        var end = options.countByPage * Page.index-1;
        if( end > (infoImg.length-1) ) end=infoImg.length-1;
        var i;

        switch(options.effect){
           case 1: default: //Slide

                container.ul1 = container.div.find("ul").eq(0);
                container.ul2 = container.div.find("ul").eq(1);

                container.ul1.empty();
                for( i=start; i<=end; i++ ){

                    tagLI.find("a").attr("href", infoImg[i].src);
                    var img = tagLI.find("img");
                    img.attr("src", infoImg[i].src_thumb);
                    img.attr("alt", (infoImg[i].alt && infoImg[i].alt!="") ? infoImg[i].alt : infoImg[i].src_thumb.substr(infoImg[i].src_thumb.lastIndexOf("/")+1));

                    container.ul1.append(tagLI.clone());
                }

                var left = direction=="right" ? 0 : "-"+(container.size.width+200);

                if( direction=="left" ){
                    container.ul2.css({marginRight : "200px"});
                    container.ul1.css({
                        marginRight : 0,
                        marginLeft : 0
                    })
                    .insertAfter(container.ul2);

                    container.ul1 = container.div.find("ul").eq(0);
                    container.ul2 = container.div.find("ul").eq(1);
                }
               
                container.ul1.animate({
                    marginLeft : left

                }, 900, function(){
                    working=false;
                    
                    if( direction=="right" ){
                        container.ul1.css({marginRight : 0});

                        container.ul2.css({
                            marginLeft : "-"+(container.size.width+200)+"px",
                            marginRight : "200px"
                        })
                        .insertBefore(container.ul1);
                        apply_mask(container.ul1);
                        apply_fancybox(container.ul1);

                    }else{
                        apply_mask(container.ul2);
                        apply_fancybox(container.ul2);
                    }

                    if( typeof options.onLoadAfter=="function" ) options.onLoadAfter(Page.index);
                });
           break;

           case 2: case 3:

                container.ul.css({
                    width  : container.size.width+"px",
                    height : container.size.height+"px"
                });
                container.ul.empty();

                var arrayLI = new Array();
                var t = 500, n = 0, index=0;
                var code="", c="";
                temp = new Array();


                for( i=start; i<=end; i++ ){
                    tagLI.find("a").attr("href", infoImg[i].src);
                    img = tagLI.find("img");
                    img.attr("src", infoImg[i].src_thumb);
                    img.attr("alt", (infoImg[i].alt && infoImg[i].alt!="") ? infoImg[i].alt : infoImg[i].src_thumb.substr(infoImg[i].src_thumb.lastIndexOf("/")+1));
                    tagLI.css("opacity", "0");

                    var newTag = tagLI.clone();
                    container.ul.append(newTag);
                    arrayLI[i] = newTag;

                    if( options.effect==2 ){
                        n++;
                        
                        index = direction=="right" ? i : (end+1)-n;

                        c = ', function(){';
                        if( i==end ) {
                            c+= 'apply_mask();';
                            c+= 'if( typeof options.onLoadAfter=="function" ) options.onLoadAfter(Page.index);';
                            c+= 'apply_fancybox(container.ul);';
                        }
                        c+= '}';

                        code+='temp.push(setTimeout(function(){arrayLI['+index+'].animate({opacity:'+options.maskOpacity+'}, 1000'+c+')}, '+t+'));';
                        t+=150;
                    }
               }
               
               if( options.effect==3 ) {
                    var arrayIndexRandom = new Array();
                    do{
                       var val = Random(start, end);
                       if( $.inArray(val, arrayIndexRandom)==-1 ) arrayIndexRandom.push(val);

                    }while( arrayIndexRandom.length<(end-start+1) );

                    code="";
                    $(arrayIndexRandom).each(function(i, index){
                        c = ', function(){';
                        if( i==arrayIndexRandom.length-1 ) {
                            c+= 'apply_mask();';
                            c+= 'if( typeof options.onLoadAfter=="function" ) options.onLoadAfter(Page.index);';
                            c+= 'apply_fancybox(container.ul);';
                        }
                        c+= '}';

                        code+='temp.push(setTimeout(function(){arrayLI['+index+'].animate({opacity : '+options.maskOpacity+'}, 1000'+c+')}, '+t+'));';
                        t+=150;
                    });
               }
               eval(code);
               
               working = false;
           break;
        }

        This.indexpage = Page.index;
     };

     var Random = function(inf,sup){
	var numP = sup - inf;
	var rnd;
        rnd = Math.random() * numP;
	rnd = Math.round(rnd);
	return parseInt(inf) + rnd;
     };

     var initializer_fancybox = function(){
         if( options.fancybox.url!="" ){
             $("head").append('<link rel="stylesheet" type="text/css" href="'+options.fancybox.url+'/jquery.fancybox.css" media="screen" />');
             $("head").append('<script type="text/javascript" src="'+options.fancybox.url+'/jquery.easing.1.3.js"></script>');
             $("head").append('<script type="text/javascript" src="'+options.fancybox.url+'/jquery.fancybox-1.2.1.pack.js"></script>');
             container.ul.find("a").fancybox(options.fancybox.options);
         }
     };

     var apply_fancybox = function(el){
         if( options.fancybox.url!="" ){
            el.find("a").each(function(){
                if( options.fancybox.rel!="" ) $(this).attr("rel", options.fancybox.rel);
                if( options.fancybox.title ) $(this).attr("title", $(this).find("img").attr("alt"));
            }).fancybox(options.fancybox.options);
         }
     };


    /*  INITIALIZER
     **************************************************************************/
    $(document).ready(function(){
        container.div = $(options.selector);
        container.ul = container.div.find("ul");
        if( container.div.length>0 ) {
            apply_mask();
            set_info_page();
            initializer();
            initializer_fancybox();
        }
        else error=true;        
    });

}