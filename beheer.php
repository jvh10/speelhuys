<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="style.js" type="text/javascript"></script>
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
        .filter-group input, .filter-group select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }
        .checkbox-group label {
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
        <div class="filter-group">
            <label for="search">Search</label>
            <input type="text" id="search" placeholder="Search LEGO sets..." oninput="applyFilters()">
        </div>
        
        <div class="filter-group">
            <label for="theme">Select Theme</label>
            <select id="theme" onchange="applyFilters()">
                <option value="">All Themes</option>
                <option value="city">City</option>
                <option value="star-wars">Star Wars</option>
                <option value="technic">Technic</option>
                <option value="creator">Creator</option>
            </select>
        </div>
        
        <div class="filter-group radio-group">
            <label>Price Range</label>
            <label><input type="radio" name="Price" value="0-25" onchange="applyFilters()"> $0 - $25</label>
            <label><input type="radio" name="Price" value="25-50" onchange="applyFilters()"> $25 - $50</label>
            <label><input type="radio" name="Price"  value="50-100" onchange="applyFilters()"> $50 - $100</label>
            <label><input type="radio" name="Price"  value="100-200" onchange="applyFilters()"> $100 - $200</label>
            <div class="col-2">
                <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn">Brands</button>
                    <div id="myDropdown" class="dropdown-content">
                        <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()" style="width: 160px;"><br>
                        <label><input type="radio" name="brand"> Lego </label><br>
                        <label><input type="radio" name="brand"> Kapla </label><br>
                        <label><input type="radio" name="brand"> Duplo </label><br>
                        <label><input type="radio" name="brand"> RoboTime </label><br>
                        <label><input type="radio" name="brand"> SmartMax </label><br>
                        <label><input type="radio" name="brand"> Brio </label><br>
                        <label><input type="radio" name="brand"> Playmobil </label><br>
                        <label><input type="radio" name="brand"> MegaBlocks </label><br>
                        <label><input type="radio" name="brand"> MegaConstrux </label><br>
                        <label><input type="radio" name="brand"> Geomag </label><br>
                        <label><input type="radio" name="brand"> Knex </label><br>
                        <label><input type="radio" name="brand"> GraviTrax </label><br>
                        <label><input type="radio" name="brand"> Clementoni </label><br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div id="results">Please select filters to see results.</div>
    </div>

    <script>
        const legoSets = [
            { name: "LEGO City Police Station", theme: "city", price: 99.99 },
            { name: "LEGO Star Wars X-Wing", theme: "star-wars", price: 49.99 },
            { name: "LEGO Technic Bugatti Chiron", theme: "technic", price: 349.99 },
            { name: "LEGO Creator Expert Modular Buildings", theme: "creator", price: 179.99 }
        ];

        function applyFilters() {
            const searchInput = document.getElementById('search').value.toLowerCase();
            const themeSelect = document.getElementById('theme').value;
            const priceChecks = Array.from(document.querySelectorAll('.checkbox-group input:checked')).map(cb => cb.value);

            let filteredSets = legoSets.filter(set => {
                let matchesSearch = set.name.toLowerCase().includes(searchInput);
                let matchesTheme = themeSelect === "" || set.theme === themeSelect;
                let matchesPrice = priceChecks.length === 0 || priceChecks.some(range => {
                    let [min, max] = range.split('-').map(Number);
                    return set.price >= min && set.price <= max;
                });

                return matchesSearch && matchesTheme && matchesPrice;
            });

            displayResults(filteredSets);
        }

        function displayResults(sets) {
            const resultsDiv = document.getElementById('results');
            resultsDiv.innerHTML = sets.length ? sets.map(set => `<div>${set.name} - $${set.price}</div>`).join('') : "No sets found.";
        }
    </script>
</body>

</html>
oefen