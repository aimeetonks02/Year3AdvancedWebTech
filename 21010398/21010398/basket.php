<?php 
include("connection.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <link rel ="stylesheet" type="text/css" href="style.css"/>
        <meta name="viewport" content="width=device-width"/>
        <title>Basket</title>
    </head>
    <body>
        <div class="nav">
            <input type="checkbox" id="nav-check"/>
            <div class="nav-header">
                <div class="nav-title">
                Food Company
                </div>
            </div>
            <div class="nav-btn">
                <label for="nav-check">
                <span></span>
                <span></span>
                <span></span>
                </label>
            </div>

            <div class="nav-links">
                <a href='/prin/x5z29/AWTCoursework/21010398/main.php'>Home</a>
                <a href='/prin/x5z29/AWTCoursework/21010398/catalogue.php'>Catalogue</a>
                <?php
                if (!isset($_SESSION['loggedin'])) {
                    echo "<a href='/prin/x5z29/AWTCoursework/21010398/register.php'>Register</a>";
                    echo "<a href='/prin/x5z29/AWTCoursework/21010398/login.php'>Login</a>";
                }
                else{
                    echo "<a href='/prin/x5z29/AWTCoursework/21010398/basket.php'>Basket</a>";
                    echo "<a href='/prin/x5z29/AWTCoursework/21010398/logout.php'>Logout</a>";
                }
                ?>
            </div>
        </div>
            <div>
                <?php
                    $sql = "SELECT ItemName, Quantity, Flavour, Price FROM BASKET WHERE UserID = ?";
                    $stmt = $conn->prepare($sql);
                    $id = $_SESSION['id'];
                    $stmt->bind_param("i", $id);
                    $stmt->execute();
                    $stmt->store_result();
                    $stmt->bind_result($itemName, $quantity, $flavour, $price);

                    if ($stmt->num_rows > 0){

                        echo '<table>';
                        echo '<tr>';
                        echo '<td>Product</td>';
                        echo '<td>Flavour</td>';
                        echo '<td>Quantity</td>';
                        echo '<td>Total Price</td>';
                        echo '</tr>';

                        while ($stmt->fetch()){
                            echo '<tr>';
                                echo '<td>' . $itemName . '</td>';
                                echo '<td>' . $flavour . '</td>';
                                echo '<td>' . $quantity . '</td>';
                                echo '<td> £' . $price . '</td>';
                            echo '</tr>';
                        }
                        echo '</table>';
                    }
                    else{
                        echo '<center><h1>Your Basket is Empty!</h1></center>';
                        echo $id;
                    }
                ?>
                <form action="ordersubmit.php">
                    <input type="submit" class="big_button" value="Submit Order"/>
                </form>
            </div>
    </body>
</html>