<?php
    
    $outgoing_id = $_SESSION['unique_id'];
while($row = mysqli_fetch_assoc($query)) {


    //Next code to Over View The message Coming From Someone Just from OutSide the Chat 
    $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
    OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
    OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";

    $query2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($query2);

    (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";





    //Next will check if the Message is Too Long , will Cut it and show Part from it in outside Part ON The Chat ,
    // but when enter the chat OFC it will show the full text when enter the chat itself

    // strlen (Get string length so can know if it's too long to show from outside or not)
    (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;


   // If the Unique_id of the sender is The Page user , it will add (YOU: message) in his message instead of  (message only ) ,  that's all will be on the outer Look of the chat between two People , but from inside It will show the full message normally
   if(isset($row2['outgoing_msg_id'])){
    ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
    }else{
        $you = "";
    }
   
    // Next here will check the User Status Code , [IMPORTANT]
    $row['status'] == "Offline now" ? $offline = "offline" :  $offline = "";


    // As this file is included to the search - users , because both are showing the users list but with some condtions before including this file ,
    //  So this file is Totally common code between them two use , 

    // As it's included , so the {$output} below will be defind in the Files that Included this file {data.php} , so the output will be returned By other files 
    // and after it will pass it to javascript code like (users.js), and it's function to  do  :
    // Request these Php Files then send them a Data (POST) when user Input Anything in Html , then get the result of the returned data from Php Files , and finally connect to the Html Again and make changes In the page Based on Javascript Code

    // so this is the default line that the project is working with ::::: (HTML -> Javascript -> [PHP(POST) / PHP(GET)] -> Javascript -> Edit HTML Data = The result is dynamic Page Based On DataBase... )
    
    $output .='<a href="chat.php?user_id='.$row['unique_id'].' ">
                    <div class="content">
                        <img src="php/images/'. $row['img'] .'" alt="">
                        <div class="details">
                            <span>'. $row['fname'] . " " . $row['lname'] .'</span>
                            <p style="color:#000000ad;font-weight:400;font-size:14px;">'.$you .$msg.'</p>
                        </div>
                    </div>
                    <div class="status-dot '.$offline.' "><i class="fas fa-circle"></i></div>
                </a>';
}








?>