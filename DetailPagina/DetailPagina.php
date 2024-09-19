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

    // Retrieve the product ID from the URL
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    // Check if ID is present, then fetch the product details
    if ($id) {
        $product = Set::find($id); // Fetch the product details from the database
    } else {
        echo "<p>Product not found.</p>";
        exit;
    }
    ?>

    <?php if ($product) : ?>
        <!-- Product Details Container -->
        <div class="container">
            <div class="product-image">
                <img src="<?php echo $product->image; ?>" alt="<?php echo $product->name; ?>"> <!-- Afbeelding van het product -->
            </div>
            <div class="product-info">
                <h1><?php echo $product->name; ?></h1>
                <p><strong>Theme:</strong> <?php echo $product->themeId; ?></p>
                <p><strong>Company:</strong> <?php echo $product->brandId; ?></p>
                <p><strong>Number of Pieces:</strong> <?php echo $product->pieces; ?></p>
                <p><strong>Age:</strong> <?php echo $product->age; ?></p>
                <p><strong>Price:</strong> $<?php echo $product->price; ?></p>
                <p><strong>Stock:</strong> <?php echo $product->stock; ?></p>
            </div>
        </div>

        <!-- Product Description Section -->
        <div class="product-description">
            <h2>Description:</h2>
            <p><?php echo $product->description; ?></p>
        </div>
    <?php else : ?>
        <p>Product details not available.</p>
    <?php endif; ?>
</body>

</html>
