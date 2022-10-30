<?php
    session_start();
    if(isset($_SESSION['unique_id'])) {
        // The condition is checking  for it the User Unique Id is passed to this page ,  that means that the user is logged , then it will logout him
        // otherwise it will send him to login page {login.php} because if the {unique_id} is not set here that means that he got no account to log out from it
        
        include_once "config.php";
        $logout_id = mysqli_real_escape_string($conn , $_GET['logout_id']);
        if(isset($logout_id)) {
            $status = "Offline now";
            $sql = mysqli_query($conn , "UPDATE users SET status = '{$status}' WHERE unique_id ={$logout_id} ");
            if($sql) {
                session_unset();
                session_destroy();
                header("location: ../login.php"); }

        } else { header("location: ../users.php"); }

    }else {
        header("location: ../login.php"); }









?>