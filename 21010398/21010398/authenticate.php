<?php
    include("connection.php");

    if($conn) {
        $sql = "SELECT CaptchaID, Value FROM CAPTCHA";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_array($result)) {
                if ($_POST['captcha'] === $row['Value'] && $_POST['number'] === $row['CaptchaID']) {
                    if($stmt = $conn->prepare('SELECT UserID, Firstname, Password FROM FOOD_CUSTOMER WHERE Email = ?')) {
                        $email = $_POST['email'];
                        $stmt->bind_param('s', $email);
                        $stmt->execute();
                        $stmt->store_result();

                        if ($stmt->num_rows > 0) {
                            $stmt->bind_result($id, $firstname, $password);
                            $stmt->fetch();
                            if (password_verify($_POST['password'], $password)) {
                                session_regenerate_id();
                                $_SESSION['loggedin'] = TRUE;
                                $_SESSION['name'] = $firstname;
                                $_SESSION['id'] = $id;
                                $_SESSION['email'] = $email;
                                header('Location: main.php');
                            } else {
                                echo 'Incorrect username and/or password';
                            }
                        } else {
                            echo 'Incorrect username and/or password';
                        }

                        $stmt->close();
                    }
                }
                else{
                    echo 'Incorrect CAPTCHA';
                }
            }
        }
    }
    else{
        echo 'SQL Failure';
    }
?>