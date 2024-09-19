<!DOCTYPE html>
<html lang="nl">

<?php

include "classes/connectie.php";
include "classes/sets.php";
include "classes/user.php";
include "classes/session.php";
include "classes/brands.php";
include "classes/themes.php";

?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
        }

        .sidebar {
            width: 250px;
            padding: 20px;
            background-color: #f0f0f0;
            border-right: 1px solid #ccc;
        }

        .content {
            flex: 1;
            padding: 20px;
        }

        .filter-group {
            margin-bottom: 20px;
        }

        .filter-group label {
            display: block;
            margin-bottom: 5px;
        }

        .filter-group input,
        .filter-group select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }

        .radio-group label {
            display: block;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="overzicht.php">Products</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link" href="Login.php">Sign up</a>
                    </div>
                </div>
            </nav>
        </div>

        <div class="row">
            <div class="sidebar">
                <form method="GET" action="">

                    <div class="filter-group">
                        <label for="search">Search</label>
                        <input type="text" id="search" name="search" placeholder="Search LEGO sets..." value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
                    </div>

                    <?php
                    $themes = Theme::findAll();
                    $brands = Brand::findAll();
                    ?>

                    <div class="filter-group">
                        <label for="theme">Select Theme</label>
                        <select id="theme" name="theme">
                            <option value="" <?= (!isset($_GET['theme']) || $_GET['theme'] == '') ? 'selected' : '' ?>>Alle Thema's</option>
                            <?php foreach ($themes as $theme) : ?>
                                <option value="<?= $theme->id ?>" <?= (isset($_GET['theme']) && $_GET['theme'] == $theme->id) ? 'selected' : '' ?>>
                                    <?= $theme->name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>


                    <div class="filter-group">
                        <label for="brand">Select Brand</label>
                        <select id="brand" name="brand">
                            <option value="" <?= (!isset($_GET['brand']) || $_GET['brand'] == '') ? 'selected' : '' ?>>Alle Brands</option>
                            <?php foreach ($brands as $brand) : ?>
                                <option value="<?= $brand->id ?>" <?= (isset($_GET['brand']) && $_GET['brand'] == $brand->id) ? 'selected' : '' ?>>
                                    <?= $brand->name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="filter-group radio-group">
                        <label>Price Range</label>
                        <label><input type="radio" name="price" value="0-25" <?= (isset($_GET['price']) && $_GET['price'] == '0-25') ? 'checked' : '' ?>> $0 - $25</label>
                        <label><input type="radio" name="price" value="25-50" <?= (isset($_GET['price']) && $_GET['price'] == '25-50') ? 'checked' : '' ?>> $25 - $50</label>
                        <label><input type="radio" name="price" value="50-100" <?= (isset($_GET['price']) && $_GET['price'] == '50-100') ? 'checked' : '' ?>> $50 - $100</label>
                        <label><input type="radio" name="price" value="100-200" <?= (isset($_GET['price']) && $_GET['price'] == '100-200') ? 'checked' : '' ?>> $100 - $200</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Apply Filters</button>
                </form>
            </div>

            <div class="content">
                <h2>Product Results</h2>

                <div class="row">
                    <?php
                    // Simulated LEGO set data
                    $legoSets = [
                        ['name' => "LEGO City Police Station", 'theme' => "city", 'price' => 99.99, 'image_url' => 'city_police.jpg'],
                        ['name' => "LEGO Star Wars X-Wing", 'theme' => "star-wars", 'price' => 49.99, 'image_url' => 'starwars_xwing.jpg'],
                        ['name' => "LEGO Technic Bugatti Chiron", 'theme' => "technic", 'price' => 349.99, 'image_url' => 'technic_bugatti.jpg'],
                        ['name' => "LEGO Creator Expert Modular Buildings", 'theme' => "creator", 'price' => 179.99, 'image_url' => 'creator_buildings.jpg']
                    ];

                    // Filter logic
                    $filteredSets = $legoSets;

                    if (isset($_GET['search']) && !empty($_GET['search'])) {
                        $search = strtolower($_GET['search']);
                        $filteredSets = array_filter($filteredSets, function ($set) use ($search) {
                            return strpos(strtolower($set['name']), $search) !== false;
                        });
                    }

                    if (isset($_GET['theme']) && !empty($_GET['theme'])) {
                        $theme = $_GET['theme'];
                        $filteredSets = array_filter($filteredSets, function ($set) use ($theme) {
                            return $set['theme'] === $theme;
                        });
                    }

                    if (isset($_GET['price']) && !empty($_GET['price'])) {
                        list($minPrice, $maxPrice) = explode('-', $_GET['price']);
                        $filteredSets = array_filter($filteredSets, function ($set) use ($minPrice, $maxPrice) {
                            return $set['price'] >= $minPrice && $set['price'] <= $maxPrice;
                        });
                    }

                    // Display results
                    if (count($filteredSets) > 0) {
                        foreach ($filteredSets as $set) {
                            ?>
                            <div class="col-md-4 d-flex align-items-stretch mb-4">
                                <div class="card" style="width: 100%;">
                                    <img src="<?= $set['image_url'] ?>" class="card-img-top" alt="<?= $set['name'] ?>" style="height: 180px; object-fit: cover;">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $set['name'] ?></h5>
                                        <p class="card-text">$<?= $set['price'] ?></p>
                                        <a href="DetailPagina/DetailPagina.php"btn btn-primary">View Details</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "<p>No sets found.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Zf4FE/p50zJ8BGEg24moUjmNB7RGFJ8Fxb2UwCca++EQpgFqVYReeqASQUqsdMXK" crossorigin="anonymous"></script>
</body>

</html>
