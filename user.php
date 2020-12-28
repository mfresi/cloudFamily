<?php
    class user { //Class pour la page de connexion
        private $_name;
        private $_mdp;

        public function __construct($name, $mdp){
            $this->_name = $name;
            $this->_mdp = $mdp;
        }

        public function verifUser(){ //Fonction vérifiant si les champs sont remplis correctement
            if (!empty($this->_name)) {
                if(!empty($this->_mdp)){
                    $bdd = new PDO('mysql:host=localhost; dbname=famille; charset=utf8', 'root', 'root');
                    $requeteUser = $bdd->prepare("SELECT * FROM user WHERE name = ? AND password = ?");
                    $requeteUser->execute(array($this->_name, $this->_mdp));
                    $userExist = $requeteUser->rowCount();
                    if($userExist == 1){ //Test vérifiant si l'utilisateur correspondant aux coordonnées rentrées par l'utilisateur existe
                        $donneesUser = $requeteUser->fetch();
                        session_start();
                        $_SESSION['logged'] = true;
                        $_SESSION['id'] = $donneesUser['id_user'];
                        $_SESSION['name'] = $donneesUser['name'];
                        header('Location: index.php');
                    }
                    else{
                        return "userNoExist";
                    }
                }
                else{
                    return "mdpVide";
                }
            }
            else{
                return "invalidName";
            }
        }

        public function erreur($erreur){ //Fonction affichant l'erreur dans le formulaire si erreur il y a
            if($erreur == "invalidName"){
                echo "<p class='red-text'>Le nom est invalide</p>";
            }
            if($erreur == "mdpVide"){
                echo "<p class='red-text'>Merci de remplir le champ mot de passe</p>";
            }
            if($erreur == "userNoExist"){
                echo "<p class='red-text'>E-mail ou mot de passe incorrect</p>";
            }
            if($erreur == "succes"){
                echo "<p class='green-text'>Connecté!</p>";
            }
        }
    }
?>