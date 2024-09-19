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
    public static function search(string $theme, $brand, $price)
    {
        $conn = Database::start();
        $theme = mysqli_real_escape_string($conn, $theme);
        $brand = mysqli_real_escape_string($conn, $brand);
        $price = mysqli_real_escape_string($conn, $price);


        $sql = "SELECT * FROM sets WHERE 1=1";

        if (!empty($searchTerm)) {
            $sql .= " AND name LIKE ?";
        }

        // Thema filter
        if ($theme) {
            $sql .= " AND theme_id = ?";
        }

        // Merk filter
        if ($brand) {
            $sql .= " AND brand_id = ?";
        }
        if ($price) {
            // Prijscategorie bepalen
            switch ($price) {
                case '0-25':
                    $sql .= " AND price BETWEEN 0 AND 25";
                    break;
                case '25-50':
                    $sql .= " AND price BETWEEN 25 AND 50";
                    break;
                case '50-100':
                    $sql .= " AND price BETWEEN 50 AND 100";
                    break;
                case '100-200':
                    $sql .= " AND price BETWEEN 100 AND 200";
                    break;
            }
        }

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

    public static function filterSets($searchTerm = '', $themeId = null, $brandId = null, $priceRange = null)
    {
        // Maak de database verbinding
        $conn = Database::start();

        // Begin met de basis query
        $query = "SELECT * FROM sets WHERE 1=1";

        // Zoekterm filter
        if (!empty($searchTerm)) {
            $query .= " AND name LIKE ?";
        }

        // Thema filter
        if ($themeId && $themeId !== 'all') {
            $query .= " AND set_theme_id = ?";
        }

        // Merk filter
        if ($brandId && $brandId !== 'all') {
            $query .= " AND set_brand_id = ?";
        }

        // Prijs filter
        if ($priceRange && $priceRange !== 'all') {
            switch ($priceRange) {
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

        echo $query;

        // Prepare statement
        $stmt = $conn->prepare($query);

        // Bind parameters
        $types = '';
        $params = [];

        if (!empty($searchTerm)) {
            $types .= 's';
            $params[] = '%' . $searchTerm . '%';
        }

        if ($themeId && $themeId !== 'all') {
            $types .= 'i';
            $params[] = $themeId;
        }

        if ($brandId && $brandId !== 'all') {
            $types .= 'i';
            $params[] = $brandId;
        }

        var_dump($params);

        // Bind de parameters aan de query
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }

        // Voer de query uit
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $find = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            echo "Error: " . $stmt->error;
            return [];
        }
        // Sluit de verbinding
        


        foreach ($find as $row) {
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
        $stmt->close();
        $conn->close();
    }
}
