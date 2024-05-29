<?php
    session_start();
?>
<html lang="en">
<head>
        <link rel ="stylesheet" type="text/css" href="style.css"/>
        <meta name="viewport" content="width=device-width"/>
        <title>Home</title>
        <meta name="description" content="Use this site to browse The Food COmpany's catalogue and place orders.">
        <meta name="keywords" content="food store, catering company, order catering, mass catering, school catering">
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
        <div class="big">
            <?php
                if (!isset($_SESSION['loggedin'])) {
                    echo "<h1>Welcome to Food Company's Website</h1>";
                    echo "<h2>Use this site to browse our catalogue or sign in to make purchases.</h2>";
                }
                else{
                    echo "<h1>Welcome back, " . htmlspecialchars($_SESSION['name'], ENT_QUOTES) . "!</h1>";
                    echo "<h2>Use this site to browse our catalogue and make purchases.</h2>";
                }
            ?>            
        </div>
    </body>
    <footer>

    </footer>
</html>