<!DOCTYPE html>
<html lang="de">
<head>
    <title>Galerie</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="../static/css/styles.css" rel="stylesheet">
</head>

<body class="galeriebody">
<nav class="navbar navbar-expand-sm bg-dark navbar-dark" id="myHeader">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="journal.html">Journal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../index.php#punkt2">GD Library</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../index.php#punkt3">Animated GIF</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../index.php#punkt4">Skalieren</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="gallery.php">Galerie</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../index.php#punkt6">Video</a>
            </li>
        </ul>
    </div>
</nav>

<div class="card">
    <div class="card-body">
        <h1 id="gallerietitle">Punkt 5: Fotogalerie erstellen</h1>
        <p class="card-text">Erstellen Sie eine Fotogalerie mit den reduzierten Fotos (Punkt 4) aus dem Verzeichnis "Thumbnails". Wenn Sie auf ein Bild klicken, wird die grössere Version angezeigt, ohne das Bild zu vergrössern. Punkt 4 muss vorher ausgeführt sein.</p>
        <form method="post" action="backend.php" enctype="multipart/form-data">
            <div class="col-auto">
                <input type="file" class="form-control" id="customFile" name="customFile" required/>
                <button type="submit" class="btn btn-primary mb-3" name="galleryupload" id="liveToastBtn">hochladen</button>
            </div>
        </form>
    </div>
</div>

<div class='gallery'>
    <div class="left">
        <?php
        include "backend.php";
    $dir = new DirectoryIterator(dirname("../Thumbnails/p1.jpg"));
    foreach ($dir as $fileinfo) {
        if ($fileinfo->isFile()) {
            $modalname = "modal" . $fileinfo;
            echo "
       
        <a href='?img=$fileinfo'><img
            src='../Thumbnails/resize200/$fileinfo' alt='$fileinfo not found'/></a>
         

";

        }
    }

        ?>
    </div>

        <?php
        if (isset($_GET["img"])){
            $img = $_GET["img"];
            echo " <div class='right'>
                    <a href='../Thumbnails/resize500/$img' target='_blank'>
                    <img src='../Thumbnails/resize500/$img' alt='$img not found'/>
                    </a>
                    <br>
                    <br>
                    <a href='../Thumbnails/resize500/$img' type='button' class='btn btn-primary mb-3' class='imgbutton' download='$img'>download</a>
                    <a type='button' href='backend.php?delete=$img' class='btn btn-danger mb-3' class='imgbutton'>löschen</a>
                    </div>
                    

                    
                    ";
        }
        ?>


</div>


<script src="../static/js/scripts.js"></script>
</body>
</html>
