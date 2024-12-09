<?php
function validatePassword($password) {
    $min_length = 8;
    $max_length = 20;
    $has_lowercase = preg_match("/[a-z]/", $password);
    $has_uppercase = preg_match("/[A-Z]/", $password);
    $has_number = preg_match("/[0-9]/", $password);
    $has_special_char = preg_match("/[!@#$%^&*()-_=+{};:,<.>]/", $password);

    if (strlen($password) < $min_length || strlen($password) > $max_length ||
        !$has_lowercase || !$has_uppercase || !$has_number || !$has_special_char) {
        return false;
    }
    
    return true;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $pass = $_POST["password"]; 

    if (!validatePassword($pass)) {
        echo "<script>alert('Password must be between 8 and 20 characters long and include at least one lowercase letter, one uppercase letter, one number, and one special character.')</script>";
        header("Location: /Register/register.php");
        exit;
    }

    $servername = "localhost"; 
    $username = "root";
    $password = ""; 
    $dbname = "users";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $check_email_query = "SELECT * FROM userdetails WHERE email=?";
    $stmt_check_email = $conn->prepare($check_email_query);
    $stmt_check_email->bind_param("s", $email);
    $stmt_check_email->execute();
    $result = $stmt_check_email->get_result();
    if ($result->num_rows > 0) {
        echo "Email already exists. Please use a different email.";
        header("Location: register.php");
        exit;
    }

    $sql = "INSERT INTO userdetails (fullname, email, pass) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $fullname, $email, $pass); 

    if ($stmt->execute()) {
        header("Location: ../Home/index.html"); 
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register With iCare</title>
    <link rel="stylesheet" href="scss/register.css">
</head>

<body>
    <header>
    </header>
    <main>
        <form method="post" action="register.php">
            <div class="container">
                <div class="firstContainer">
                    <div class="detailContainer">
                        <div class="logowithname">
                            <div class="logo">
                                <img src="yogalogo.png" alt="">
                            </div>
                            <div class="name"><img src="icarename.png" alt=""></div>
                        </div>
                        <div class="createAccount">
                            <h1>Create Account</h1>
                            <div class="inputFields">
                                <input type="text" name="fullname" id="fullname" placeholder="Full Name" required>
                                <input type="email" name="email" id="emailid" placeholder="Email Address" required>
                                <input type="password" name="password" id="password" placeholder="Password" required>
                                <div class="agreeCondition">
                                    <input type="checkbox" name="condition" id="agree">
                                    <label for="agree">I agree with <a href="#">Terms</a> and <a href="#">Privacy</a></label>
                                </div>
                            </div>
                        </div>
                        <div class="signupandin">
                            <button type="submit" id="submitBtn">SIGN UP</button>
                            <button type="button">SIGN UP WITH GOOGLE</button>
                        </div>
                        <div class="haveAccount">
                            <p>Already have an account? <a href="../Login/login1.php">Log In</a></p>
                        </div>
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
        </form>
        
    </main>

    <script type="text/javascript" src="register.js"></script>

</body>

</html>