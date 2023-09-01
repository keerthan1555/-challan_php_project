<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "traffic_challan_db";

$con = mysqli_connect($host, $user, $password, $db);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$challan_query = "SELECT * FROM challan";
$challan_result = mysqli_query($con, $challan_query);

$sql = "SELECT violation_type, COUNT(*) AS count FROM challan GROUP BY violation_type ORDER BY count DESC LIMIT 1";
$result = mysqli_query($con, $sql);

$most_common_violation = "";

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $most_common_violation = $row["violation_type"];
}

// Query to check if there are any violations
$sql_check = "SELECT COUNT(*) AS total_violations FROM challan";
$result_check = mysqli_query($con, $sql_check);
$row_check = mysqli_fetch_assoc($result_check);
$total_violations = $row_check["total_violations"];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Home | Traffic Challan</title>
    <style>

         @import url('https://fonts.googleapis.com/css2?family=Inter:wght@600&display=swap');

        body {
            color: #2C3E50;
            margin: 0;
            background-color: #BDC3C7;
            font-family: Arial, Helvetica, sans-serif;
            font-family: 'Inter', sans-serif;
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

        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ddd;
        }

        th, td {
            text-align: left;
            padding: 8px;
            border: 1px solid #BDC3C7;
        }

        tr {
            background-color: #f2f2f2;
        }
        /* Your existing styles */

/* Your existing styles */
/* Your existing styles */

.violation-box {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    padding: 20px;
    border: 2px solid #ccc; /* Added border */
    border-radius: 5px;
    margin: 0 auto; /* Center the box horizontally */
}

.most-common-heading {
    font-size: 24px;
    margin-bottom: 10px; /* Added margin to separate from violation-type */
}

.most-common-violation {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.violation-type {
    font-size: 18px;
    background-color: #f2f2f2;
    padding: 10px;
    border: 2px solid #ccc;
    border-radius: 5px;
    margin: 10px 0; /* Added margin to separate from other content */

    /* Animation for moving left to right */
    animation: moveLeftToRight 4s linear infinite;
}

/* Keyframes for animation */
@keyframes moveLeftToRight {
    0% {
        transform: translateX(-100%);
    }
    100% {
        transform: translateX(100%);
    }
}


    </style>
</head>
<body>

<div class="topnav">
    <a href="#" style="pointer-events: none">Ride Safe Ride Responsibly</a>
    <div class="topnav-right">
        <a href="login.php" class="button">Officer Login</a>
    </div>
</div>
<div class="violation-box">
    <?php if ($total_violations > 0): ?>
        <h3 class="most-common-heading">Most Common Violation:</h3>
        <div class="most-common-violation">
            <p class="violation-type"><?php echo $most_common_violation; ?></p>
        </div>
    <?php else: ?>
        <div class="safe-day">
            <h3>Wow, it's a safe day! No violations reported.</h3>
        </div>
    <?php endif; ?>
    </div>

<div class="container">
    <center><h1>Challan Database</h1>
    <p>Official traffic challan viewing portal</p></center>
    <div class="challan-list">
        <table>
            <tr>
                <th>ID</th>
                <th>Vehicle Number</th>
                <th>Violation Type</th>
                <th>Date Issued</th>
                <th>Amount (Rs)</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($challan_result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['vehicle_number'] . "</td>";
                echo "<td>" . $row['violation_type'] . "</td>";
                echo "<td>" . $row['date_issued'] . "</td>";
                echo "<td>" . number_format($row['amount'], 2) . " Rs</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</div>

</body>
</html>
