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

    function uploadFilm() {

        var file = _('filmFile').files[0];

        if (file != undefined) {
            var data = new FormData();
            data.append('filmFile', file);

            var ajax = new XMLHttpRequest();
            ajax.upload.addEventListener("progress", progressHandler, false);
            ajax.addEventListener("load", completeHandler, false);
            ajax.addEventListener("error", errorHandler, false);
            ajax.addEventListener("abort", abortHandler, false);
            ajax.open("POST", "uploadFilm.php");
            ajax.send(data);

            function progressHandler(event) {
                var pourcentage = (event.loaded / event.total) * 100;
                _('progressBarFilm').value = Math.round(pourcentage);
                _('statusFilm').innerHTML = "<div style='color:white'><p>" + Math.round(pourcentage) + '% uploadé... Patientez </p></div>';
            }

            function completeHandler(event) {
                _('statusFilm').innerHTML = event.target.responseText;
                _('progressBarFilm').value = 0;
            }

            function errorHandler() {
                _('statusFilm').innerHTML = "L'upload a echoué !";
            }

            function abortHandler() {
                _('statusFilm').innerHTML = "L'upload a ete annulé !";
            }
        } else {
            _('statusFilm').innerHTML = "<div><p style='color:red'>Veuillez glisser un film !</p></div>";
        }
    }

    function uploadImg() {
        var i;
        if (_('imgFile').files.length != 0) {
            for (i = 0; i < _('imgFile').files.length; i++) {
                var file = _('imgFile').files[i];
                var data = new FormData();
                data.append('imgFile', file);

                var ajax = new XMLHttpRequest();
                ajax.upload.addEventListener("progress", progressHandler, false);
                ajax.addEventListener("load", completeHandler, false);
                ajax.addEventListener("error", errorHandler, false);
                ajax.addEventListener("abort", abortHandler, false);
                ajax.open("POST", "uploadImg.php");
                ajax.send(data);

                function progressHandler(event) {
                    var pourcentage = (event.loaded / event.total) * 100;
                    _('progressBarImg').value = Math.round(pourcentage);
                    _('statusImg').innerHTML = "<div style='color:white'><p>" + Math.round(pourcentage) + '% uploadé... Patientez </p></div>';
                }

                function completeHandler(event) {
                    _('statusImg').innerHTML = event.target.responseText;
                    _('progressBarImg').value = 0;
                }

                function errorHandler() {
                    _('statusImg').innerHTML = "L'upload a echoué !";
                }

                function abortHandler() {
                    _('statusImg').innerHTML = "L'upload a ete annulé !";
                }
            }
        } else {
            _('statusImg').innerHTML = "<div><p style='color:red'>Veuillez glisser une image !</p></div>";
        }

    }

    function uploadMusique() {
        var i;
        if (_('musiqueFile').files.length != 0) {
            for (i = 0; i < _('musiqueFile').files.length; i++) {
                var file = _('musiqueFile').files[i];
                var data = new FormData();
                data.append('musiqueFile', file);

                var ajax = new XMLHttpRequest();
                ajax.upload.addEventListener("progress", progressHandler, false);
                ajax.addEventListener("load", completeHandler, false);
                ajax.addEventListener("error", errorHandler, false);
                ajax.addEventListener("abort", abortHandler, false);
                ajax.open("POST", "uploadMusique.php");
                ajax.send(data);

                function progressHandler(event) {
                    var pourcentage = (event.loaded / event.total) * 100;
                    _('progressBarMusique').value = Math.round(pourcentage);
                    _('statusMusique').innerHTML = "<div style='color:white'><p>" + Math.round(pourcentage) + '% uploadé... Patientez </p></div>';
                }

                function completeHandler(event) {
                    _('statusMusique').innerHTML = event.target.responseText;
                    _('progressBarMusique').value = 0;
                }

                function errorHandler() {
                    _('statusMusique').innerHTML = "L'upload a echoué !";
                }

                function abortHandler() {
                    _('statusMusique').innerHTML = "L'upload a ete annulé !";
                }
            }
        } else {
            _('statusMusique').innerHTML = "<div><p style='color:red'>Veuillez glisser une musique !</p></div>";
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
                                <li><a href="./contact.php">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="header__right">
                        <a href="" class="search-switch"><span class="icon_search"></span></a>
                        <a href="./disconnect.php"><span class="icon_close_alt2" style="color:red;"></span></a>
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
            <div class="addImg">
                <h4><u>Ajouter une photo : </u></h4>
                <form method="POST" enctype="multipart/form-data">
                    <p><progress id='progressBarImg' value="0" max="100" style="width: 300px;"></progress></p>
                    <input type="file" id="imgFile" name="imgFile" multiple>
                    <input type="button" name="chargementImg" value="Ajouter l'image" onclick="uploadImg()">
                </form>
                <h2 id="statusImg"></h2>
            </div>
            <div class="addFilm">
                <h4><u>Ajouter un film : (.mp4 et .mkv)</u></h4>
                <h6><em>L'ajout d'un film peut prendre quelques secondes.</em></h6>
                <form method="POST" enctype="multipart/form-data">
                    <p><progress id='progressBarFilm' value="0" max="100" style="width: 300px;"></progress></p>
                    <input type="file" id="filmFile" name="filmFile">
                    <input type="button" name="chargementFilm" value="Ajouter le film" onclick="uploadFilm()">
                </form>
                <h2 id="statusFilm"></h2>
            </div>
            <div class="addMusique">
                <h4><u>Ajouter une musique : (.mp3)</u></h4>
                <form method="POST" enctype="multipart/form-data">
                    <p><progress id='progressBarMusique' value="0" max="100" style="width: 300px;"></progress></p>
                    <input type="file" id="musiqueFile" name="musiqueFile">
                    <input type="button" name="chargementMusique" value="Ajouter la musique" onclick="uploadMusique()">
                </form>
                <h2 id="statusMusique"></h2>
            </div>
        </div>
    </section>
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