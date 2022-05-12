
<!DOCTYPE html>
<html lang="de">
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="static/css/styles.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
</head>
<body>



<nav class="navbar navbar-expand-sm bg-dark navbar-dark" id="myHeader">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="src/journal.html">Journal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#punkt2">GD Library</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#punkt3">Animated GIF</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#punkt4">Skalieren</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="src/gallery.php">Galerie</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#punkt6">Video</a>
            </li>

        </ul>
    </div>
</nav>
<a id="punkt2"></a>
    <div class="container mt-5">

        <div class="row">
            <div class="col-sm-8">

            <h2 >Punkt 2: GD-Library</h2>
            <img src="static/img/gd-library-logo.png" alt="gd-logo">
                <p>Ergänzen Sie mittels PHP und der GD-Library auf einem von Ihnen vorgegebenen Bild Ihren Vornamen und darunter Ihre Klasse. In der Mitte dieses Bildes platzieren Sie das WMS-Logo mit einer Breite von 100 Pixeln</p>
                <form method="post" action="src/backend.php" enctype="multipart/form-data">
                    <div class="col-auto">
                        <label class="form-label" for="customFile">Wähle ein Bild</label>
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
            <img src="static/img/zyzz.gif" >
            <?php echo filesize("static/img/zyzz.gif") / 1048576 . " MB"; ?>

            <p>Erstellen Sie und platzieren Sie auf der Website ein eigenes, mit ihrer Hardware erstelltes, auf Sie bezogenes animated GIF, dass mindestens 10 Bilder besitzt und in einer Endlosschlaufe läuft (z.B. Stop-Motion). Es soll korrekt in HTML eingebunden sein und einen Untertitel unterhalb des Bildes besitzen, inkl. der Dateigrösse des GIFs.</p>

            <a id="punkt4"></a>
            <hr class="solid">

            <h2>Punkt 4: Bilder reduzieren</h2>
            <img src="static/img/folder.png">
            <p>Schreiben Sie ein Skript in PHP, dass alle JPEG-Bilder in einem von ihnen vorhandenen Bilder-Verzeichnis durchsucht und dabei zwei Versionen mit max. 500 Pixeln Breite (inkl. Dateinamen im Bild) oder max. 200 Pixeln Breite im Ordner "Bilder" und "Thumbnails" erstellt.</p>
                <form method="post" action="src/backend.php" enctype="multipart/form-data">
                    <div class="col-auto">
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
                <source src="static/img/video.mp4" type="video/mp4">
            </video>
            <p>Bereiten Sie ein neues eigenes Video vor, dass ihren Code zum Punkt 4 erklärt. Das Video muss im Minimum 5 Minuten lang sein. Dieses Video binden Sie korrekt in Ihre Seite ein. Informieren Sie sich dabei über die aktuellsten HTML5 Video-Tags und benutzen Sie diese.</p>


        </div>
    </div>
</div>

    <div class="mt-5 p-4 bg-dark text-white text-center">
        <p>Copyright © 2022 Aron Baur</p>
        <p><a href="https://github.com/AronBA/Modularbeit151"><img id="footericon" src="static/img/github.png"></a> </p>
        <script src="static/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js"></script>
    </div>

</body>
</html>
