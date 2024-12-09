<?php
// Start a session
session_start();

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $email = $_POST["email"];
    $pass = $_POST["password"];

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

    // Sanitize the email input to prevent SQL injection
    $email = $conn->real_escape_string($email);

    // Determine which table to query based on email
    if ($email == "admin12@gmail.com") {
        $sql = "SELECT * FROM admin WHERE email='$email'";
    } else {
        $sql = "SELECT * FROM userdetails WHERE email='$email'";
    }

    $result = $conn->query($sql);

    // Check if any record is returned
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Direct password comparison
        if ($pass === $row['pass']) {
            // Set session variable
            $_SESSION['email'] = $email;

            if ($email == "admin12@gmail.com") {
                header('Location: ../admin/index.php');
            } else {
                header('Location: ../Home/index.html');
            }
            exit();
        } else {
            echo "<script>alert('Incorrect password');</script>";
        }
    } else {
        echo "<script>alert('Email not found');</script>";
    }

    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login With iCare</title>
    <link rel="stylesheet" href="scss/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>
    <header>
    </header>
    <main>
        <!-- <form method="post" action="login.php" id="login-form"> -->
        <div class="container">
            <div class="firstContainer">
                <div class="detailContainer">
                    <form action="" method="post">
                        <div class="logowithname">
                            <div class="logo">
                                <img src="yogalogo.png" alt="">
                            </div>
                            <div class="name"><img src="icarename.png" alt=""></div>
                        </div>
                        <div class="loginAccount">
                            <h1>Login</h1>
                            <div class="inputFields">
                                <input type="email" name="email" id="emailid" placeholder="Email Address">
                                <input type="password" name="password" id="password" placeholder="Password"><span
                                    id="eye"><i class="fa-regular fa-eye"></i></span>
                                <div class="agreeCondition">
                                    <input type="checkbox" name="condition" id="agree" checked>
                                    <label for="agree">I agree with <a href="#">Terms</a> and <a
                                            href="#">Privacy</a></label>
                                </div>
                            </div>
                        </div>
                        <div class="signin">
                            <!-- <button   ><a href="../admin/index.php  ">SIGN IN</a></button> -->
                            <input type="submit" name="submit" value="submit">
                            <button type="button">SIGN IN WITH GOOGLE</button>
                        </div>
                        <div class="donothaveAccount">
                            <p>Don't have an account? <a href="../Register/register.php">Register</a></p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="secondContainer">
                <div class="aboutandcontact">
                    <p><a href="../Contact/contact.php">Contact</a></p>
                </div>
                <div class="imageContainer">
                    <img src="register.png" alt="">
                </div>
            </div>
        </div>
        <!-- </form> -->

    </main>
    <footer>

    </footer>
    <!-- <script type="text/javascript" src="login.js"></script>a -->
</body>

</html>