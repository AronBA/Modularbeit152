<?php

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

    imagejpeg($im);

    imagedestroy($im);
    imagedestroy($im2);
    unlink($img);