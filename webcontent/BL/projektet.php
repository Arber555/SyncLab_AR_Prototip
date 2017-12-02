<?php

class Projektet{
    
    private $emri;
    private $path;
    private $img;
    private $tipi; // \0/
    private $size; // \0/
    private $user_id; 
    
    public function __construct($e, $p, $u)
    {
        $this->emri = $e;
        $this->path = $p;
        $this->user_id = $u;
    }

    function getEmri() {
        return $this->emri;
    }
    
    function getPath() {
        return $this->path;
    }

    function getUser_Id() {
        return $this->user_id;
    }

    function setEmri($emri) {
        $this->emri = $emri;
    }
    
    function setPath($path) {
        $this->path = $path;
    }

    function setUser_Id($user_id) {
        $this->user_id = $user_id;
    }
    
    public function insert(Projektet $p)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();

        $stmt = $con->prepare("INSERT INTO Projektet(emri, path, img, user_id) values (?,?,?,?)");

        $stmt->bind_param("sssi", $p->emri, $p->path, $p->img, $p->user_id);
        
        if($stmt->execute())
        {
            $stmt->close();


            //pathi i projektit
            $fp = fopen($p->path.''.$p->emri.'.html', 'w');
            
            $filename = "../webcontent/index.php";
            $handle = fopen($filename, "r");
            $contents = fread($handle, filesize($filename));

            fwrite($fp, $contents);
            fclose($fp);

            return true;
        }
        else
        {
            echo "Error insert record: " . $con->error;
        }
        return false; 
    }
    
    public function update($id, $e, $p,  $u)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
       
        $sql = "UPDATE Projektet SET emri='".$e."', path='".$p."', user_id='".$u."' WHERE id=".$id."";
        
        if($con->query($sql) === TRUE) 
        {
            return true;
        } 
        else {
            return false;
            //echo "Error updating record: " . $conn->error;
        }
    }
    
    public function delete($id)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "DELETE FROM Projektet WHERE id=".$id."";
        
        if($con->query($sql) === true) 
        {
            return true;
        } 
        else 
        {
            return false;
            //echo "Error deleting record: " . $conn->error;
        }
    }
    
    /*public function selectAll()
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "SELECT * FROM Useri";
        
        $result = mysqli_query($con, $sql);
        
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                $temp = $row['Kryetar']==1?'Po':'Jo';
                echo "<tr onclick='indeksiReshtit(this)'><td>".$row['ID']."</td>"
                        . "<td>".$row['Emri']."</td>"
                        . "<td>".$row['Mbiemri']."</td>"
                        . "<td>".$row['UserName']."</td>"
                        . "<td>".$row['Nr_personal']."</td>"
                        . "<td>".$row['Gjinia']."</td>"
                        . "<td>".$temp."</td></tr>";
            }
        }
    }*/
    
    
    
    public static function returnProjektetEUserit($user_id)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        $sql = "Select * from Projektet where user_id =".$user_id;
        
        $result = mysqli_query($con, $sql);
        
        if(mysqli_num_rows($result) > 0)
        {
            $row = mysqli_fetch_assoc($result);
            if(isset($row))
            {
                return $row;
            }
        }
        else
        {
            return "No results found.";
        }
    }

    public static function returnProjektinById($id)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        $sql = "Select * from Projektet where id =".$id;
        
        $result = mysqli_query($con, $sql);
        
        if(mysqli_num_rows($result) > 0)
        {
            $row = mysqli_fetch_assoc($result);
            if(isset($row))
            {
                return $row;
            }
        }
        else
        {
            return "No results found.";
        }
    }

    public static function makeProject($emri, $img, $user_id)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();

        $stmt = $con->prepare("INSERT INTO Projektet(emri, img, user_id) values (?,?,?)");

        $stmt->bind_param("ssi", $emri, $img, $user_id);
        
        if($stmt->execute())
        {
            $stmt->close();
            return true;
        }
        else
        {
            echo "Error insert record: " . $con->error;
        }
        return false; 
    }
}



