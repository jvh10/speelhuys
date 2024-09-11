<?php

class Gebruiker
{
    public string $gebruikersnaam;
    public string $wachtwoord;
    public string $id;
    public string $firstname;
    public string $lastname;
    public string $email;
    // dit is de methode waar gecheckt word of de inlog gegevens kloppen en waar ze te vinden zijn 
    public static function inloggen($gebruikersnaam, $wachtwoord)
    {
        $conn = Database::start();
        $gebruiker = null;

        $gebruikersnaam = mysqli_real_escape_string($conn, $gebruikersnaam);
        $wachtwoord = mysqli_real_escape_string($conn, $wachtwoord);

        $sql = "SELECT * FROM users WHERE user_username = '$gebruikersnaam' AND user_password = '$wachtwoord'";
        $resultaat = $conn->query($sql);

        if ($resultaat->num_rows > 0) {
            $rij = $resultaat->fetch_assoc();

            $gebruiker = new Gebruiker();
            $gebruiker->id = $rij['user_id'];
            $gebruiker->firstname = $rij['user_firstname'];
            $gebruiker->lastname = $rij['user_lastname'];
            $gebruiker->email = $rij['user_email'];
        }
        $conn->close();
        return $gebruiker;
    }
    // hier is de methode waar gezocht word naar het id van de gebruiker die is ingelogd  
    public static function zoekId($id)
    {
        $conn = Database::start();
        $gebruiker = null;

        $sql = "SELECT * FROM users WHERE user_id = $id";
        $resultaat = $conn->query($sql);
        if ($resultaat->num_rows > 0) {
            $rij = $resultaat->fetch_assoc();

            $gebruiker = new Gebruiker();
            $gebruiker->id = $rij['user_id'];
            $gebruiker->firstname = $rij['user_firstname'];
            $gebruiker->lastname = $rij['user_lastname'];
            $gebruiker->email = $rij['user_email'];
        }
        $conn->close();
        return $gebruiker;
    }
}
