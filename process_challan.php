<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "traffic_challan_db";

$con = mysqli_connect($host, $user, $password, $db);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit_challan'])) {
    $vehicle_number = $_POST['vehicle_number'];
    $violation_type = $_POST['violation_type'];
    $date_issued = $_POST['date_issued'];
    $amount = $_POST['amount'];

    $insert_query = "INSERT INTO challan (vehicle_number, violation_type, date_issued, amount) VALUES ('$vehicle_number', '$violation_type', '$date_issued', $amount)";

    if (mysqli_query($con, $insert_query)) {
        echo '
        <!DOCTYPE html>
<html>
<head>
    <title>Challan added | Traffic challan</title>
    <style>
    @import url("https://fonts.googleapis.com/css2?family=Inter:wght@600&display=swap");

    body {
        color: #2C3E50;
        margin: 0;
        background-color: #BDC3C7;
        font-family: Arial, Helvetica, sans-serif;
        font-family: "Inter", sans-serif;
    }

    .topnav {
        overflow: hidden;
        background-color: #2C3E50;
    }

    .topnav a {
        float: left;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    .topnav-right {
        float: right;
    }
    

    .topnav-right a {
        border-radius: 25px;
        background-color: #34495E;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 5px;
        cursor: pointer;
    }
    .topnav-right a:hover{
        background-color: white;
        color:#34495E
    }
        .box {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        

        .greeting {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .btn {
            background-color: #1c1c25;
            color: white;
            border: none;
            text-decoration:none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #333;
        }
    </style>
</head>
<body>

<div class="topnav">
    <a href="#" style="pointer-events: none">Ride Safe Ride Responsibly</a>
    <div class="topnav-right">
        <a href="index.php" class="button">Log Out</a>
    </div>
    <div class="topnav-right">
        <a href="challan.php" class="button">Add another Challan</a>
    </div>
    
</div>

<div class="box">
        <div class="greeting">
            Challan added Successfully !!! 
        </div>
        <br>
    </div>
</div>

</body>
</html>

        ';
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
