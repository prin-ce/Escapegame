<?php
class User {

    private $connexion;
    private $username;

    public function __construct($connexion, $username) {
        $this->connexion = $connexion;
        $this->username = $username;
    }

    // on récupère le pseudo
    public function getUsername() {
        $query = mysqli_query($this->connexion, "SELECT username FROM users WHERE username='$this->username'");
        $row = mysqli_fetch_array($query);
        return $row['username'];
    }

    // on récupère le prénom
    public function getFirstName() {
        $query = mysqli_query($this->connexion, "SELECT firstname FROM users WHERE username='$this->username'");
        $row = mysqli_fetch_array($query);
        return $row['firstname'];
    }

    // on récupère le nom
    public function getLastName() {
        $query = mysqli_query($this->connexion, "SELECT lastname FROM users WHERE username='$this->username'");
        $row = mysqli_fetch_array($query);
        return $row['lastname'];
    }

    // on récupère l'email
    public function getEmail() {
        $query = mysqli_query($this->connexion, "SELECT email FROM users WHERE username='$this->username'");
        $row = mysqli_fetch_array($query);
        return $row['email'];
    }


}
?>