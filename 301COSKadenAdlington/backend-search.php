<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
require "includes/connect.php";
 
try{
    // Start a session
    session_start();
        // Define statements
        //Get the search term using $_REQUEST and add % to the end of the term
        $term1 = $_REQUEST ["term"] . '%';
        //Add % to the front of the term
        $term = "%$term1";
        //Prepare sql statement
        $sql = "SELECT * FROM `wtlaptop` WHERE productpage LIKE :term AND (`productprice`!='null') ORDER BY  `productprice` ASC ";
        $stmt = $pdo->prepare($sql);
        //Bind the paramater $term to :term for sql
        $stmt->bindParam(":term", $term);
        //Exceucute the first search queary
        $stmt->execute();
        //If $term is joshisannoyingandkadenisfarsuperior then redirect  to easter egg
        if ($term == "%joshisannoyingandkadenisfarsuperior%"){
            echo '<script>location.href="https://php.mmc.school.nz/301 COS/kadenadlington/301COSKadenAdlington/J0SHISASMARTPERSONLOL.php"</script>';
        }
        //If $term is not joshisannoyingandkadenisfarsuperior then continue with search query
        else {
            //If the search query returns a result
        if($stmt->rowCount()){
            //Feth the results
            while($row = $stmt->fetch()){
                //Get paramerters for second query
                $model = $row['productmodel'];
                //Prepare sql statement to find the id of 
                $sql1 = "SELECT * FROM `Linking` WHERE productmodel = :model;";
                $stmt1 = $pdo->prepare($sql1);
                //Bind paramaters for :model
                $stmt1->bindParam(":model", $model);
                //Excecute the search query
                $stmt1->execute();
                //Fetch reuslts to obtain the id for the indervidual results
                while($rowid = $stmt1->fetch()){ 
                    //Prepare sql statement to find the cheapest price for the product
                    $sql2 = "SELECT * FROM `stores` WHERE `productmodel` = :model ORDER BY `productprice` ASC LIMIT 1";
                    $stmt2 = $pdo->prepare($sql2);
                    //Bind the parameters for the model of the specific product
                    $stmt2->bindParam(":model", $model);
                    //Execure the search query
                    $stmt2->execute();
                    //Fetch result for the cheapest pirce for the product
                    while($rowmodel = $stmt2-> fetch()){
                    //Set the id variable to the id from linking database
                    $id = $rowid['productid'];
                    //Set the link to the product page depending on the id
                    $href = 'https://php.mmc.school.nz/301COS/kadenadlington/301COSKadenAdlington/productid/'.$id;
                    //Echo the results as a formated HTML peice
                    echo "
                    <a class='searches' href='".$href."'>
                    <div class=productresults>
                    <div class=minigrid>
                    <div class=thumbdiv>
                     <img src=" . $row['imgurl'] . "alt=imagelap class=thumb>
                     </div>
                     <div class=thumbtext>
                     <p class='productsearchname'>" . $row["productpage"] .  "</p>
                     <p class='pricey'>$" . $rowmodel["productprice"] . "</p>

                     </div>
                     <div class=specshow>            
                     <table class='specsthumb'>
                     <tr>
                         <td class='tableleft'>Ram</td>
                         <td class='tableright'>". $row["memorysize"] ." </td>
                     </tr>
                     <tr>
                         <td class='tableleft'>Screensize</td>
                         <td class='tableright'>" . $row["screensize"] ."</td>
                     </tr>
                     <tr>
                         <td class='tableleft'>CPU Family</td>
                         <td class='tableright'>" . $row["cpufamily"] ." </td>
                     </tr>
                     <tr>
                         <td class='tableleft'>Operating System</td>
                         <td class='tableright'>". $row["laptopos"]. "</td>
                     </tr>
                     <tr>
                     <td class='tableleft'>Graphics Card</td>
                     <td class='tableright'>". $row["laptopgpu"]. "</td>
                    </tr>
                    </table>
                    </div>
                     </div>
                     </p>
                     </div>
                     </a>";
                }
            }
        }
    }
}    //If an error occurs 

} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
}
?>