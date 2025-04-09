<?php

session_start();

if( isset( $_SESSION['loggedin'] ) ) {
    header("Location: orders.php");
}

?>
<html>
    <head>
        <link rel="stylesheet" href="main.css">
        <title>DecorWise - Account</title>
    <script>
    function validateForm() {
        var x = document.forms["contactForm"]
        ["emailorder"].value;
        if (x == "" || x == null) {
            alert("Email must be filled out");
            return false;
        }

    }
</script>    
        
    </head>

    <body>
        
        <header id="header12">
            <div class="container">
                <div id="branding">
                    <h1>DecorWise</h1>
                </div>
                <nav>
                    <ul>
                        <a href="index.html"><li>Home</li></a>
                        <a href="cart.html"><li>Cart - <span class="cartcount">0</span></li></a>
                        <a href="about.html"><li>Why us?</li></a>
                        <a href="contactus.html"><li>Contact Us</li></a>
                        <a href="account.php"><li class="current">Account</li></a>
                    </ul>
                </nav>
            </div>
        </header>
        <br><br><br>
        <div id="contactUsHead">
            <p style="font-size: 30px;">All your orders in one place!</p>
            <p style="font-size: 25px;">Sign in to view all your previous orders.</p>
        </div><br><br>
        <form  action="orders.php" method="post" id="contactForm"
        required>
            
            <label for="emailorder" style="margin-left: 41%; margin-right: auto;"> Email:</label><br> <br> 
            <input type="email" name="emailorder" class="inp" style="height: 40px; width: 340px;display: block;
            margin-left: 32%; "><br><br><br><br>

            <input type="submit" value="Submit" class="button_1" style="margin-left: 40%;">
        
        </form>

        <footer id="footer12">
        Copyright © 2024. All Rights Reserved By DecorWise
            <a href="#">
            <div id="backTop">
                    <img src="Images/back-to-top.png" alt="Top" height="18px" width="18px">
            </div></a>
        </footer>
        <script src="cartjs.js"></script>
    </body>
</html>