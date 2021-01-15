<?php
session_start();
if (empty($_SESSION)) {
    header('Location: login.php');
}
?>

<script>
    function _(elmt) {
        return document.getElementById(elmt);
    }

    function uploadFile() {

        var file = _('File').files[0];

        if (file != undefined) {
            var data = new FormData();
            data.append('File', file);

            var ajax = new XMLHttpRequest();
            ajax.upload.addEventListener("progress", progressHandler, false);
            ajax.addEventListener("load", completeHandler, false);
            ajax.addEventListener("error", errorHandler, false);
            ajax.addEventListener("abort", abortHandler, false);
            ajax.open("POST", "uploadFile.php");
            ajax.send(data);

            function progressHandler(event) {
                var pourcentage = (event.loaded / event.total) * 100;
                _('progressBar').value = Math.round(pourcentage);
                _('status').innerHTML = "<div style='color:white'><p>" + Math.round(pourcentage) + '% uploadé... Patientez </p></div>';
            }

            function completeHandler(event) {
                _('status').innerHTML = event.target.responseText;
                _('progressBar').value = 0;
            }

            function errorHandler() {
                _('status').innerHTML = "L'upload a echoué !";
            }

            function abortHandler() {
                _('status').innerHTML = "L'upload a ete annulé !";
            }
        } else {
            _('status').innerHTML = "<div><p style='color:red'>Veuillez glisser un fichier !</p></div>";
        }
    }

    function uploadFilePerso() {
        var i;
        if (_('filePerso').files.length != 0) {
            for (i = 0; i < _('filePerso').files.length; i++) {
                var file = _('filePerso').files[i];
                var data = new FormData();
                data.append('filePerso', file);

                var ajax = new XMLHttpRequest();
                ajax.upload.addEventListener("progress", progressHandler, false);
                ajax.addEventListener("load", completeHandler, false);
                ajax.addEventListener("error", errorHandler, false);
                ajax.addEventListener("abort", abortHandler, false);
                ajax.open("POST", "uploadFilePerso.php");
                ajax.send(data);

                function progressHandler(event) {
                    var pourcentage = (event.loaded / event.total) * 100;
                    _('progressBarPerso').value = Math.round(pourcentage);
                    _('statusPerso').innerHTML = "<div style='color:white'><p>" + Math.round(pourcentage) + '% uploadé... Patientez </p></div>';
                }

                function completeHandler(event) {
                    _('statusPerso').innerHTML = event.target.responseText;
                    _('progressBarPerso').value = 0;
                }

                function errorHandler() {
                    _('statusPerso').innerHTML = "L'upload a echoué !";
                }

                function abortHandler() {
                    _('statusPerso').innerHTML = "L'upload a ete annulé !";
                }
            }
        } else {
            _('statusPerso').innerHTML = "<div><p style='color:red'>Veuillez glisser un fichier !</p></div>";
        }
    }
</script>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Famille Fresi</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/plyr.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="./index.php">
                            <img src="img/Logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li><a href="./index.php">Home</a></li>
                                <li><a href="">Categories <span class="arrow_carrot-down"></span></a>
                                    <ul class="dropdown">
                                        <li><a href="./films.php">Films</a></li>
                                        <li><a href="./photos.php">Photos</a></li>
                                        <li><a href="./musiques.php">Musiques</a></li>
                                    </ul>
                                </li>
                                <li class="active"><a href="./maPage.php">Ma page</a></li>
                                <li><a href="./monEspace.php">Mon espace</a></li>
                                <li><a href="./contact.php">Contact</a></li>
                                <a href="./disconnect.php"><span style="color:red;">Deconnexion</span></a>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Normal Breadcrumb Begin -->
    <section class="normal-breadcrumb set-bg" data-setbg="img/banniereEchange.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>Votre Page</h2>
                        <p>Bienvenue sur ta page <?= $_SESSION['name'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Normal Breadcrumb End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="publique">
                <h1>Publique :</h1>
                <div class="addFilm">
                    <h4><u>Ajouter un fichier : </u></h4>
                    <h6><em>L'ajout d'un film peut prendre quelques secondes.</em></h6>
                    <form method="POST" enctype="multipart/form-data">
                        <p><progress id='progressBar' value="0" max="100" style="width: 300px;"></progress></p>
                        <input type="file" id="File" name="File">
                        <input type="button" name="chargementFile" value="Ajouter le fichier" onclick="uploadFile()">
                    </form>
                    <h2 id="status"></h2>
                </div>
            </div>
            <div class="prive">
                <h1>Privé :</h1>
                <div class="addImgPerso">
                    <h4><u>Ajouter un fichier : (en privé)</u></h4>
                    <form method="POST" enctype="multipart/form-data">
                        <p><progress id='progressBarPerso' value="0" max="100" style="width: 300px;"></progress></p>
                        <input type="file" id="filePerso" name="filePerso" multiple>
                        <input type="button" name="chargementPerso" value="Ajouter l'image" onclick="uploadFilePerso()">
                    </form>
                    <h2 id="statusPerso"></h2>
                </div>
            </div>
        </div>
        <!-- Blog Section End -->

        <!-- Footer Section Begin -->
        <footer class="footer">
            <div class="page-up">
                <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="footer__logo">
                            <a href="./index.html"><img src="img/Logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="footer__nav">
                            <ul>
                                <li class="active"><a href="./index.php">Home</a></li>
                                <li><a href="./categories.php">Categories</a></li>
                                <li><a href="./maPage.php">Ma page</a></li>
                                <li><a href="">Contacts</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Mattei Fresi</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>

                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Section End -->

        <!-- Search model Begin -->
        <div class="search-model">
            <div class="h-100 d-flex align-items-center justify-content-center">
                <div class="search-close-switch"><em class="icon_close"></em></div>
                <form class="search-model-form">
                    <input type="text" id="search-input" placeholder="Search here.....">
                </form>
            </div>
        </div>
        <!-- Search model end -->

        <!-- Js Plugins -->
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/player.js"></script>
        <script src="js/jquery.nice-select.min.js"></script>
        <script src="js/mixitup.min.js"></script>
        <script src="js/jquery.slicknav.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/main.js"></script>

</body>

</html>