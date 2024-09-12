<!DOCTYPE html>
<html lang="nl">
<?php

include "connectie.php";
include "sets.php";
include "user.php";
include "session.php";
include "brands.php";
include "themes.php";

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
                            <option value="all" <?= (!isset($_GET['theme']) || $_GET['theme'] == 'all') ? 'selected' : '' ?>>
                                All Themes
                            </option>
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
                            <option value="all" <?= (!isset($_GET['brand']) || $_GET['brand'] == 'all') ? 'selected' : '' ?>>
                                All Themes
                            </option>
                            <?php foreach ($brands as $brand) : ?>
                                <option value="<?= $brand->id ?>" <?= (isset($_GET['brand']) && $_GET['brand'] == $brand->id) ? 'selected' : '' ?>>
                                    <?= $brand->name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="filter-group radio-group">
                        <label>Price Range</label>
                        <label><input type="radio" name="price" value="all" <?= (isset($_GET['price']) && $_GET['price'] == 'all') ? 'checked' : '' ?>> All </label>
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

                <?php
                $searchTheme = $_GET["theme"];
                $searchBrand = $_GET["brand"];
                $searchPrice = $_GET["price"];

                $sets = Set::search($searchTheme, $searchBrand, $searchPrice);
                foreach ($sets as $set){
                    echo "<tr>";
                    echo "<td>" . $set->id . "</td>";
                    echo "<td>" . $set->name . "</td";
                    echo "</tr>";
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>