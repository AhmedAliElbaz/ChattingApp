<?php include_once "header.php"; ?>  <!-- importing The Website Default Header From Header.php , instead of repating header code for every Page-->





<body>
    <div class="wrapper">
        <section class="formHolder login">

            <header>LOGIN</header>
            <form action="#">
                <div class="error-txt">Please Fill Input Fields</div>
                <div class="user-data">

                    <div class="field TextInputs">
                        <input type="text" name="email" placeholder="Email Address">
                    </div>

                    <div class="field TextInputs">
                        <input type="password" name="password" placeholder="Your password">
                        <i class="fas fa-eye"></i>
                    </div>

                    <div class="field submitB">
                        <input type="submit" value="Login Now">
                    </div>

                </div>
            </form>
            <div class="link">Not Yet signed up? <a href="index.php">SighUp Now</a> </div>

        </section>
    </div>

    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/login.js"></script>


    
</body>
</html>