<?php
if (!empty($_FILES)) {
    $nomFichier = $_FILES['musiqueFile']['name'];
    $tempRep = $_FILES['musiqueFile']['tmp_name'];
    $tailleFichier = $_FILES['musiqueFile']['size'];
    $typeFichier = $_FILES['musiqueFile']['type'];
    $error = $_FILES['musiqueFile']['error'];

    if ($error != 0 || !$tempRep) {
        echo "<p style='color:red'>Erreur : le fichier n'a pas pu être uploadé";
        die();
    }

    $extension = strrchr($nomFichier, '.');
    $exte = strtolower($extension);
    $tabExtension = array('.mp3');
    // parcours le tableau des extensions acceptés.
    if (!in_array($exte, $tabExtension)) {
        echo "<p style='color:red';>Le fichier n'est pas une musique</p>";
    } else {
        if (move_uploaded_file($tempRep, 'musique/' . $nomFichier)) {
            echo "<div><p style='color:green'>chargement du fichier " . $nomFichier . " terminé</p></div>";
        } else {
            echo "<div style='color:white'><p>Une erreur est survenue lors de l'envoi du fichier</p></div>";
        }
    }
}
?>