<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <link rel="stylesheet" href="Detail.css"> <!-- Verwijzing naar het CSS-bestand in de hoofdmap -->
</head>
<body>
    <!-- Navigatiebalk -->
    <nav class="navbar">
        <ul>
            <li><a href="../overzicht.php">Terug naar Overzicht</a></li> <!-- Verwijzing naar overzicht.php in de hoofdmap -->
        </ul>
    </nav>

    <?php
    // Voorbeeld productinformatie (in een echte situatie zou je dit uit een database halen)
    $product = [
        'name' => 'Lego City Fire Station',
        'image' => '../images/fire-station.jpg', // Pad naar de afbeelding in de hoofdmap
        'theme' => 'City',
        'company' => 'LEGO',
        'pieces' => 509,
        'age' => '5-12',
        'price' => '59.99'
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
</body>
</html>
