<!DOCTYPE html>
<html lang="en">

  <?php
    session_start();
  ?>

  <head>
    <link rel ="stylesheet" type="text/css" href="style.css"/>
    <meta name="viewport" content="width=device-width"/>
    <title>Login</title>
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
        <h1>Login</h1>
        <form action="authenticate.php" method="POST" id="signin">
          <input type="email" name="email" placeholder="Email" id="email" required>
          <input type="password" name="password" placeholder="Password" id="password" required>
          <?php
            $captchaID = rand(1,4);
            echo "<img src='public/CaptchaImages/" . $captchaID . ".jpg'/>";
            echo "<input type='hidden' id='number' name='number' value='" . $captchaID . "'/>";
          ?>
          <input type="text" name="captcha" placeholder="Please Enter the CAPTCHA code" id="captcha" required>
          <input type="submit" value="Login">
        </form>
    </div>
  </body>
</html>