<?php
    // How login code gonna work ? Actually it Will work with just some code with same idea but Of course Some Main changes Because Login Isn't like the signing up , as the data won't be saved in DataBase
    // so will re-use a little of SignUp code...
    session_start();
    include_once "config.php";
    // next getting the User Data But for login only , (Email - Password)
    $email =  mysqli_real_escape_string($conn, $_POST['email']);
    $password =  mysqli_real_escape_string($conn, $_POST['password']);


    // Next check For The Data As Normal

    if(!empty($email) && !empty($password)) {

            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}' ");
            if (mysqli_num_rows($sql)> 0) {
                // If Num rows More than 0 that means that the email is exist and it will login , ofc using password too
                $row = mysqli_fetch_assoc($sql);
                
                $status = "Active Now";
                $sql2 = mysqli_query($conn , "UPDATE users SET status = '{$status}' WHERE unique_id ={$row['unique_id']} ");
                
                if($sql2) {         
                    $_SESSION['unique_id'] = $row['unique_id']; 
                    echo "success"; 
                }

               

            }else {
                echo "Email or Password Is incorrect!";
            }

    }else {
        echo "Please Fill All Input Fields";
    }








?>