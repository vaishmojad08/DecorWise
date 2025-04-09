<?php
session_start();
if( isset( $_SESSION['loggedin'] ) ) {
    $emailorder = $_SESSION['email'];
}
else{
    $_SESSION['loggedin']=1;
    $_SESSION['email']=$_POST["emailorder"];
    $emailorder = $_POST['emailorder'];
}

?>
<html>
    <head>
        <link rel="stylesheet" href="main.css">
        <title>DecorWise - Orders</title>
        
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
        <?php
        
        $con = mysqli_connect("localhost","vaishu123","vaish123");
    mysqli_select_db($con,"jproject");
        $sql = "select email from admins where email = '$emailorder';";
        $result = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($result)){
            if($row["email"]){
                echo "<form action='analytics.php'>";
    echo "<br><input type='submit' class='button_1' value='Analytics For Admin'></input>";
    echo "</form>";
            }
            
        break;
            }
            echo "<form action='signout.php'>";
            echo "<input type='submit' class='button_1' value='Sign Out'></input>";
            echo "</form>";


    $sql = "select * from buyhistory where email = '$emailorder' order by issuedate;";
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)){
        echo "<h2>Welcome ".$row["name"]."</h1>";
    break;
        }

        echo "<h1>Your orders:</h1>";
$con = mysqli_connect("localhost","vaishu123","vaish123");
    mysqli_select_db($con,"jproject");
    $sql = "select * from buyhistory where email = '$emailorder' order by issuedate;";
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)){
        echo "<TABLE>";
        $abc = explode("0",$row["items"]);
        $abc2 = explode("0",$row["itemstag"]);
        for($i=0;$i<count($abc)-1;$i++){
        
            echo "<tr><td><img src='Furniture/".$abc2[$i].".jpg' height=80 width=120></td><td><span class='account-show'>".$abc[$i]."<span><BR>";
            echo "Order date: ".$row["issuedate"];
            echo "</td>";
        }
        echo "<td class='special-row' rowspan=".count($abc).">Rs. ".$row["cost"]."</td></tr>";
        echo "---------------------------------------------------<br>";
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