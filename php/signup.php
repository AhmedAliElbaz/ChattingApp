<?php
    include_once "config.php";
    session_start();
    // next getting the User Data , (First/Last Name - Email - Password)



    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname =  mysqli_real_escape_string($conn, $_POST['lname']);
    $email =  mysqli_real_escape_string($conn, $_POST['email']);
    $password =  mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($fname) &&!empty($lname) &&!empty($email) && !empty($password)) {
        //Now the email validation , using filter to validate the email
        if(filter_var($email , FILTER_VALIDATE_EMAIL)) {
            
            
            // Before Signing the email - he to check if it's already used by other user , by checking for the Email in The dataBase
            $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
            if (mysqli_num_rows($sql)> 0) {
                echo "The Email $email is already Used";
                // if the condition is more than 0 that means that the email is already exist in the dataBase
            }else {
                
                // checking if user Uploaded His Personal Image File or not 
                if(isset($_FILES['image'])) {
                    // Next code will get the personal image data 
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name']; // Temp name of Image File to Control It in the folder




                    //Now get The Extention of the Image Should Be (jpeg , png , jpg )

                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode); //Here is the extintion of the Image file


                    $extenstions = ['png','jpeg','jpg']; // The Supported extenstions

                    //Next will check if the User Image extenstion is supported
                    if(in_array($img_ext , $extenstions) === true) {

                        $time = time(); // this line get the current time , so can store every User Image with Unique Name , With Adding The Date in The Id
                        
                        // Here Move The User Image
                        $new_image_name = $time.$img_name;

                        //Next code will upload the Image of the user and check on it too

                        if(move_uploaded_file($tmp_name,"images/".$new_image_name)){
                        // after done will set some Data belongs to the User , this Data Is Auto Generated From The Script
                        

                        // Here will add the Default status Of User Once he signUp  , which is Active(online) 
                        // and it will change with some code to Active with Online and Offline When Not online
                        $status = "Active Now";


                        // get the user a Random Id
                        $random_id = rand(time() ,10000000); // Generating Random Id for the User 
                        

                        // HERE Is Adding The User Data , in The [USERS] Table inside the DataBase

                        
                        

                        // so As Normal , got the connection and will INSERT The Data in it
                        
                        

                        $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id , fname ,lname , email , password , img , status )
                                        VALUES({$random_id} , '{$fname}','{$lname}' , '{$email}' , '{$password}' , '{$new_image_name}' , '{$status}')");
                        
                        // Now will check If the user Data Is Inserted

                        if($sql2) {
                            
                            // WHAT NEXT ??
                                // NOW WILL Make A SQL Request to the DataBase  Then , 
                                // get the Row that contians the User Data in {users} Table To Get The {Unique Id} Of the User, To Use it in other Page
                            
                            
                            
                            $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email ='{$email}'" );

                            if(mysqli_num_rows($sql3) > 0) {
                                $row = mysqli_fetch_assoc($sql3);
                                $_SESSION['unique_id'] = $row['unique_id'];  //   Adding it In _SESSION to use it in other Php Page , As unique_id needed to complete the process
                                echo "success";
                            }

                            
                        } else {
                            echo "Something Went Wrong !!!";
                        }
                            
                        
                    

                        }


                        



                    }else {
                        echo "Please Select A supported Image Type - png , jpeg , jpg ";
                    }




                } else {
                    echo "Please Select Image File - png , jpeg , jpg";
                }
            }

        }else {
            echo "The $email Is Invalide";
        }


    } else {
        echo "Please Fill All Input Fields";
    }





?>