<?php
include "../classes/connectie.php";
include "../classes/sets.php";
include "../classes/session.php";

// Hier word ervoor gezorgd dat de website extra beveiligd word
//$session= Session::findActivesession();
//if ($session == null) {
//   header("Location: beheer.php");
//   exit;
//}

$image = null;
// als je hier op de knop drukt dan word er een nieuwe blog aangemaakt en opgeslagen in de database
if (isset($_POST["addSet"])) {

    if (!empty($_FILES["bestand"]["name"])) {
        $image = $_FILES["bestand"]["name"];

        $target = "../upload/" . basename($image);

        move_uploaded_file($_FILES["bestand"]["tmp_name"], $target);
    }

    $set = new Set();
    $set->name = $_POST['name'];
    $set->image = $image;
    $set->price = $_POST['price'];
    $set->description = $_POST['description'];
    $set->brandId = $_POST['brand'];
    $set->themeId = $_POST['theme'];
    $set->age = $_POST['age'];
    $set->pieces = $_POST['pieces'];
    $set->stock = $_POST['stock'];

    $set->insert();

    header("Location: beheer.php?message=Set is created");
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>RichTextEditor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/jquery-te-1.4.0.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>
</head>

<body id="insert">
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="beheer.php">Products</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link" href="../Login.php">Sign up</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container">
            <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row ">

                            <br>
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" value="" style="margin-left: 10px; width: 300px;" required><br>

                        </div>
                        <br>
                        <div class="row ">

                            <br>
                            <label for="bestand">image:</label>
                            <input type="file" id="bestand" name="bestand" style="margin-left: 14px; width: 500px;">
                            <br>

                        </div>
                        <br>
                        <div class="row ">

                            <br>
                            <label for="price">Price:</label>
                            <input type="text" id="price" name="price" style="margin-left: 10px; width: 300px;" value="" required><br>

                        </div>
                        <br>
                        <div class="row ">

                            <br>
                            <label for="brand">Brand:</label>
                            <input type="text" id="brand" name="brand" style="margin-left: 10px; width: 300px;" value="" required><br>

                        </div>
                        <br>
                        <div class="row">

                            <br>
                            <label for="theme">Theme:</label>
                            <input type="text" id="theme" name="theme" style="margin-left: 10px; width: 300px;" value="" required><br>

                        </div>
                        <br>
                        <div class="row ">

                            <br>
                            <label for="age">Age:</label>
                            <input type="text" id="age" name="age" style="margin-left: 10px; width: 300px;" value="" required><br>

                        </div>
                        <br>
                        <div class="row ">

                            <br>
                            <label for="pieces">Pieces:</label>
                            <input type="text" id="pieces" name="pieces" style="margin-left: 10px; width: 300px;" value="" required><br>

                        </div>
                        <br>
                        <div class="row ">

                            <br>
                            <label for="stock">Stock:</label>
                            <input type="text" id="stock" name="stock" style="margin-left: 10px; width: 300px;" value="" required><br>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <br>
                        <div class="form-group">
                            <label for="description">Description :</label>
                            <textarea class="jqte" id="description" name="description" required></textarea>
                        </div>
                        <br>
                        <button type="submit" name="addSet" class="btn btn-dark">Voeg blog toe</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<script type="text/javascript" src="http://code.jquery.com/jquery.min.js" charset="uft-8"></script>
<script type="text/javascript" src="../Js/jquery-te-1.4.0.min.js" charset="uft-8"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.cs"></script>

<script>
    $('.jqte').jqte();
</script>