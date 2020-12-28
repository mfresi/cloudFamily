<?php
if (!empty($_FILES)) {
    $nomFichier = $_FILES['filmFile']['name'];
    $tempRep = $_FILES['filmFile']['tmp_name'];
    $tailleFichier = $_FILES['filmFile']['size'];
    $typeFichier = $_FILES['filmFile']['type'];
    $error = $_FILES['filmFile']['error'];

    if ($error != 0 || !$tempRep) {
        echo "<p style='color:red'>Erreur : le fichier n'a pas pu être uploadé";
        die();
    }

    $extension = strrchr($nomFichier, '.');
    $exte = strtolower($extension);
    $tabExtension = array('.mp4', '.avi', '.mkv');
    // parcours le tableau des extensions acceptés.
    if (!in_array($exte, $tabExtension)) {
        echo "<p style='color:red';>Le fichier n'est pas un film</p>";
    } else {
        if (move_uploaded_file($tempRep, 'videos/' . $nomFichier)) {
            echo "<div'><p style='color:green'>chargement du fichier " . $nomFichier . " terminé</p></div>";
        } else {
            echo "<div style='color:white'><p>Une erreur est survenue lors de l'envoi du fichier</p></div>";
        }
    }
}
?>