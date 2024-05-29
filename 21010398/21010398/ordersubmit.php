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

        <?php
            $sql = "SELECT ItemID, Quantity FROM BASKET WHERE UserID = ?";
            $stmt = $conn->prepare($sql);
            $id = $_SESSION['id'];
            $stmt->bind_param("i", $id);
            $result = $conn->query($sql);
            // $stmt->execute();
            // $stmt->store_result();
            $result->bind_result($itemID, $quantity);

            if ($stmt->num_rows > 0){
                while ($row = mysqli_fetch_array($result)){
                    $sql = "INSERT INTO FOOD_ORDERED (UserID, ItemID, Quantity) VALUES (?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("iii", $id, $itemID, $quantity);
                    $stmt->execute();
                }

                mysqli_stmt_close($stmt);
                echo '<div id="orderSuccessful">';
                    echo '<h1>Order Successful!</h1>';
                    echo '<p>Thank you for your order!</p>';
                    echo '<p>Your receipt and further updates will be sent to your registered email</p>';
                    echo '<p>Your order should arrive within 5-7 Business Days</p>';
                    echo '<small><p>If you have any issues, please contact us on <strong>XXXXXXXXXX</strong>
                        or Email us at <strong>customerservice@thefoodcompany.co.uk</strong>
                    </p></small>';
                echo '</div>';
            }
            else{
                echo '<div id="orderSuccessful">';
                    echo '<h1>Uh Oh!</h1>';
                    echo '<p>Something Went Wrong!</p>';
                    echo '<p>Please Try Again</p>';
                    echo '<small><p>If this issue persists, please contact us on <strong>XXXXXXXXXX</strong>
                        or Email us at <strong>customerservice@thefoodcompany.co.uk</strong></p></small>';
                echo '</div>';
            }
        ?>
    </body>
</html>