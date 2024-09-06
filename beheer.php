<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="style.js" type="text/javascript"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="overzicht.php">Products</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
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
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">

            <ul id="myUL">
                <br></br>
                Brands<br>
                <input type="radio"> Lego <br>
                <input type="radio"> Kapla <br>
                <input type="radio"> Duplo <br>
                <input type="radio"> RoboTime <br>
                <input type="radio"> SmartMax <br>
                <input type="radio"> Brio <br>
                <input type="radio"> Playmobil <br>
                <input type="radio"> MegaBlocks <br>
                <input type="radio"> MegaConstrux <br>
                <input type="radio"> Geomag <br>
                <input type="radio"> Knex <br>
                <input type="radio"> GraviTrax <br>
                <input type="radio"> Clementoni <br>
            </ul>
            <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn">Dropdown</button>
                <div id="myDropdown" class="dropdown-content">
                    <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
                    <input type="radio"> Lego <br>
                <input type="radio"> Kapla <br>
                <input type="radio"> Duplo <br>
                <input type="radio"> RoboTime <br>
                <input type="radio"> SmartMax <br>
                <input type="radio"> Brio <br>
                <input type="radio"> Playmobil <br>
                <input type="radio"> MegaBlocks <br>
                <input type="radio"> MegaConstrux <br>
                <input type="radio"> Geomag <br>
                <input type="radio"> Knex <br>
                <input type="radio"> GraviTrax <br>
                <input type="radio"> Clementoni <br>
                </div>
            </div>
        </div>
    </div>
</body>