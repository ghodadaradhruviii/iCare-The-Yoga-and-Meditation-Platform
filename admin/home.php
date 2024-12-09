<?php
 // Connect to MySQL database
 $servername = "localhost";
 $username = "root";
 $dbpassword = "";
 $dbname = "users";

 // Create connection
 $conn = new mysqli($servername, $username, $dbpassword, $dbname);

 // Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }

 $sql = mysqli_query($conn,"select count(*) as count from userdetails");
 $row=mysqli_fetch_assoc($sql);
 $count=$row["count"];

 

// $sql = mysqli_query($conn,"select count(*) as count from contact");
// $row=mysqli_fetch_assoc($sql);
// $count=$row["count"];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="./userstyle.css"> -->
    <link rel="stylesheet" href="./sidestyle.css ">
    <link rel="stylesheet" href="./userstyle.css">
    <link rel="stylesheet" href="./addmovie.css">
    <link rel="stylesheet" href="./historystyle.css">

     <style>
        div.mein{
            height: 300px;
            width: 300px;
            border: 2px solid black;
            margin-left:150px;
        }

        .card {
            /* border: 2px solid black; */
            width: 300px;
            height: 300px;
            margin: 15px 35px;
            padding: 10px;
            display: inline-block;
            /* overflow: scroll; */
            text-align: center;
            border-radius: 20px;
            box-shadow: 3px 15px 10px 0px #335E61;
            transition: .3s;
            position: relative;
        }
        #count{
            position: absolute;
           top:146px;
           left:45%;
           color:#335E61;
           

        }

        .phase{
            position: absolute;
           top:102px;
           left:17%;
           color: #335E61;
           
        }
     </style>
</head>
<body>
   
<div class="card">
           
    
    <h1 id="count"><?php echo $count ?></h1>
            <h2 class="phase">Research Users</h2>
            
        </div>

        <div class="card">
           
    
    <h1 id="count"><?php echo $count ?></h1>
            <h2 class="phase">Contact Users</h2>
            
        </div>
    </div>
</body>
</html>