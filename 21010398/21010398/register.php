<!DOCTYPE html>
<html lang="en">

<head>
        <link rel ="stylesheet" type="text/css" href="style.css"/>
        <meta name="viewport" content="width=device-width"/>
        <title>Register</title>
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

    <div class="login">
        <h1>Register</h1>
        <form action="existing.php" method="POST" id="signin">
            <input name="firstname" type="text" placeholder="First Name(s)" required/>
            <input name="surname" type="text" placeholder="Surame" required/>
            <input name="email" type="email" placeholder="Email" required/>
            <input name="phone" type="text" placeholder="Phone" minlength="10" maxlength="10" required/>
            <input name="password" type="password" placeholder="Password" required/>
            <input type="submit" value="Submit" />
        </form>	
    </div>  

</body>
</html>