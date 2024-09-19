<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <link rel="stylesheet" href="Detail.css"> <!-- Verwijzing naar de CSS in dezelfde map -->
</head>

<body>
    <!-- Navbar terug naar overzicht.php -->
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

    // Tijdelijk hardcoded product ID
    $id = 1; // Dit moet je aanpassen naar de ID die je wilt testen

    // Controleren of ID aanwezig is en vervolgens productdetails ophalen
    if ($id) {
        $product = Set::find($id); // Haal de productdetails op uit de database
    } else {
        echo "<p>Product niet gevonden.</p>";
        exit;
    }

    // Definieer het pad naar de uploadmap
    $uploadDir = '../uploads/'; // Dit is het pad naar de map 'uploads'

    ?>



    <?php if ($product) : ?>
        <!-- Container voor productdetails -->
        <div class="container">
            <div class="product-image">
                <!-- Zorg dat het volledige pad naar de afbeelding correct wordt weergegeven -->
                <img src="<?php echo htmlspecialchars($uploadDir . $product->image); ?>"alt="<?php echo htmlspecialchars($product->name); ?>"> <!-- Afbeelding van het product -->
            </div>
            <div class="product-info">
                <h1><?php echo htmlspecialchars($product->name); ?></h1>
                <p><strong>Thema:</strong> <?php echo htmlspecialchars($product->themeId); ?></p>
                <p><strong>Bedrijf:</strong> <?php echo htmlspecialchars($product->brandId); ?></p>
                <p><strong>Aantal Onderdelen:</strong> <?php echo htmlspecialchars($product->pieces); ?></p>
                <p><strong>Leeftijd:</strong> <?php echo htmlspecialchars($product->age); ?></p>
                <p><strong>Prijs:</strong> $<?php echo htmlspecialchars($product->price); ?></p>
                <p><strong>Voorraad:</strong> <?php echo htmlspecialchars($product->stock); ?></p>
            </div>
        </div>



        <!-- Product Beschrijvingssectie -->
        <div class="product-description">
            <h2>Beschrijving:</h2>
            <p><?php echo htmlspecialchars($product->description); ?></p>
        </div>
    <?php else : ?>
        <p>Productdetails niet beschikbaar.</p>
    <?php endif; ?>
</body>

</html>
