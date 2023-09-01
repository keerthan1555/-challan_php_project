<!DOCTYPE html>
<html>
<head>
    <title>Officer Login | Traffic challan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 20px;
            font-family: Arial, Helvetica, sans-serif;
            font-family: 'Inter', sans-serif;
            color: #2C3E50;
            background-color: #BDC3C7;
            font-family: Arial, Helvetica, sans-serif;
            
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


        .container {
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50%;
            align-items: center;
        }

        .box {
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
                 @import url('https://fonts.googleapis.com/css2?family=Inter:wght@600&display=swap');

    </style>
</head>
<?php
    $host="localhost";
    $user="root";
    $password="";
    $db="traffic_challan_db";

    $con = mysqli_connect($host,$user,$password,$db);
    //mysql_select_db($db);

    if(isset($_POST['username'])){
        
        $uname=$_POST['username'];
        $password=$_POST['password'];
        
        $sql="select * from loginform where user='".$uname."'AND Pass='".$password."' limit 1";
        
        $result=mysqli_query($con,$sql);
        
        if(mysqli_num_rows($result)==1){
            header("Location: challan.php");
            exit();
        }
        else{
            echo " You Have Entered Incorrect Password";
            exit();
        }
            
    }
?>
<body>

<div class="topnav">
    <a href="#" style="pointer-events: none">Ride Safe Ride Responsibly</a>
    <div class="topnav-right">
        <a href="login.php" class="button">Back to Home</a>
    </div>
</div>

<div class="container">
        <center>
        <form method="post" action="">
        <div class="form" id="frm">
                <form name="frmContact" action="#" method="POST">
                <h2>Officer Login</h2>
                    <input type="text" name="username" required="required" placeholder="Enter the Username" autofocus required></input>  
                    <br><br>
                    <input type="password" name="password" required="required" placeholder="Enter the Password" required></input>
                    <br><br>
                    <input type="submit" class="button" title="Log In" name="login" value="Login"></input>
                </form>
                </center>
            </div>
        </form>
    </div>
</div>

</body>
</html>
