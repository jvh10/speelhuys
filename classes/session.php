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
       $conn = Database::start();

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
    
        if (isset($_COOKIE["speelhuys-session"]))
        {
            $conn = Database::start();
    
            $key = mysqli_real_escape_string($conn, $_COOKIE["speelhuys-session"]);
    
            $query = "SELECT * FROM sessions WHERE session_key = '". $key ."' AND session_end > '". date("Y-m-d H:i:s") ."'";
            $result = $conn->query($query);
    
            if ($result->num_rows > 0)
            {
                $row = $result->fetch_assoc();
    
                $session = new Session();
                $session->id = $row['session_id'];
                $session->userId = $row['session_user_id'];
                $session->key = $row['session_key'];
                $session->start = $row['session_start'];
                $session->end = $row['session_end'];
            }
    
            $conn->close();
        }
    
        return $session;
    }
}

?>