<?php

function imagecopymerge_alpha($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h, $pct){
    // creating a cut resource
    $cut = imagecreatetruecolor($src_w, $src_h);

    // copying relevant section from background to the cut resource
    imagecopy($cut, $dst_im, 0, 0, $dst_x, $dst_y, $src_w, $src_h);

    // copying relevant section from watermark to the cut resource
    imagecopy($cut, $src_im, 0, 0, $src_x, $src_y, $src_w, $src_h);

    // insert cut resource to destination image
    imagecopymerge($dst_im, $cut, $dst_x, $dst_y, 0, 0, $src_w, $src_h, $pct);
}

function mark($img){
    // Melde alle PHP Fehler (siehe Changelog)
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

// Ein bestehendes Bild nehmen

    $im = imagecreatefromjpeg($img);
    $im2 = imagecreatefrompng('../static/img/logo.png');

// Hier wäre ein leeres Bild
//$im = imagecreatetruecolor(240, 80);
    $text_color = imagecolorallocate($im, 233, 14, 91);
    $white = imagecolorallocate($im, 255, 255, 255);
    $grey = imagecolorallocate($im, 100, 100, 100);
    $black = imagecolorallocate($im, 0, 0, 0);
    $font = '../static/fonts/arial.ttf';
// Text in Bild einfügen

    $sx2 = (imagesx($im2) / 2);

    $sx = (imagesx($im) / 2) - $sx2;
    $sy = (imagesy($im) / 2) ;

    imagettftext($im, 100, 0, 2500, 1900, $white, $font, 'Aron Baur');
    imagettftext($im, 100, 0, 2500, 1700, $white, $font, 'I2a');

    imagecopymerge_alpha($im, $im2, $sx, $sy, 0, 0, imagesx($im2), imagesy($im2), 99);





    header('Content-Type: image/jpeg');


    imagedestroy($im);
    imagedestroy($im2);
    return $im;
}


function resize(){

    $dirc = '../Thumbnails/';
    $images = glob($dirc . "*.jpg");
// 500px breite
    foreach ($images as $image) {
        $im_php = imagecreatefromjpeg($image);
        $im_php = imagescale($im_php, 500);
        $new_height = imagesy($im_php);
        $new_name = str_replace('-1920x1080', '-500x' . $new_height, basename($image));
        imagejpeg($im_php, $dirc . 'resize500/' . $new_name);
    }
// 200px breite
    foreach ($images as $image) {
        $im_php = imagecreatefromjpeg($image);
        $im_php = imagescale($im_php, 200);
        $new_height = imagesy($im_php);
        $new_name = str_replace('-1920x1080', '-200x' . $new_height, basename($image));
        imagejpeg($im_php, $dirc . 'resize200/' . $new_name);
    }


}

function redirect($url, $permanent = false) {
    header('Location: ' . $url, true, $permanent ? 301 : 302);
    exit();
}

if(isset($_POST["scalesubmit"])) {
    resize();
    redirect("index.html", false);
}

if(isset($_POST["upload"])) {
    $target_dir = "../temp/";
    $target_file = $target_dir . basename($_FILES["customFile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["customFile"]["tmp_name"]);

    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";

    } else {
        if (move_uploaded_file($_FILES["customFile"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["customFile"]["name"])) . " has been uploaded.";
            include_once "Watermark.php";
            mark("../temp/$target_file");

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

if(isset($_POST["galleryupload"])) {
    $target_dir = "../Thumbnails/";
    $target_file = $target_dir . basename($_FILES["customFile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["customFile"]["tmp_name"]);

    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";

    } else {
        if (move_uploaded_file($_FILES["customFile"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["customFile"]["name"])) . " has been uploaded.";
            resize();
            redirect("gallery.php");


        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}





