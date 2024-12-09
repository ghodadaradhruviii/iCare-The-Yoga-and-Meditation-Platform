


 <?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST["uname"] ?? '';
    $email = $_POST["email"] ?? '';
    $sub = $_POST["sub"] ?? ''; 
    $msg = $_POST["msg"] ?? ''; 

    // Database connection details
    $servername = "localhost"; 
    $username = "root";
    $password = ""; 
    $dbname = "users";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if email already exists
    $check_email_query = "SELECT * FROM contact WHERE email=?";
    $stmt_check_email = $conn->prepare($check_email_query);
    if ($stmt_check_email === false) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt_check_email->bind_param("s", $email);
    $stmt_check_email->execute();
    $result = $stmt_check_email->get_result();
    if ($result->num_rows > 0) {
        echo "Email already exists. Please use a different email.";
        header("Location: contact.php");
        exit;
    }

    // Insert data into the database
    $sql = "INSERT INTO contact (uname, email, sub, msg) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("ssss", $uname, $email, $sub, $msg); 

    if ($stmt->execute()) {
        header("Location: ../Home/index.html"); 
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="scss/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <header>
        <nav>
            <div class="nav-container">
                <div class="nav-logo">
                    <img src="yogalogo.png" alt="Web Logo">
                </div>
                <div class="alltabs" id="navmenu">
                    <ul>
                        <a href="../Home/index.html">
                            <li>HOME</li>
                        </a>
                        <a href="../TypesofYoga/typeof.html">
                            <li>CLASSES</li>
                        </a>
                        <a href="../Blogs/blog.html">
                            <li>BLOG</li>
                        </a>
                        <a href="contact.php">
                            <li  class="activelink">CONTACT US</li>
                        </a>
                    </ul>
                    <div class="loginwithtrial">
                        <div class="loginandtrialbtn" id="logintrialBtn">
                            <a href="../Login/login1.php">
                                <li>LOG IN</li>
                            </a>
                            <a href="../Register/register.php">
                                <li>REGISTER</li>
                            </a>
                        </div>
                        <i class="fa-regular fa-user" id="profileBtn"></i>
                    </div>
                </div>
                <div class="nav-hamburger">
                    <li id="burger"><i class="fa-solid fa-bars"></i></li>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="firstContainer">
                <div class="contactinfo">
                    <div class="logowithname">
                        <div class="logo">
                            <img src="logo.png" alt="">
                        </div>
                        <!-- <div class="name"><img src="icarename.png" alt=""></div> -->
                    </div>
                    <h1>Contact Information</h1>
                    <div class="address">
                        <p><b>Address:</b> Siver Stone Arcade, Causway Road, Surat, Gujarat, India</p>
                        <p><b>Phone:</b> +91 1234567890</p>
                        <p><b>Email:</b> info@yoursite.com</p>
                        <p><b>Website:</b> iCare.com</p>
                    </div>
                </div>
            </div>
            <div class="secondContainer">
                <h1>CONTACT US</h1>
                <div class="yourinfo">
                    <div class="info">
                        <input type="text" placeholder="Your Name" class="name" name="yourname">
                        <input type="email" placeholder="Your Email" class="email" name="youremail">
                    </div>
                    <input type="text" placeholder="Subject" class="subject" name="subject">
                    <textarea name="Message" id="" cols="30" rows="10" placeholder="Type Message Here"></textarea>
                </div>
                <li><a href="">Send Message</a></li>
            </div>
        </div>
    </main>
    <footer>
        <div class="footerContainer">
            <div class="footerContentContainer">
                <div class="footerContent">
                    <div class="iconSec"><img src="logo.png" alt="iCare"><span class="logoName">iCare</span></div>
                    <div class="aboutSec">
                        <h2>ABOUT</h2>
                        <p class="about">
                            Embark on a journey of self-discovery and renewal with iCare, your ultimate destination for
                            personalized yoga and
                            meditation experiences. Our innovative platform effectively integrates the expertise of
                            experienced professionals to
                            lead live events, and guide you through transformative actions from the comfort of your own
                            space. Practice
                            different yoga styles and meditation techniques to suit your unique needs and preferences.
                            Whether you want to
                            achieve inner peace, reduce stress, or make radical changes, iCare offers a holistic
                            approach to your well-being. Join
                            our community today and unlock the power of mindfulness to nourish your mind, body and
                            spirit.
                        </p>
                        <div class="footerLinks">
                            <ul>
                                <li><i class="fa-brands fa-instagram"></i> Instagram</li>
                                <li><i class="fa-brands fa-twitter"></i> Twitter</li>
                                <li><i class="fa-brands fa-facebook"></i> Facebook</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

    </footer>

    <div class="copyrights">
        <p class="copyright">copyright <i class="fa-regular fa-copyright"></i> icare.com</p>
    </div>
    <script type="text/javascript" src="contact.js"></script>
</body>

</html>