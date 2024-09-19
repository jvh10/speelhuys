<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <link rel="stylesheet" href="Detail.css"> <!-- Gets the information of the CSS map -->
</head>

<body>
    <!-- Navbar back to Overzicht.php -->
    <nav class="navbar">
        <ul>
            <li><a href="../overzicht.php">Terug naar Overzicht</a></li> <!-- Verwijzing naar overzicht.php in de hoofdmap -->
        </ul>
    </nav>

    <?php
    include "../classes/connectie.php";
    include "../classes/sets.php";
    include "../classes/user.php";
    include "../classes/session.php";
    include "../classes/brands.php";
    include "../classes/themes.php";

    // Voorbeeld productinformatie (in een echte situatie zou je dit uit een database halen)
    $product = [
        'name' => 'Lego City Fire Station',
        'image' => '../upload/brio_trein_boerderij.png', // Pad naar de afbeelding in de hoofdmap
        'theme' => 'City',
        'company' => 'LEGO',
        'pieces' => 509,
        'age' => '5-12',
        'price' => '59.99',
        'description' => 'This LEGO City Fire Station set includes a three-story fire station building with an office, relaxation room, and lookout tower, as well as a small toy fire truck, fire hose, and toy motorbike. It\'s perfect for kids aged 5-12 years who love building and playing out emergency rescue scenarios.'
    ];
    ?>

    <!-- Product Details Container -->
    <div class="container">
        <div class="product-image">
            <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>"> <!-- Afbeelding van het product -->
        </div>
        <div class="product-info">
            <h1><?php echo $product['name']; ?></h1>
            <p><strong>Theme:</strong> <?php echo $product['theme']; ?></p>
            <p><strong>Company:</strong> <?php echo $product['company']; ?></p>
            <p><strong>Number of Pieces:</strong> <?php echo $product['pieces']; ?></p>
            <p><strong>Age:</strong> <?php echo $product['age']; ?></p>
            <p><strong>Price:</strong> €<?php echo $product['price']; ?></p>
        </div>
    </div>

    <!-- Product Description Section -->
    <div class="product-description">
        <h2>Description</h2>
        <p><?php echo $product['description']; ?></p>
    </div>
</body>

</html>
