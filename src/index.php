<!DOCTYPE html>
<html lang="de">
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="../static/css/styles.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
</head>
<body>
    <div class="toppanel">
        <img src="../static/img/backgroundTop.jpg" alt="gym" class="background">
    </div>


<nav class="navbar navbar-expand-sm bg-dark navbar-dark" id="myHeader">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#punkt1">Journal</a>
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
                <a class="nav-link" href="gallery.php">Galerie</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#punkt6">Video</a>
            </li>

        </ul>
    </div>
</nav>

<div class="container mt-5">
    <div class="row">
        <div class="col-sm-8">

            <h2 id="punkt1">Lernjournal</h2>
            <h5></h5>
            <img src="../static/img/mdlogo.png">
            <p>In Ihrem Lernjournal erklären Sie, wie und mit was Sie verschiedene multimediale Inhalte erstellen und in welchem Format Sie diese in Ihre Website integrieren. Reflektieren Sie, auf welche Probleme Sie gestossen sind.</p>
                <a href="../docs/Journal.md" type="button" class="btn btn-primary mb-3" download="journal">herunterladen</a>

            <a id="punkt2"></a>
            <hr class="solid">

            <h2 >Punkt 2: GD-Library</h2>
            <h5></h5>
            <img src="../static/img/gd-library-logo.png">
            <p>Ergänzen Sie mittels PHP und der GD-Library auf einem von Ihnen vorgegebenen Bild Ihren Vornamen und darunter Ihre Klasse. In der Mitte dieses Bildes platzieren Sie das WMS-Logo mit einer Breite von 100 Pixeln</p>
            <form method="post" action="backend.php" enctype="multipart/form-data">
                <div class="col-auto">
                    <label class="form-label" for="customFile">Wähle ein Bild</label>
                    <input type="file" class="form-control" id="customFile" name="customFile" required/>
                    <button type="submit" class="btn btn-primary mb-3" name="upload">hochladen</button>
                </div>
            </form>

            <a id="punkt3"></a>
            <hr class="solid">

            <h2>Punkt 3: Animated GIF</h2>
            <img src="../static/img/zyzz.gif">
            <p>Erstellen Sie und platzieren Sie auf der Website ein eigenes, mit ihrer Hardware erstelltes, auf Sie bezogenes animated GIF, dass mindestens 10 Bilder besitzt und in einer Endlosschlaufe läuft (z.B. Stop-Motion). Es soll korrekt in HTML eingebunden sein und einen Untertitel unterhalb des Bildes besitzen, inkl. der Dateigrösse des GIFs.</p>

            <a id="punkt4"></a>
            <hr class="solid">

            <h2>Punkt 4: Bilder reduzieren</h2>
            <img src="../static/img/folder.png">
            <p>Schreiben Sie ein Skript in PHP, dass alle JPEG-Bilder in einem von ihnen vorhandenen Bilder-Verzeichnis durchsucht und dabei zwei Versionen mit max. 500 Pixeln Breite (inkl. Dateinamen im Bild) oder max. 200 Pixeln Breite im Ordner "Bilder" und "Thumbnails" erstellt.</p>
            <form method="post" action="backend.php" enctype="multipart/form-data">
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3" name="scalesubmit">skalieren</button>
                </div>
            </form>

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

<div class="mt-5 p-4 bg-dark text-white text-center">
    <p>Copyright © 2022 Aron Baur</p>
    <p><a href="https://github.com/AronBA/Modularbeit151"><img id="footericon" src="../static/img/github.png"></a> </p>
<script src="../static/js/scripts.js"></script>

</div>

</body>
</html>
