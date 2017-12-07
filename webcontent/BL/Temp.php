<?php


class Temp{
    
    private $tempText;
    
    public function __construct($t)
    {
        $this->tempText = $t;
    }

    public function insertNew()
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        $stmt = $con->prepare("INSERT INTO Temp(temp_text) values (?)");
        
        $t = new Temp("text");
        $fileName = "temp/temp". $t->getTheLastID() .".php";

        $stmt->bind_param("s", $fileName);
        
        $myfile = fopen($fileName, "w");

        fwrite($myfile, "<html>
        <script src='../ARjs/aframe.min.js'></script>
        <!-- include ar.js for A-Frame -->
        <script src='../ARjs/aframe-ar.js'></script>
        <body style='margin : 0px; overflow: hidden;'>
            <a-scene embedded arjs='trackingMethod: best;' id='scene'>
                <a-marker preset='hiro' id='marker'>
                   
                </a-marker>
                <a-entity camera></a-entity>
            </a-scene>
        </body>
        </html>");
        
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

    public function getTheLastID()
    {
        $sqlConnection = new SQLConnection();
        $con = $sqlConnection->connection();
        
        $sql = "SELECT max(id) FROM Temp";
        
        $result = mysqli_query($con, $sql);
        
        if(mysqli_num_rows($result) > 0)
        {
            $row = mysqli_fetch_assoc($result);
            if(isset($row))
            {
                return $row['max(id)'];
            }
        }
        else
        {
            echo "aaaaa";
            return "No results found.";
        }
    }
}