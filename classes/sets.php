<?php
class Set
{
    public int $id;
    public string $name;
    public string $description;
    public string $brandId;
    public string $themeId;
    public string $image;
    public string $price;
    public string $age;
    public string $pieces;
    public string $stock;
    public string $searchTheme;
    public string $searchBrand;
    public string $searchPrice;
    // met deze functie kan je een nieuwe blog maken en opslaan in de database
    public function insert()
    {
        $conn = Database::start();

        $name = mysqli_real_escape_string($conn, $this->name);
        $description = mysqli_real_escape_string($conn, $this->description);
        $brandId = mysqli_real_escape_string($conn, $this->brandId);
        $themeId = mysqli_real_escape_string($conn, $this->themeId);
        $image = mysqli_real_escape_string($conn, $this->image);
        $price = mysqli_real_escape_string($conn, $this->price);
        $age = mysqli_real_escape_string($conn, $this->age);
        $pieces = mysqli_real_escape_string($conn, $this->pieces);
        $stock = mysqli_real_escape_string($conn, $this->stock);

        $sql = "INSERT INTO sets (
            set_name, 
            set_description,
            set_brand_id,
            set_theme_id,
            set_image,
            set_price,
            set_age,
            set_pieces,
            set_stock
        )VALUES (
            '" . $name . "',
            '" . $description . "',
            '" . $brandId . "',
            '" . $themeId . "',
            '" . $image . "',
            '" . $price . "',
            '" . $age . "',
            '" . $pieces . "',
            '" . $stock . "'
        )";

        $conn->query($sql);

        $conn->close();
    }
    // via deze funcite kan je de gegevens aanpassen en updaten
    public  function update()
    {
        $conn = Database::start();

        $id = mysqli_real_escape_string($conn, $this->id);
        $name = mysqli_real_escape_string($conn, $this->name);
        $description = mysqli_real_escape_string($conn, $this->description);
        $brandId = mysqli_real_escape_string($conn, $this->brandId);
        $themeId = mysqli_real_escape_string($conn, $this->themeId);
        $image = mysqli_real_escape_string($conn, $this->image);
        $price = mysqli_real_escape_string($conn, $this->price);
        $age = mysqli_real_escape_string($conn, $this->age);
        $pieces = mysqli_real_escape_string($conn, $this->pieces);
        $stock = mysqli_real_escape_string($conn, $this->stock);


        $sql = "
            UPDATE
                sets
            SET
                set_name = '" . $name . "',
                set_description = '" . $description . "',
                set_brand_id = '" . $brandId . "',
                set_theme_id = '" . $themeId . "',
                set_image = '" . $image . "',
                set_price = '" . $price . "',
                set_age = '" . $age . "',
                set_pieces = '" . $pieces . "',
                set_stock = '" . $stock . "'
            WHERE
                set_id = " . $id . " 
            ";

        $conn->query($sql);

        $conn->close();
    }
    // via deze functie kan je de blog verwijderen uit de database
    public function delete()
    {
        $conn = Database::start();

        $id = mysqli_real_escape_string($conn, $this->id);

        $query = "
            DELETE FROM
                    sets
            WHERE
                    set_id = '" . $id . "'
        ";

        $conn->query($query);

        $conn->close();
    }
    // hier word een methode gemaakt om de blogs op te halen uit de database, doormiddel van het id
    public static function find(string $id)
    {
        $conn = Database::start();
        $id = mysqli_real_escape_string($conn, $id);

        $sql = "SELECT * FROM sets WHERE set_id = $id";


        $resultaat = $conn->query($sql);

        $set = null;

        if ($resultaat->num_rows > 0) {
            while ($row = $resultaat->fetch_assoc()) {
                $set = new Set();
                $set->id = $row['set_id'];
                $set->name = $row['set_name'];
                $set->description = $row['set_description'];
                $set->brandId = $row['set_brand_id'];
                $set->themeId = $row['set_theme_id'];
                $set->image = $row['set_image'];
                $set->price = $row['set_price'];
                $set->age = $row['set_age'];
                $set->pieces = $row['set_pieces'];
                $set->stock = $row['set_stock'];
            }
        }
        $conn->close();
        return $set;
    }
    public static function search(string $searchTheme, $searchBrand, $searchPrice)
    {
        $conn = Database::start();
        $searchTheme = mysqli_real_escape_string($conn, $searchTheme);
        $searchBrand = mysqli_real_escape_string($conn, $searchBrand);
        $searchPrice = mysqli_real_escape_string($conn, $searchPrice);

        $where = [];
        if ($searchTheme != "all") {
            $where[] = "set_theme = $searchTheme";
        }

        if ($where != "") {
            $where[] = " WHERE . $where . set_brand = $searchBrand";
        }
        if ($where != "") {
            $where[] = "wHERE . $where . set_price = $searchPrice";
        }

        $sql = "SELECT * FROM sets " . $where;

        echo $sql;
        $resultaat = $conn->query($sql);

        $set = null;

        if ($resultaat->num_rows > 0) {
            while ($row = $resultaat->fetch_assoc()) {
                $set = new Set();
                $set->id = $row['set_id'];
                $set->name = $row['set_name'];
                $set->description = $row['set_description'];
                $set->brandId = $row['set_brand_id'];
                $set->themeId = $row['set_theme_id'];
                $set->image = $row['set_image'];
                $set->price = $row['set_price'];
                $set->age = $row['set_age'];
                $set->pieces = $row['set_pieces'];
                $set->stock = $row['set_stock'];
            }
        }
        $conn->close();
        return $set;
    }
    // hier word een methode gemaakt om alle blogs op te halen uit de database 
    public static function findAll()
    {
        $conn = Database::start();

        $query = "SELECT * FROM sets";
        $result = $conn->query($query);

        $sets = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $set = new Set();
                $set->id = $row['set_id'];
                $set->name = $row['set_name'];
                $set->description = $row['set_description'];
                $set->brandId = $row['set_brand_id'];
                $set->themeId = $row['set_theme_id'];
                $set->image = $row['set_image'];
                $set->price = $row['set_price'];
                $set->age = $row['set_age'];
                $set->pieces = $row['set_pieces'];
                $set->stock = $row['set_stock'];
                $sets[] = $set;
            }
        }
        $conn->close();
        return $sets;
    }

    public static function filter()
    {
        $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
        $selectedTheme = isset($_GET['theme']) && $_GET['theme'] !== 'all' ? $_GET['theme'] : null;
        $selectedBrand = isset($_GET['brand']) && $_GET['brand'] !== 'all' ? $_GET['brand'] : null;
        $selectedPrice = isset($_GET['price']) && $_GET['price'] !== 'all' ? $_GET['price'] : null;

        // Maak de verbinding met de database
            $conn = Database::start();

        // Begin met de basis SQL-query
        $query = "SELECT * FROM sets WHERE 1=1";

        // Zoekterm filter
        if (!empty($searchTerm)) {
            $query .= " AND name LIKE ?";
        }

        // Thema filter
        if ($selectedTheme) {
            $query .= " AND theme_id = ?";
        }

        // Merk filter
        if ($selectedBrand) {
            $query .= " AND brand_id = ?";
        }

        // Prijs filter
        if ($selectedPrice) {
            // Prijscategorie bepalen
            switch ($selectedPrice) {
                case '0-25':
                    $query .= " AND price BETWEEN 0 AND 25";
                    break;
                case '25-50':
                    $query .= " AND price BETWEEN 25 AND 50";
                    break;
                case '50-100':
                    $query .= " AND price BETWEEN 50 AND 100";
                    break;
                case '100-200':
                    $query .= " AND price BETWEEN 100 AND 200";
                    break;
            }
        }
        echo "<pre>$query</pre>"; // Dit toont de query voor debugging
        // Prepare de statement
        $stmt = $conn->prepare($query);

        // Bind de parameters dynamisch aan de statement
        $types = '';
        $params = [];

        if (!empty($searchTerm)) {
            $types .= 's'; // String type voor de zoekterm
            $params[] = '%' . $searchTerm . '%';
        }
        if ($selectedTheme) {
            $types .= 'i'; // Integer type voor thema ID
            $params[] = $selectedTheme;
        }
        if ($selectedBrand) {
            $types .= 'i'; // Integer type voor brand ID
            $params[] = $selectedBrand;
        }

        // Bind de parameters als er filters zijn toegepast
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }

        // Voer de query uit
        $stmt->execute();
        $result = $stmt->get_result();

        // Haal de sets op
        $sets = [];
        while ($row = $result->fetch_object()) {
            $sets[] = $row;
        }

        // Sluit de statement en verbinding
        $stmt->close();
        $conn->close();
    }
}
