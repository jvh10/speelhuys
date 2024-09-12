<!DOCTYPE html>
<html lang="nl">

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
                        <a class="nav-item nav-link" href="index.php">Sign up</a>
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

                    <div class="filter-group">
                        <label for="theme">Select Theme</label>
                        <select id="theme" name="theme">
                            <option value="">All Themes</option>
                            <option value="city" <?= (isset($_GET['theme']) && $_GET['theme'] == 'city') ? 'selected' : '' ?>>City</option>
                            <option value="star-wars" <?= (isset($_GET['theme']) && $_GET['theme'] == 'star-wars') ? 'selected' : '' ?>>Star Wars</option>
                            <option value="technic" <?= (isset($_GET['theme']) && $_GET['theme'] == 'technic') ? 'selected' : '' ?>>Technic</option>
                            <option value="creator" <?= (isset($_GET['theme']) && $_GET['theme'] == 'creator') ? 'selected' : '' ?>>Creator</option>
                        </select>
                    </div>

                    <div class="filter-group">
                        <label for="Brand">Brands</label>
                        <select id="Brand" name="Brand">
                            <option value="">All Brands</option>
                            <option value="Lego" <?= (isset($_GET['Brand']) && $_GET['Brand'] == 'Lego') ? 'selected' : '' ?>>Lego</option>
                            <option value="Kapla" <?= (isset($_GET['Brand']) && $_GET['Brand'] == 'Kapla') ? 'selected' : '' ?>>Kapla</option>
                            <option value="Duplo" <?= (isset($_GET['Brand']) && $_GET['Brand'] == 'Duplo') ? 'selected' : '' ?>>Duplo</option>
                            <option value="RoboTime" <?= (isset($_GET['Brand']) && $_GET['Brand'] == 'RoboTime') ? 'selected' : '' ?>>RoboTime</option>
                            <option value="SmartMax" <?= (isset($_GET['Brand']) && $_GET['Brand'] == 'SmartMax') ? 'selected' : '' ?>>SmartMax</option>
                            <option value="Brio" <?= (isset($_GET['Brand']) && $_GET['Brand'] == 'Brio') ? 'selected' : '' ?>>Brio</option>
                            <option value="Playmobil" <?= (isset($_GET['Brand']) && $_GET['Brand'] == 'Playmobil') ? 'selected' : '' ?>>Playmobil</option>
                            <option value="MegaBloks" <?= (isset($_GET['Brand']) && $_GET['Brand'] == 'MegaBloks') ? 'selected' : '' ?>>MegaBloks</option>
                            <option value="MegaConstrux" <?= (isset($_GET['Brand']) && $_GET['Brand'] == 'MegaConstrux') ? 'selected' : '' ?>>MegaConstrux</option>
                            <option value="Geomag" <?= (isset($_GET['Brand']) && $_GET['Brand'] == 'Geomag') ? 'selected' : '' ?>>Geomag</option>
                            <option value="KNEX" <?= (isset($_GET['Brand']) && $_GET['Brand'] == 'KNEX') ? 'selected' : '' ?>>KNEX</option>
                            <option value="GraviTrax" <?= (isset($_GET['Brand']) && $_GET['Brand'] == 'GraviTrax') ? 'selected' : '' ?>>GraviTrax</option>
                            <option value="Clementoni" <?= (isset($_GET['Brand']) && $_GET['Brand'] == 'Clementoni') ? 'selected' : '' ?>>Clementoni</option>
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

                <?php
                // Placehorder code 
                //  if (count($filteredSets) > 0) {
                //      foreach ($filteredSets as $set) {
                //          echo "<div>{$set['name']} - \${$set['price']}</div>";
                //      }
                //  } else {
                //      echo "<p>No sets found.</p>";
                //  }
                ?>
            </div>
        </div>
    </div>
</body>

</html>