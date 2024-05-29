<?php
function getPriceID($type, $flavour) : array{

    $host = "katara.scam.keele.ac.uk";
    $db_name = "x5z29";
    $username = "x5z29";
    $password = "x5z29x5z29";

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $conn = mysqli_connect($host, $username, $password, $db_name);
    $stmt = mysqli_stmt_init($conn);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else{
        $sql = "SELECT ID, Price FROM FOOD_ITEM WHERE Name = ? AND Flavour = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $type, $flavour);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($ItemID, $Price);
        
        if ($stmt->num_rows > 0){
            while ($stmt->fetch()){
                $values = array($ItemID, $Price);
                return $values;
            }            
        }
        else{
            echo "cannot find item";
        }
    }
}
?>