<?php
if (!empty($_FILES)) {
    $nomFichier = $_FILES['File']['name'];
    $tempRep = $_FILES['File']['tmp_name'];
    $tailleFichier = $_FILES['File']['size'];
    $typeFichier = $_FILES['File']['type'];
    $error = $_FILES['File']['error'];

    if ($error != 0 || !$tempRep) {
        echo "<p style='color:red'>Erreur : le fichier n'a pas pu être uploadé";
        die();
    }

    $extension = strrchr($nomFichier, '.');
    $exte = strtolower($extension);
    $tabExtensionFilm = array('.mp4', '.avi', '.mkv');
    $tabExtensionMusique = array('.mp3');
    $tabExtensionPhoto = array('.jpg', '.jpeg', '.png', '.gif');
    // parcours le tableau des extensions acceptés.
    if (!in_array($exte, $tabExtensionFilm)) {
        echo "<p style='color:red';>Le fichier n'est pas un film</p>";
    } else {
        if (move_uploaded_file($tempRep, 'videos/' . $nomFichier)) {
            echo "<div'><p style='color:green'>chargement du fichier " . $nomFichier . " terminé</p></div>";
        } else {
            echo "<div style='color:white'><p>Une erreur est survenue lors de l'envoi du fichier</p></div>";
        }
    }

    if (!in_array($exte, $tabExtensionMusique)) {
        echo "<p style='color:red';>Le fichier n'est pas une musique</p>";
    } else {
        if (move_uploaded_file($tempRep, 'musique/' . $nomFichier)) {
            echo "<div'><p style='color:green'>chargement du fichier " . $nomFichier . " terminé</p></div>";
        } else {
            echo "<div style='color:white'><p>Une erreur est survenue lors de l'envoi du fichier</p></div>";
        }
    }

    if (!in_array($exte, $tabExtensionPhoto)) {
        echo "<p style='color:red';>Le fichier n'est pas une image</p>";
    } else {
        if (move_uploaded_file($tempRep, 'img/photoFamille/' . $nomFichier)) {
            echo "<div'><p style='color:green'>chargement du fichier " . $nomFichier . " terminé</p></div>";
        } else {
            echo "<div style='color:white'><p>Une erreur est survenue lors de l'envoi du fichier</p></div>";
        }
    }
}
?>