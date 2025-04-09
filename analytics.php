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
        <title>DecorWise - Analytics</title>
        
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
        <br><br>
        <form action="allorders.php">
            <input type="submit" value="View All Orders" class="button_1">
        </form>
        <?php
echo "<form action='signout.php'>";
echo "<input type='submit' class='button_1' value='Sign Out'></input>";
echo "</form>";
        ?>
        <h1>Analytics:</h1>
<?php
$con = mysqli_connect("localhost","vaishu123","vaish123");
mysqli_select_db($con,"jproject");
$sql = "select * from buyhistory order by issuedate;";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
    echo "<h2>Welcome ".$row["name"]."</h1><br>";
break;
    }


    $sql = "select count(*) from buyhistory;";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
    echo "<h2>Total number of orders placed:  ".$row[0]."</h1>";
break;
    }

    $months = array();
    $sql = "select count(*) from buyhistory where issuedate like '%-01-%';";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
   $months[0]=$row[0];
break;
    }
    $sql = "select count(*) from buyhistory where issuedate like '%-02-%';";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
   $months[1]=$row[0];
break;
    }
    $sql = "select count(*) from buyhistory where issuedate like '%-03-%';";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
   $months[2]=$row[0];
break;
    }
    $sql = "select count(*) from buyhistory where issuedate like '%-04-%';";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
   $months[3]=$row[0];
break;
    }
    $sql = "select count(*) from buyhistory where issuedate like '%-05-%';";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
   $months[4]=$row[0];
break;
    }
    $sql = "select count(*) from buyhistory where issuedate like '%-06-%';";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
   $months[5]=$row[0];
break;
    }
    $sql = "select count(*) from buyhistory where issuedate like '%-07-%';";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
   $months[6]=$row[0];
break;
    }
    $sql = "select count(*) from buyhistory where issuedate like '%-08-%';";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
   $months[7]=$row[0];
break;
    }
    $sql = "select count(*) from buyhistory where issuedate like '%-09-%';";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
   $months[8]=$row[0];
break;
    }
    $sql = "select count(*) from buyhistory where issuedate like '%-10-%';";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
   $months[9]=$row[0];
break;
    }
    $sql = "select count(*) from buyhistory where issuedate like '%-11-%';";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
   $months[10]=$row[0];
break;
    }
    $sql = "select count(*) from buyhistory where issuedate like '%-12-%';";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
   $months[11]=$row[0];
break;
    }

    $low=0;
    $mid=0;
    $high=0;
    $sql = "select count(*) from buyhistory where cost<50000;";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
   $low=$row[0];
break;
    }
    $sql = "select count(*) from buyhistory where cost>=50000 and cost<100000;";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
   $mid=$row[0];
break;
    }
    $sql = "select count(*) from buyhistory where cost>=100000;";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
   $high=$row[0];
break;
    }

?>
<h1>Orders placed during various months:</h1>
        <div id="graph-cont" style="width: 80%; height: 100%;"></div>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            packages: ['corechart']
        });
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Months', 'Orders Placed'],
                ['January', <?php echo $months[0] ?>],
                ['February', <?php echo $months[1] ?>],
                ['March', <?php echo $months[2] ?>],
                ['April', <?php echo $months[3] ?>],
                ['May', <?php echo $months[4] ?>],
                ['June', <?php echo $months[5] ?>],
                ['July', <?php echo $months[6] ?>],
                ['August', <?php echo $months[7] ?>],
                ['September', <?php echo $months[8] ?>],
                 ['October', <?php echo $months[9] ?>],
                 ['November', <?php echo $months[10] ?>],
                 ['December', <?php echo $months[11] ?>],

            ]);
            var options = {
                title: 'Orders placed each month',
                isStacked: true
            };

            var chart = new google.visualization.BarChart(document.getElementById('graph-cont'));
            chart.draw(data, options);
        }
        google.charts.setOnLoadCallback(drawChart);
    </script>
    <br><br>
    <h1>Orders placed in price ranges:</h1>
    <div id="graph-cont-price" style="width: 80%; height: 100%;"></div>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            packages: ['corechart']
        });
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Prices', 'Orders Placed'],
                ['Less than Rs.50,000', <?php echo $low ?>],
                ['Rs.50,000 to 1,00,000', <?php echo $mid ?>],
                ['Rs.1,00,000 Above', <?php echo $high ?>],

            ]);
            var options = {
                title: 'Orders in Price ranges',
                isStacked: true
            };

            var chart = new google.visualization.BarChart(document.getElementById('graph-cont-price'));
            chart.draw(data, options);
        }
        google.charts.setOnLoadCallback(drawChart);
    </script>
    <br><br>
    <form action="queries.php">
    <input type="submit" value="View all" class="button_1"></form>
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