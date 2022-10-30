<?php

    session_start(); // To Get the {Unique_Id} for The User , as the {Unique_Id} Is Automatically set when User Is Login/ signUp , so the user can't reach the Users Page UNLESS He's LOGIN or SIGNUP

    if(!isset($_SESSION['unique_id'])) {
        // So if Unique id Is Not Set That Means The User didn't (login/signup) ,SO it will re-locate the user to the login Page Automatically , whith code Below
        header("location: login.php");
    }


?>








<?php include_once "header.php"; ?>  <!-- importing The Website Default Header From Header.php , instead of repating header code for every Page-->

<body>
    <div class="wrapper">
        <section class="chat-area">
            <header>
                <!-- Here will Make some Php Code to show the User The Data Of the Person That he is talking with like (status - image - name) ,
                like normal chatting Apps When The User Login/signUp , By getting He's Data From The DataBase Using {Unique_id} -->

                <?php

                    include_once "php/config.php";  // First Get the connection To the DataBase From The Config.php

                    // Next will get the user id , that we have passed from {Data.php} that is included in {users.php page} to be used twice (so not to repeat the code) so it will get it's valued based on it because Data.php is just made to be included
                    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);  // get the user id that we passed from {Users.php} Page
                    $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
                    
                    if (mysqli_num_rows($sql)> 0) {
                        $row = mysqli_fetch_assoc($sql);
                    }
                ?>
                <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>

                <img src="php/images/<?php echo $row['img']?>" width="50px" height="50px" alt="">
                    <div class="details">
                        <span><?php echo $row['fname'] . " " . $row['lname'] ?></span>                        
                        <?php 
                            $row['status'] == "Offline now" ? $offline = "offline" :  $offline = "";

                            echo  '<div class="status-dot-inchat '.$offline.' "><i class="fas fa-circle"></i></div>'

                        
                        ?>
                    </div>
            </header>



            <div class="chat-box">

            </div>



            <form action="#" class="typing-area" autocomplete='off'>
                <!-- Here will make Two Ready Hidden Inputs , containing The {User Id} , And The {Other User} He talking to -->
                <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']?>"  hidden   > <!-- this is hidden Input to Get The Current Website User {user_ID} -->
                <input type="text" name="incoming_id"  value="<?php echo $user_id?>"  hidden   > <!-- this is hidden Input to Get The Other Person {user_ID} Who the current Website user is talking to  -->

                <input type="text" name="message" class="input-field" placeholder="Send A Message...">
                <button>send</i></button>
            </form>
        </section>
    </div>


    <script src="javascript/Thechat.js"></script>
    
</body>
</html>