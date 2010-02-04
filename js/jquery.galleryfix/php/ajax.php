<?php
/*
 * SCRIPT: GalleryFix
 * AUTOR: Ivan Mattoni
 * EMPRESA: MyDesign
 * www.mydesign.com.ar
 *
 */
chdir("../../../");
$images = array();
$dir = "images/gallery/thumbs";
$dir2 = "images/gallery";
$d=opendir($dir);

while( $file = readdir($d) ){
    if( $file!="." AND $file!=".." ){
        if( is_file($dir.'/'.$file) ){
            $images[] = array(
                "src" => $dir2.'/'.$file,
                "src_thumb" => $dir.'/'.$file,
                "alt"       => ""
            );
        }
    }
}

echo json_encode($images);
?>
