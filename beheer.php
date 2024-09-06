<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="style.js" type="text/javascript"></script>
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
    <script>
        /* Dropdown Button */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        function filterFunction() {
            var input, filter, div, label, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            div = document.getElementById("myDropdown");
            label = div.getElementsByTagName("label");
            for (i = 0; i < label.length; i++) {
                txtValue = label[i].textContent || label[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    label[i].style.display = "";
                } else {
                    label[i].style.display = "none";
                }
            }
        }
    </script>

    <style>
        /* Dropdown Button */
        .dropbtn {
            background-color: #04AA6D;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        /* Dropdown button on hover & focus */
        .dropbtn:hover,
        .dropbtn:focus {
            background-color: #3e8e41;
        }

        /* The container <div> - needed to position the dropdown content */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        /* Show the dropdown menu when the user clicks on the button */
        .show {
            display: block;
        }

        /* The search field */
        #myInput {
            box-sizing: border-box;
            font-size: 16px;
            padding: 14px 20px 12px 45px;
            border: none;
            border-bottom: 1px solid #ddd;
        }

        /* The search field when it gets focus/clicked on */
        #myInput:focus {
            outline: 3px solid #ddd;
        }
    </style>
</body>

</html>