<?php 
    include("connection.php");
    require("foodPriceID.php");

    if($_POST){
        $stmt = mysqli_stmt_init($conn);

        $type = $_POST['type'];
        $flavour = $_POST['flavour'];
        $quantity = $_POST['quantity'];
        $UserID = $_SESSION['id'];
        $arrayPriceID = getPriceID($type, $flavour);
        $Price = $arrayPriceID[1]*$_POST['quantity'];
        $ItemID = $arrayPriceID[0];

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        else{
            $query = "INSERT INTO BASKET (UserID, ItemID, ItemName, Quantity, Flavour, Price) VALUES (?, ?, ?, ?, ?, ?)";
            
            if($stmt -> prepare($query)){
                $stmt->bind_param("iisisd", $UserID, $ItemID, $type, $quantity, $flavour, $Price);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
            else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
        } 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <link rel ="stylesheet" type="text/css" href="style.css"/>
        <meta name="viewport" content="width=device-width"/>
        <title>Catalogue</title>
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
        <div id="catalogue">
            <div class="Food_Item" id="soup">
                <form  method="post">
                    <img src="public/Soups.jpg"/>
                    <label for="soup"><strong>Soups</strong></label>   
                    <select name="flavour" id="flavour">
                        <?php
                            $conn = mysqli_connect($host, $username, $password, $db_name);
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }
                            else{
                                $sql = "SELECT flavour, price FROM FOOD_ITEM WHERE name = 'soup'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        print "<option value='" . $row['flavour'] . "'>" . $row['flavour'] . " - £" . $row['price'] . "</option>";
                                    }
                                } 
                                else {
                                    echo "Nothing found from the Database";
                                }

                                $conn->close();
                            }
                        ?> 
                    </select>
                    <?php
                        if (isset($_SESSION['loggedin'])) {
                            echo "<label for='quantity'><strong>Quantity:</strong></label>";
                            echo "<input type='number' id='quantity' name='quantity' placeholder='Enter Quantity' min='1'/>";
                            echo "<input type='hidden' id='type' name='type' value='soup'/>";
                            echo "<button type='submit'>Add to Basket</button>";
                        }
                    ?>
                </form>
            </div>

            <div class="Food_Item" id="wrap">
                <form  method="post">
                    <img src="public/Wraps.jpg"/>
                    <label for="wrap"><strong>Wraps</strong></label>   
                    <select name="flavour" id="flavour">
                        <?php
                            $conn = mysqli_connect($host, $username, $password, $db_name);
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }
                            else{
                                $sql = "SELECT flavour, price FROM FOOD_ITEM WHERE name = 'wrap'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        print "<option value='" . $row['flavour'] . "'>" . $row['flavour'] . " - £" . $row['price'] .  "</option>";
                                    }
                                } 
                                else {
                                    echo "Nothing found from the Database";
                                }

                                $conn->close();
                            }
                        ?> 
                    </select>
                    <?php
                        if (isset($_SESSION['loggedin'])) {
                            echo "<label for='quantity'><strong>Quantity:</strong></label>";
                            echo "<input type='number' id='quantity' name='quantity' placeholder='Enter Quantity' min='1'/>";
                            echo "<input type='hidden' id='type' name='type' value='wrap'/>";
                            echo "<button type='submit'>Add to Basket</button>";
                        }
                    ?>
                </form>
            </div>
            <div class="Food_Item" id="taco">
                <form  method="post">
                <img src="public/Tacos.jpg"/>
                <label for="taco"><strong>Tacos</strong></label>   
                    <select name="flavour" id="flavour">
                        <?php
                            $conn = mysqli_connect($host, $username, $password, $db_name);
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }
                            else{
                                $sql = "SELECT Flavour, Price FROM FOOD_ITEM WHERE name = 'taco'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        print "<option value='" . $row['Flavour'] . "'>" . $row['Flavour'] . " - £" . $row['Price'] . "</option>";
                                    }
                                } 
                                else {
                                    echo "Nothing found from the Database";
                                }

                                $conn->close();
                            }
                        ?> 
                    </select>
                    <?php
                        if (isset($_SESSION['loggedin'])) {
                            echo "<label for='quantity'><strong>Quantity:</strong></label>";
                            echo "<input type='number' id='quantity' name='quantity' placeholder='Enter Quantity' min='1'/>";
                            echo "<input type='hidden' id='type' name='type' value='taco'/>";
                            echo "<button type='submit'>Add to Basket</button>";
                        }
                    ?>
                </form>
            </div>

            <div class="Food_Item" id="sandwiches">
                <form  method="post">
                <img src="public/sandwich.jpg"/>
                <label for="sanwiches"><strong>Sandwiches</strong></label>   
                    <select name="flavour" id="flavour">
                        <?php
                            $conn = mysqli_connect($host, $username, $password, $db_name);
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }
                            else{
                                $sql = "SELECT flavour, price FROM FOOD_ITEM WHERE name = 'sandwich'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        print "<option value='" . $row['flavour'] . "'>" . $row['flavour'] . " - £" . $row['price'] . "</option>";
                                    }
                                } 
                                else {
                                    echo "Nothing found from the Database";
                                }

                                $conn->close();
                            }
                        ?> 
                    </select>
                    <?php
                        if (isset($_SESSION['loggedin'])) {
                            echo "<label for='quantity'><strong>Quantity:</strong></label>";
                            echo "<input type='number' id='quantity' name='quantity' placeholder='Enter Quantity' min='1'/>";
                            echo "<input type='hidden' id='type' name='type' value='sandwich'/>";
                            echo "<button type='submit'>Add to Basket</button>";
                        }
                    ?>
                </form>
            </div>
        </div>
        <div id="catalogue">
            <div class="Food_Item" id="burrito">
                <form  method="post">
                <img src="public/burrito.jpg"/>
                <label for="burrito"><strong>Burritos</strong></label>   
                    <select name="flavour" id="flavour">
                        <?php
                            $conn = mysqli_connect($host, $username, $password, $db_name);
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }
                            else{
                                $sql = "SELECT flavour, price FROM FOOD_ITEM WHERE name = 'burrito'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        print "<option value='" . $row['flavour'] . "'>" . $row['flavour'] . " - £" . $row['price'] . "</option>";
                                    }
                                } 
                                else {
                                    echo "Nothing found from the Database";
                                }

                                $conn->close();
                            }
                        ?> 
                    </select>
                    <?php
                        if (isset($_SESSION['loggedin'])) {
                            echo "<label for='quantity'><strong>Quantity:</strong></label>";
                            echo "<input type='number' id='quantity' name='quantity' placeholder='Enter Quantity' min='1'/>";
                            echo "<input type='hidden' id='type' name='type' value='burrito'/>";
                            echo "<button type='submit'>Add to Basket</button>";
                        }
                    ?>
                </form>
            </div>

            <div class="Food_Item" id="pasta">
                <form  method="post">
                <img src="public/pasta.jpg"/>
                <label for="pasta"><strong>Pastas</strong></label>   
                    <select name="flavour" id="flavour">
                        <?php
                            $conn = mysqli_connect($host, $username, $password, $db_name);
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }
                            else{
                                $sql = "SELECT flavour, price FROM FOOD_ITEM WHERE name = 'pasta'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        print "<option value='" . $row['flavour'] . "'>" . $row['flavour'] . " - £" . $row['price'] . "</option>";
                                    }
                                } 
                                else {
                                    echo "Nothing found from the Database";
                                }

                                $conn->close();
                            }
                        ?> 
                    </select>
                    <?php
                        if (isset($_SESSION['loggedin'])) {
                            echo "<label for='quantity'><strong>Quantity:</strong></label>";
                            echo "<input type='number' id='quantity' name='quantity' placeholder='Enter Quantity' min='1'/>";
                            echo "<input type='hidden' id='type' name='type' value='pasta'/>";
                            echo "<button type='submit'>Add to Basket</button>";
                        }
                    ?>
                </form>
            </div>

            <div class="Food_Item" id="pizza">
                <form  method="post">
                <img src="public/pizza.jpg"/>
                <label for="pizza"><strong>Pizzas</strong></label>   
                    <select name="flavour" id="flavour">
                        <?php
                            $conn = mysqli_connect($host, $username, $password, $db_name);
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }
                            else{
                                $sql = "SELECT flavour, price FROM FOOD_ITEM WHERE name = 'pizza'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        print "<option value='" . $row['flavour'] . "'>" . $row['flavour'] . " - £" . $row['price'] . "</option>";
                                    }
                                } 
                                else {
                                    echo "Nothing found from the Database";
                                }

                                $conn->close();
                            }
                        ?> 
                    </select>
                    <?php
                        if (isset($_SESSION['loggedin'])) {
                            echo "<label for='quantity'><strong>Quantity:</strong></label>";
                            echo "<input type='number' id='quantity' name='quantity' placeholder='Enter Quantity' min='1'/>";
                            echo "<input type='hidden' id='type' name='type' value='pizza'/>";
                            echo "<button type='submit'>Add to Basket</button>";
                        }
                    ?>
                </form>
            </div>

            <div class="Food_Item" id="salad">
                <form  method="post">
                <img src="public/salad.jpg"/>
                <label for="salad"><strong>Salads</strong></label>   
                    <select name="flavour" id="flavour">
                        <?php
                            $conn = mysqli_connect($host, $username, $password, $db_name);
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }
                            else{
                                $sql = "SELECT flavour, price FROM FOOD_ITEM WHERE name = 'salad'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        print "<option value='" . $row['flavour'] . "'>" . $row['flavour'] . " - £" . $row['price'] . "</option>";
                                    }
                                } 
                                else {
                                    echo "Nothing found from the Database";
                                }

                                $conn->close();
                            }
                        ?> 
                    </select>
                    <?php
                        if (isset($_SESSION['loggedin'])) {
                            echo "<label for='quantity'><strong>Quantity:</strong></label>";
                            echo "<input type='number' id='quantity' name='quantity' placeholder='Enter Quantity' min='1'/>";
                            echo "<input type='hidden' id='type' name='type' value='salad'/>";
                            echo "<button type='submit'>Add to Basket</button>";
                        }
                    ?>
                </form>
            </div>
        </div>
    </body>
</html>