<?php
    session_start();

    // including The Config.php , to Defind The Database connection Here....

    include_once("config.php");
    $outgoing_id = $_SESSION['unique_id'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']); // Get the Seatch Term , To Know the Name from search input

    // Makking Sql Request , to check if the Name searched is not the searcher Name becuase He want to find A Other youser not himself , and if the FirstName - last Name  , is common with any user in DataBase it will hide all Users And Show Him Only
    $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%') ";
    
    $output = "";

    // Making A query connecttion to the server DataBase , to check if the $sql conditions is found or not 
    // , so if it's found  OFC it's num rows will be more than 0 , but if it didn't , the Num rows Ofc will be equal 0  // 
    //so there's No Users In Are Row if the rows that his First/Last Nmae Matched With The Search Term
    $query = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($query) > 0){
        include_once "data.php"; // Including Data.php Once That Shows The Users List , According to Some Terms And Condtions In Data.php , the not's will be foudn there
    }else {
        $output .= "No User Found With This Name";
    }

    echo $output;




?>