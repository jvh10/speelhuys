<?php

class Theme
{
    public int $id;
    public string $name;
    
    // met deze functie kan je een nieuwe blog maken en opslaan in de database
    public function insert()
    {
        $conn = Database::start();

        $name = mysqli_real_escape_string($conn, $this->name);

        $sql = "INSERT INTO themes (
            theme_name

        )VALUES (
            '" . $name . "'
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


        $sql = "
            UPDATE
                themes
            SET
                theme_name = '" . $name . "'
            WHERE
                theme_id = " . $id . " 
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
                    theme
            WHERE
                    theme_id = '" . $id . "'
        ";

        $conn->query($query);

        $conn->close();
    }
    // hier word een methode gemaakt om de blogs op te halen uit de database, doormiddel van het id
    public static function find(string $id)
    {
        $conn = Database::start();
        $id = mysqli_real_escape_string($conn, $id);

        $sql = "SELECT * FROM themes WHERE theme_id = $id";
        $resultaat = $conn->query($sql);

        $theme = null;

        if ($resultaat->num_rows > 0) {
            while ($row = $resultaat->fetch_assoc()) {
                $theme = new Theme();
                $theme->id = $row['theme_id'];
                $theme->name = $row['theme_name'];
            }
        }
        $conn->close();
        return $theme;
    }
    // hier word een methode gemaakt om alle blogs op te halen uit de database 
    public static function findAll()
    {
        $conn = Database::start();

        $query = "SELECT * FROM themes";
        $resultaat = $conn->query($query);

        $themes = [];

        if ($resultaat->num_rows > 0) {
            while ($row = $resultaat->fetch_assoc()) {
                $theme = new Theme();
                $theme->id = $row['theme_id'];
                $theme->name = $row['theme_name'];
                $themes[] = $theme;
            }
        }
        $conn->close();
        return $themes;
    }
}
