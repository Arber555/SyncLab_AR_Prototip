<?php
    include "SQLConnection.php";

    $sqlConnection = new SQLConnection();

    $con = $sqlConnection->connection();
        
    $sql = "SELECT * FROM Projektet";
        
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $output[] = $row;
        }
    }

    print(json_encode($output, JSON_PRETTY_PRINT));
?>