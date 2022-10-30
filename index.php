<!-- NOTE ;

This is the default line that the project is working with for Most files with each others :
(HTML -> Javascript -> [PHP(POST) / PHP(GET)] -> Javascript -> Edit HTML Data = The result is dynamic Page Based On DataBase... )

-->



<?php include_once "header.php"; ?>  <!-- importing The Website Default Header From Header.php , instead of repating header code for every Page-->

<body>
    <div class="wrapper">
        <section class="formHolder signup">

            <header>SIGN UP</header>
            <form action="#" enctype="multipart/form-data" autocomplete="off">
                <div class="error-txt" style="display: none;">Please Fill All Input Fields</div>
                <div class="user-data">
                    <div class="field TextInputs">
                        
                        <input type="text" name="fname" placeholder="First Name" required>
                    </div>

                    <div class="field TextInputs">
                        
                        <input type="text" name="lname" placeholder="Last Name" required>
                    </div>

                    <div class="field TextInputs">
                        
                        <input type="text" name="email" placeholder="Email Address" required>
                    </div>

                    <div class="field TextInputs">
                        
                        <input type="password" name="password" placeholder="Your New password" required>
                        <i class="fas fa-eye"></i>
                    </div>

                    <div class="field userImg">

                        <div class="upload-btn-wrapper">
                            <button class="btn">Upload a file</button>
                            <input type="file" name="image" accept="image/png,image/jpg,image/jpeg"  style="
                                    padding: 32px 0px 0px 0px;
                                    width: 124px;
                                    height: 29px;">
                        </div>

                        

                        
                    </div>

                    <div class="field submitB">
                        <input type="submit" value="Sign Up Now">
                    </div>

                </div>
            </form>
            <div class="link">Have Account? <a href="login.php">Login Here</a> </div>

        </section>
    </div>

    <script src="javascript/pass-show-hide.js"></script>

    <!-- Very Very importatn script link  (signUp)-->
    <script src="javascript/signup.js"></script>

    


</body>
</html>