<?php

class session
{
    public string $id;
    public string $userId;
    public string $key;
    public string $start;
    public string $end;

    public function insert()
    {
       include "connectie.php";

        $userId = mysqli_real_escape_string($conn, $this->userId);
        $key = mysqli_real_escape_string($conn, $this->key);
        $start = mysqli_real_escape_string($conn, $this->start);
        $end = mysqli_real_escape_string($conn, $this->end);


        $sql = "INSERT INTO sessions (
            session_user_id,
            session_key,
            session_start,
            session_end

        ) VALUES ( 
            '" . $userId . "',
            '" . $key . "',
            '" . $start . "',
            '" . $end . "'
        )";
        $conn->query($sql);

        $conn->close();
    }
    public static function findActivesession()
    {
        $session = null;
    
        if (isset($_COOKIE["steptember-session"]))
        {
            include "connectie.php";
    
            $key = mysqli_real_escape_string($conn, $_COOKIE["steptember-session"]);
    
            $query = "SELECT * FROM sessions WHERE session_key = '". $key ."' AND session_end > '". date("Y-m-d H:i:s") ."'";
            $resultaat = $conn->query($query);
    
            if ($resultaat->num_rows > 0)
            {
                $rij = $resultaat->fetch_assoc();
    
                $session = new Session();
                $session->id = $rij['session_id'];
                $session->userId = $rij['session_user_id'];
                $session->key = $rij['session_key'];
                $session->start = $rij['session_start'];
                $session->end = $rij['session_end'];
            }
    
            $conn->close();
        }
    
        return $session;
    }
}

?>