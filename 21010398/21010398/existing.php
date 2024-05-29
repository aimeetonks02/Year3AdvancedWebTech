<?php
    include("connection.php");
    if ($stmt = $conn->prepare('SELECT UserID FROM FOOD_CUSTOMER WHERE Email = ?')) {
        $stmt->bind_param('s', $_POST['email']);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id);

        $firstname = $_POST['firstname'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
        $phone = $_POST['phone'];
        
        if ($stmt->num_rows > 0) {
            header('Location: register.php');
        } 
        
        else {
            
            $query = 'INSERT INTO FOOD_CUSTOMER (Firstname, Surname, Email, Password, Phone) VALUES (?, ?, ?, ?, ?)';
            if($stmt -> prepare($query)){
                mysqli_stmt_bind_param($stmt, "ssssi", $firstname, $surname, $email, $password, $phone);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $firstname;
                $_SESSION['id'] = $id;
                $_SESSION['email'] = $email;
                header('Location: main.php');
            }
            else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
        }
    } 
    
    else {
        echo 'Could not prepare statement!';
    }
    $conn->close();
?>