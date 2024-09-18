<?php

class User
{
    public string $username;
    public string $password;
    public string $id;
    public string $firstname;
    public string $lastname;
    public string $email;
    // dit is de methode waar gecheckt word of de inlog gegevens kloppen en waar ze te vinden zijn 
    public static function logIn($username, $password)
    {
        $conn = Database::start();
        $user = null;

        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);

        $sql = "SELECT * FROM users WHERE user_username = '$username' AND user_password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $user = new User();
            $user->id = $row['user_id'];
            $user->firstname = $row['user_firstname'];
            $user->lastname = $row['user_lastname'];
            $user->email = $row['user_email'];
        }
        $conn->close();
        return $user;
    }
    // hier is de methode waar gezocht word naar het id van de gebruiker die is ingelogd  
    public static function searchId($id)
    {
        $conn = Database::start();
        $user = null;

        $sql = "SELECT * FROM users WHERE user_id = $id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $user = new User();
            $user->id = $row['user_id'];
            $user->firstname = $row['user_firstname'];
            $user->lastname = $row['user_lastname'];
            $user->email = $row['user_email'];
        }
        $conn->close();
        return $user;
    }
}
