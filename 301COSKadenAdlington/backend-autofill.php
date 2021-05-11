<?php
require "includes/connect.php";

// Attempt search query execution
try{
    if(isset($_REQUEST["term"])){
        // create prepared statement
        $sql = "SELECT * FROM wtlaptop WHERE productpage LIKE :term AND (`productprice`!='null') LIMIT 3;";
        $stmt = $pdo->prepare($sql);
        $term1 = $_REQUEST ["term"] . '%';
        $term = "%$term1";
        // bind parameters to statement
        $stmt->bindParam(":term", $term);
        // execute the prepared statement
        $stmt->execute();
        //If their is a result fetch it and display it
        if($stmt->rowCount() > 0){
            while($row = $stmt->fetch()){
                // Display the results in a div
                echo "<div class=results><p>" . $row["productpage"] . "</p></div>";
            }
        }
    }  
    //If an error occurs 
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
?>