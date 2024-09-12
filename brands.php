<?php

class Theme
{
    public int $id;
    public string $name;
    public string $logo;
    
    // met deze functie kan je een nieuwe blog maken en opslaan in de database
    public function insert()
    {
        $conn = Database::start();

        $name = mysqli_real_escape_string($conn, $this->name);
        $logo = mysqli_real_escape_string($conn, $this->logo);

        $sql = "INSERT INTO brands (
            brand_name,
            brand_logo

        )VALUES (
            '" . $name . "',
            '" . $logo . "'
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
        $logo = mysqli_real_escape_string($conn, $this->logo);


        $sql = "
            UPDATE
                brands
            SET
                brand_name = '" . $name . "'
                brand_logo = '" . $logo . "'
            WHERE
                brand_id = " . $id . " 
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
                    brands
            WHERE
                    brand_id = '" . $id . "'
        ";

        $conn->query($query);

        $conn->close();
    }
    // hier word een methode gemaakt om de blogs op te halen uit de database, doormiddel van het id
    public static function find(string $id)
    {
        $conn = Database::start();
        $id = mysqli_real_escape_string($conn, $id);

        $sql = "SELECT * FROM brands WHERE brands_id = $id";
        $resultaat = $conn->query($sql);

        $brand = null;

        if ($resultaat->num_rows > 0) {
            while ($row = $resultaat->fetch_assoc()) {
                $brand = new Theme();
                $brand->id = $row['brand_id'];
                $brand->name = $row['brand_name'];
                $brand->logo = $row['brand_logo'];
            }
        }
        $conn->close();
        return $brand;
    }
    // hier word een methode gemaakt om alle blogs op te halen uit de database 
    public static function findAll()
    {
        $conn = Database::start();

        $query = "SELECT * FROM themes";
        $resultaat = $conn->query($query);

        $brands = [];

        if ($resultaat->num_rows > 0) {
            while ($row = $resultaat->fetch_assoc()) {
                $brand = new Theme();
                $brand->id = $row['brand_id'];
                $brand->name = $row['brand_name'];
                $brand->logo = $row['brand_logo'];
                $brands[] = $brand;
            }
        }
        $conn->close();
        return $brands;
    }
}
