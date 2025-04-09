<?php

$cost = $_POST['cost'];
$items = $_POST['items'];
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];
$startdate = date('Y-m-d');
$itemstag = $_POST["itemsTag"];


$con = mysqli_connect("localhost","vaishu123","vaish123");
mysqli_select_db($con,"jproject");

$items = str_replace("\n","<br>",$items);

$sql = "INSERT INTO buyhistory (items, cost, name, email, mobile, address, startdate, itemstag, issuedate) 
VALUES ('$items', $cost, '$name', '$email', '$mobile', '$address', '$startdate', '$itemstag', NOW());";
$result = mysqli_query($con, $sql);
$result = mysqli_query($con,$sql);

$to_email = "$email";
$subject = "Order Reciept";
$body = "Thank you $name, for ordering with us. Your order reciept follows:

List of items: \n                      ".str_replace("0","\n                      ",$items)."

Total Bill:      Rs.$cost

Your address: 
$address

Booking date: $startdate

We wish to see you again soon!";


?>
<html>
<head>
    <title>Order placed!</title><link rel="stylesheet" href="main.css">
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
                        <a href="cart.html"><li class="current">Cart</li></a>
                        <a href="about.html"><li>Why us?</li></a>
                        <a href="contactus.html"><li>Contact Us</li></a>
                        <a href="account.php"><li>Account</li></a>
                    </ul>
                </nav>
            </div>
        </header>

        <section id="submitted">
            <h1>Order placed successfully!!</h1>
            <p><?php
            $body = "Thank you $name, for ordering with us. <br><br><h3>Here's your order summary!:</h3><br><br>
            <div id='ordersummary' align='left'>
                
                <br><br>
                Total Bill: Rs.$cost<br><br>
                
                Your address: 
                $address
                <br><br>
                Booking date: $startdate
                <br><br>
                <br>
            </div>
                We wish to see you again soon!";
            echo $body;
            echo "<p>A mail with your order summary has also been sent to $email.</p>";
            ?>
            </p>
</br></br>
            <p>Head to:</p>
            <section class="container content-section">
            <div class="shop-items">
                <a href="about.html" style="text-decoration:none; color:black;">
                <div class="submitted-items-item">
                    <img class="shop-item-image-custom2" src="Images/about_us.png" height="200px" width="500px">
                    <div class="shop-item-details">
                        <span class="shop-item-price">About us</span>
                        
                    </div>
                    <span class="item-on-hover"><div style="word-wrap: break-word;"><p>About our website & our aim.</p></div></span>
                </div>
                </a>
                <a href="index.html" style="text-decoration:none; color:black;">
                <div class="submitted-items-item">
                    <img class="shop-item-image-custom2" src="Images/home_page.PNG" height="100px" width="500px">
                    <div class="shop-item-details">
                        <span class="shop-item-price">Home Page</span>
                        
                    </div>
                    <span class="item-on-hover"><div style="word-wrap: break-word;"><p>All our products! Browse through them.</p></div></span>
                </div>
                </a>
            </div>

        </section>
        <script src="vanilla-tilt.min.js"></script>
        <script>
            VanillaTilt.init(document.querySelectorAll(".submitted-items-item"), {
		max: 18,
		speed: 400
	});
        </script>
            
        </section>

        <footer id="footer12">
        Copyright © 2024. All Rights Reserved By DecorWise
            <a href="#">
            <div id="backTop">
                    <img src="Images/back-to-top.png" alt="Top" height="18px" width="18px">
            </div></a>
        </footer>
        <script>
             console.log("Clearing");

let cartItems = localStorage.getItem("productsInCart");
cartItems = JSON.parse(cartItems);

localStorage.setItem("cartNumbers", 0);
localStorage.setItem("totalCost", 0);
cartItems={};
localStorage.setItem("productsInCart", JSON.stringify(cartItems));

        </script>
        <script src="cartjs.js"></script>
</body>
</html>