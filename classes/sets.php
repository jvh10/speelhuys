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
        if($where != "") {
            $where[] = "wHERE . $where . set_price = $searchPrice";
        }
       
            $sql = "SELECT * FROM sets ". $where;

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
}