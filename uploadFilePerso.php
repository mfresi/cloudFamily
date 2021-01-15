<?php
session_start();
?>
<?php
if (!empty($_FILES)) {
    $nomFichier = $_FILES['filePerso']['name'];
    $tempRep = $_FILES['filePerso']['tmp_name'];
    $tailleFichier = $_FILES['filePerso']['size'];
    $typeFichier = $_FILES['filePerso']['type'];
    $error = $_FILES['filePerso']['error'];

    if ($error != 0 || !$tempRep) {
        echo "<p style='color:red'>Erreur : le fichier n'a pas pu être uploadé";
        die();
    }

    $extension = strrchr($nomFichier, '.');
    $exte = strtolower($extension);
    $tabExtension = array('.png', '.jpg', '.jpeg', '.gif');
    // parcours le tableau des extensions acceptés.
    if (!in_array($exte, $tabExtension)) {
        echo "<p style='color:red';>Le fichier n'est pas une image</p>";
    } else {
        if (move_uploaded_file($tempRep, $_SESSION['name'].'/' . $nomFichier)) {
            echo "<div><p style='color:green'>chargement du fichier " . $nomFichier . " terminé</p></div>";
        } else {
            echo "<div style='color:white'><p>Une erreur est survenue lors de l'envoi du fichier</p></div>";
        }
    }
}
?>