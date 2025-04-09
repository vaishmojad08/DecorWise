
<html>
    <head>
        <link rel="stylesheet" href="main.css">
        <title>DecorWise - Queries</title>
        
    </head>

    <body id="ordersShow" style="margin-bottom:200px">
        
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
        <br>
        <h1>List of all Queries recieved:</h1>
        <?php
$con = mysqli_connect("localhost","Harsh1254","harsh");
mysqli_select_db($con,"jproject");
$sql = "select * from contactus;";
$result = mysqli_query($con,$sql);
$i=1;
while($row = mysqli_fetch_array($result)){
    if($row['message']!='')
    {echo "<p>$i. ".$row['message']."</p>";
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;By ".$row['name']."<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='mailto:".$row['email']."'><button class='button_1'> Reply</button> </a><br><br>";
    $i+=1;}
    }
        ?>

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