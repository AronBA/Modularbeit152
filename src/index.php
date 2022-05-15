<?php
include "navbar.php"
?>
<a id="punkt2"></a>
    <div class="container mt-5">

        <div class="row">
            <div class="col-sm-8">

            <h2 >Punkt 2: GD-Library</h2>
                <?php
                if (file_exists("temp/temp.jpg")){
                    echo "<img src='temp/temp.jpg' alt='edited photo'>";
                } else {
                    echo "<img src='../static/img/gd-library-logo.png'>";
                }
                ?>
                <p>Ergänzen Sie mittels PHP und der GD-Library auf einem von Ihnen vorgegebenen Bild Ihren Vornamen und darunter Ihre Klasse. In der Mitte dieses Bildes platzieren Sie das WMS-Logo mit einer Breite von 100 Pixeln</p>
                <form method="post" action="backend.php" enctype="multipart/form-data">
                    <div class="col-auto">
                        <label class="form-label" for="customFile">Wähle ein Bild (JPG) für eine Demo</label>
                        <input type="file" class="form-control" id="customFile" name="customFile" required/>
                        <button type="submit" class="btn btn-primary mb-3" name="upload">hochladen</button>
                    </div>
                </form>
                <pre class="prettyprint">
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


    $white = imagecolorallocate($im, 255, 255, 255);
    $font = '../static/fonts/arial.ttf';
// Text in Bild einfügen

    $sx2 = (imagesx($im2) / 2);
    $sx = (imagesx($im) / 2) - $sx2;
    $sy = (imagesy($im) / 2) ;


    imagettftext($im, $sx  / 7, 0, imagesx($im) - (imagesx($im)/100 * 13), (imagesy($im))-((imagesy($im))/100 * 12), $white, $font, 'Aron');
    imagettftext($im, $sx / 7, 0, imagesx($im) - (imagesx($im)/100 * 13), (imagesy($im))-((imagesy($im))/100 * 5), $white, $font, 'I2a');

    imagecopymerge_alpha($im, $im2, $sx, $sy, 0, 0, imagesx($im2), imagesy($im2), 99);

    header('Content-Type: image/jpeg');


    Imagejpeg($im, '../Thumbnails/test.jpg', 100);
    unlink($img);
    imagedestroy($im);
    imagedestroy($im2);
    resize();
    redirect("../index.php");
}
            </pre>
                <a id="punkt3"></a>
                <hr class="solid">

            <h2>Punkt 3: Animated GIF</h2>
                <img src=../static/img/aron.gif>
            <?php echo filesize("../static/img/aron.gif") / 1048576 . " MB"; ?>

            <p>Erstellen Sie und platzieren Sie auf der Website ein eigenes, mit ihrer Hardware erstelltes, auf Sie bezogenes animated GIF, dass mindestens 10 Bilder besitzt und in einer Endlosschlaufe läuft (z.B. Stop-Motion). Es soll korrekt in HTML eingebunden sein und einen Untertitel unterhalb des Bildes besitzen, inkl. der Dateigrösse des GIFs.</p>

            <a id="punkt4"></a>
            <hr class="solid">

            <h2>Punkt 4: Bilder reduzieren</h2>
            <img src="../static/img/folder.png">
            <p>Schreiben Sie ein Skript in PHP, dass alle JPEG-Bilder in einem von ihnen vorhandenen Bilder-Verzeichnis durchsucht und dabei zwei Versionen mit max. 500 Pixeln Breite (inkl. Dateinamen im Bild) oder max. 200 Pixeln Breite im Ordner "Bilder" und "Thumbnails" erstellt.</p>
                <form method="post" action="backend.php" enctype="multipart/form-data">
                    <div class="col-auto">
                        <label class="form-label" for="submit">Skaliert alle Bilder nochmal (dauert eine weile)</label>
                        <button type="submit" class="btn btn-primary mb-3" name="scalesubmit">skalieren</button>
                    </div>
                </form>
                <pre class="prettyprint">
function resize(){
    $dirc = '../Thumbnails/';
    $images = glob($dirc . "*.jpg");
// 500px breite
    foreach ($images as $image) {
        $im_php = imagecreatefromjpeg($image);
        $im_php = imagescale($im_php, 500);

        $white = imagecolorallocate($im_php, 255, 255, 255);
        $font = '../static/fonts/arial.ttf';
        imagettftext($im_php, 12, 0, 20,20, $white, $font, pathinfo($image)["filename"].".jpg");

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
            </pre>


            <a id="punkt6"></a>
            <hr class="solid">

            <h2 >Punkt 6: Video einbinden</h2>
            <video controls>
                <source src="../static/img/video.mp4" type="video/mp4">
            </video>
            <p>Bereiten Sie ein neues eigenes Video vor, dass ihren Code zum Punkt 4 erklärt. Das Video muss im Minimum 5 Minuten lang sein. Dieses Video binden Sie korrekt in Ihre Seite ein. Informieren Sie sich dabei über die aktuellsten HTML5 Video-Tags und benutzen Sie diese.</p>


        </div>
    </div>
</div>

<?php
include "footer.php"
?>
