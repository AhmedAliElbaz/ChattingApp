<?php

    // Now connect to the php database , then include it in signup.php, so can use the $conn normally in there and add user data

    $conn = mysqli_connect("localhost", "root", "" , "chat");
    if (!$conn) {
        echo "DataBase Connection :". " " . mysqli_connect_error();
    }




?>