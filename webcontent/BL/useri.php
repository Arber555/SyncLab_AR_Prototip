<?php


class Useri{
    
    private $emri;
    private $userName;
    private $password;
    private $email;
    
    public function __construct($e, $u, $p, $em)
    {
        $this->emri = $e;
        $this->userName = $u;
        $this->password = $p;
        $this->email = $em;

    }

    function getEmri() {
        return $this->emri;
    }
    
    function getUserName() {
        return $this->userName;
    }

    function getPassword() {
        return $this->password;
    }

    function getEmail() {
        return $this->email;
    }
    
    function setEmri($emri) {
        $this->emri = $emri;
    }
    
    function setUserName($userName) {
        $this->userName = $userName;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setEmail($email) {
        $this->email = $email;
    }
    
    public function insert(Useri $u)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        $stmt = $con->prepare("INSERT INTO Useri(emri, username, password, email) values (?,?,?,?)");

        $stmt->bind_param("ssss", $u->emri, $u->userName, $u->password, $u->email);
        
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
    
    public function update($id, $e, $uN, $em)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
       
        $sql = "UPDATE Useri SET emri='".$e."', username='".$uN."', email='".$em."' WHERE id=".$id."";
        
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
        
        $sql = "DELETE FROM Useri WHERE id=".$id."";
        
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
    
    
    
    public static function returnID($userName)
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "SELECT id FROM Useri WHERE username = '".$userName."'";
        
        $result = mysqli_query($con, $sql);
        
        if(mysqli_num_rows($result) > 0)
        {
            $row = mysqli_fetch_assoc($result);
            if(isset($row))
            {
                return $row['id'];
            }
        }
        else
        {
            return "No results found.";
        }
    }
    
    public static function returnUserin($userName)
    {
        $id = Useri::returnID($userName);
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        $sql = "Select * from Useri where id =".$id."";
        
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
}
    
    