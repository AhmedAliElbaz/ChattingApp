<?php
    session_start();
    // First The default Used Code 
    include_once "config.php";


    // Will make A small Exception IN the next line , because it show all the users that in the DataBase Of the App , So the user will see him self , but it's not right to make the user chat with him self , so will make a small expetion in the next line for it which's , [WHERE NOT unique_id = {outgoing_id} ]
    $outgoing_id = $_SESSION['unique_id'];
    $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} ORDER BY user_id DESC";
    $query = mysqli_query($conn, $sql);

    $output = "";

    if (mysqli_num_rows($query ) == 0) {
        $output .= "No Users Is Available To Chat" ;

    }elseif (mysqli_num_rows($query ) > 0) { 
        include "data.php";
    }
    echo $output;


    // And Here Finally , Is returning the Echo , That Could contain Users Or If there's No Users Already So it will return A Not Avaialable Users
    
    // NOTE : THIS OUTPUT WILL GO TO {users.js} Then The {users.js} will send it inside [.users-list]--> (div) in HTML CODE IN [users Html Page]




        







?>