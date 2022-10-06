<?php
	class Fonctions {

	    // Les propriétés sont définies en mode privé
		private $connexion;
		private $errorArray;

		public function __construct($connexion) {
			$this->connexion = $connexion;
			$this->errorArray = array();
		}

        // on récupère le pseudo
		public function login($username, $mdp) {

			$mdp = md5($mdp); // la fonction md5() convertie une chaine de caractères en chaine de 32 caractères d'après un algorithme PHP, cf doc

			$query = mysqli_query($this->connexion, "SELECT * FROM users WHERE username='$username' AND password='$mdp'");

			// si la requête sql renvoie un résultat, alors il n'y a pas d'erreur
			if(mysqli_num_rows($query) == 1) {
				return true;
			}
			else {
				array_push($this->errorArray, Erreurs::$loginFailed);
				return false;
			}

		}

		public function register($username, $firstname, $lastname, $email, $email2, $mdp, $mdp2) {
			$this->validateUsername($username);
			$this->validateFirstName($firstname);
			$this->validateLastName($lastname);
			$this->validateEmails($email, $email2);
			$this->validatePasswords($mdp, $mdp2);

			if(empty($this->errorArray) == true) {
				// on insère les données à partir de la fonction insertUserDetails
				return $this->insertUserDetails($username, $firstname, $lastname, $email, $mdp);
			}
			else {
				return false;
			}

		}

		public function getError($error) {
			if(!in_array($error, $this->errorArray)) {
				$error = "";
			}
			return "<span class='errorMessage'>$error</span>";
		}

		// On insère les données dans la base
		private function insertUserDetails($username, $firstname, $lastname, $email, $mdp) {
			$encryptedPw = md5($mdp);
            // on crée une variable qui va attribuer une photo de profil aléatoire à l'utilisateur
			$profilePic = "inclusion/images/avatars/defaults/default" . rand(1, 8) . ".png";
			$date = date("Y-m-d"); //la variable date va récupérer la date à laquelle l'utilisateur s'inscrit

            // on insère le tout dans la base
			$result = mysqli_query($this->connexion, "INSERT INTO users VALUES ('', '$username', '$firstname', '$lastname', '$email', '$encryptedPw', '$date', '$profilePic')");

			return $result;
		}

		// vérification du pseudo
		private function validateUsername($username) {

		    // un pseudo devra avoir entre 5 et 25 lettres
			if(strlen($username) > 25 || strlen($username) < 5) {
				array_push($this->errorArray, Erreurs::$usernameCharacters);
				return;
			}

			// on vérifie que le pseudo n'existe pas deja dans la base
			$checkUsernameQuery = mysqli_query($this->connexion, "SELECT username FROM users WHERE username='$username'");
			if(mysqli_num_rows($checkUsernameQuery) != 0) {
				array_push($this->errorArray, Erreurs::$usernameTaken);
				return;
			}

		}

        // vérification du prénom
		private function validateFirstName($firstname) {
            // un prénom devra avoir entre 2 et 25 lettres
			if(strlen($firstname) > 25 || strlen($firstname) < 2) {
				array_push($this->errorArray, Erreurs::$firstNameCharacters);
				return;
			}
		}

        // vérification du nom
		private function validateLastName($lastname) {
			if(strlen($lastname) > 25 || strlen($lastname) < 2) {
				array_push($this->errorArray, Erreurs::$lastNameCharacters);
				return;
			}
		}

        // vérification de l'email
		private function validateEmails($email, $email2) {
		    // si l'adresse de confirmation est différente on affiche une erreur
			if($email != $email2) {
				array_push($this->errorArray, Erreurs::$emailsDoNotMatch);
				return;
			}

			// on vérifie que l'email soit au bon format, l'input type="email" vérifie normalement que l'adresse mail soit correcte avant d'envoyer
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				array_push($this->errorArray, Erreurs::$emailInvalid);
				return;
			}

			// on vérifie que le mail n'existe pas dans la base
			$checkEmailQuery = mysqli_query($this->connexion, "SELECT email FROM users WHERE email='$email'");
			if(mysqli_num_rows($checkEmailQuery) != 0) {
				array_push($this->errorArray, Erreurs::$emailTaken);
				return;
			}

		}

        // vérification du mot de passe
		private function validatePasswords($mdp, $mdp2) {
			
			if($mdp != $mdp2) {
				array_push($this->errorArray, Erreurs::$passwordsDoNoMatch);
				return;
			}

            // la preg_match sert à définir le masque
            // le masque défini A-Z pour toutes les lettres enmajuscule, a-z pour
            // les minuscules et 0-9 pour les chiffres;
			if(preg_match('/[^A-Za-z0-9]/', $mdp)) {
				array_push($this->errorArray, Erreurs::$passwordNotAlphanumeric);
				return;
			}

			if(strlen($mdp) > 30 || strlen($mdp) < 5) {
				array_push($this->errorArray, Erreurs::$passwordCharacters);
				return;
			}

		}

	}
?>