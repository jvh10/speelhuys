<html>
<head>
    <!-- hier worden de bestanden voor de styling geinclude -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<!-- de klasse en het formulier voor de inlog -->
<div class="login-container">
        <div class="logo">
            <img src="upload/Speelhuyslogo.png">
            <h1>Speelhuys</h1>
            <p>BUILD TOGETHER</p>
        </div>
        <form class="login-form" method="POST">
            <input type="text" name="Username" placeholder="Username" class="input-field">
            <input type="password" name="Password" placeholder="Password" class="input-field">
            <button type="submit" class="login-button">Log in</button>
        </form>
    </div>
</body>
</html>

<?php
//de php bestanden includen
include "classes/session.php";
    include "classes/connectie.php";
    include "classes/user.php";
// hier wordt gekeken of er iemand inlogt en of de inloggegevens juist zijn
if (count($_POST) > 0)
{
    $username = $_POST["Username"];
    $password = $_POST["Password"];
    
    $result = User::logIn($username, $password);
    
    if ($result == null)
    {
        echo '<script>alert("Wrong username or password. Please try again")</script>';
    }
    else
    {
        if ()
        //hier wordt een sessie aangemaakt
        $key = md5(uniqid(rand(), true));
    
        $session = new Session();
        $session->userId = $result->id;
        $session->key = $key;
        $session->start = date("Y-m-d H:i:s");
        $session->end = date("Y-m-d H:i:s", strtotime("+1 month"));
        $session->insert();
    
        setcookie("speelhuys-session", $key, strtotime("+1 month"), "/");
        header("Location: Admin/beheer.php");
    
        exit;
    }
}
?>