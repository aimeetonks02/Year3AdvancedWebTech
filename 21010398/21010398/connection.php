<?php
    session_start();

    $host = "katara.scam.keele.ac.uk";
    $db_name = "x5z29";
    $username = "x5z29";
    $password = "x5z29x5z29";

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $conn = mysqli_connect($host, $username, $password, $db_name);

    if (!$conn) {
  	    die("Connection failed: " . mysqli_connect_error());
    }
?>
