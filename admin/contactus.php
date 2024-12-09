<?php
session_start();
$servername = "localhost"; // Change this if your MySQL server is running on a different host
$username = "root"; // Default username for MySQL in XAMPP is "root"
$dbpassword = ""; // Default password for MySQL in XAMPP is empty
$dbname = "users"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['signupbtn'])) {
    $id = $_POST["id"];
    $uname = $_POST["uname"];
    $email = $_POST["email"];
    $sub = $_POST["sub"];
    $msg = $_POST["msg"];

    $sql = "INSERT INTO contact (uname, email, sub,msg) VALUES ('$uname','$email','$sub','$msg')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('insert record successfully') </script>";
    } else {
        echo "<script>alert('insert error') </script>";

    }
}


if (isset($_POST['delete'])) {
    // Get the ID from the form and sanitize it
    $id = intval($_POST['id']); // Convert to integer to ensure it's a number

    // Create the DELETE query
    $query = "DELETE FROM contact WHERE id = $id";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

if (isset($_POST['update'])) {
    // Get the ID and updated data from the form
    $id = intval($_POST['id']);
    $uname = $_POST["uname"];

    $email = $_POST["email"];
    $sub = $_POST["sub"];
    $msg = $_POST["msg"];


    // Ensure the passwords match before updating

    // Update query
    $query = "UPDATE contact SET uname = '$uname', email = '$email', sub = '$sub', msg = '$msg'  WHERE id = $id ";

    // Execute the query
    if (!mysqli_query($conn, $query)) {
        echo "Error updating record: " . mysqli_error($conn);
    }

}
// Fetch and display all users
if (isset($_POST['search'])) {
    $search = $_POST['searchval'];
    $sqlshow = mysqli_query($conn, "SELECT * FROM contact  where uname like '%$search%'  ORDER BY id ASC");

} else {

    $sqlshow = mysqli_query($conn, "SELECT * FROM contact ORDER BY id ASC");
}
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

    <style></style>
</head>

<body>
    <div class="container">
        <h1 id="head">User Dashboard</h1>
        <div class="userdata">
            <span id="heading">Contact User</span>
            <span id="addbtn">
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add User</button>
            </span>
            <span id="searching">
                <form action="" method="post"> <input type="text" name="searchval" id="searchval"
                        placeholder="Search username"> <button type="submit" class="btn btn-success" name="search"
                        value="Search">Search</button></form>

            </span>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">User Contact Details</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form name="form" action="" method="POST">
                                <div class="createAccount">
                                    <h1>Create Account</h1>
                                    <div class="inputFields">
                                        <input type="text" name="uname" id="uname" placeholder="user Name" required>
                                        <input type="email" name="email" id="email" placeholder="Email Address"
                                            required>
                                        <input type="text" name="sub" id="sub" placeholder="subject" required>
                                        <input type="text" name="msg" id="msg" placeholder="message" required>
                                        <div class="agreeCondition">
                                            <input type="checkbox" name="condition" id="agree">
                                            <label for="agree">I agree with <a href="#">Terms</a> and <a
                                                    href="#">Privacy</a></label>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" name="signupbtn" id="signupbtn" class="btns btn btn-danger"
                                    value="SignUp" />
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <hr>

            <div class="usertable">
                <table class="table table-hover ">
                    <thead class="table-success">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">uname</th>
                            <th scope="col">Email</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Message</th>

                            <th scope="col" colspan="2">Operations</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        # code...
                        while ($row = mysqli_fetch_array($sqlshow)) {

                            ?>
                            <tr>
                                <th scope="row"><?php echo $row['id']; ?></th>
                                <td><?php echo $row['uname']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['sub']; ?></td>
                                <td><?php echo $row['msg']; ?></td>


                                <td class="delete">
                                    <form method="post" action="" style="display: inline;">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                                        <!-- Use the button tag to wrap the icon -->
                                        <button type="submit" name="delete"
                                            style="border: none; background: none; cursor: pointer;">
                                            <i class="fa-solid fa-trash" style="color: red;"></i>
                                            <!-- You can customize the icon's style -->
                                        </button>

                                    </form>
                                </td>
                                <!-- <td class=" update">
                                    <form method="post" action="" style="display: inline;">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                                     
                                        <button type="button" style="border: none; background: none; cursor: pointer;"
                                            data-bs-toggle="modal" data-bs-target="#modal">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <div class="modal fade" id="modal" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="modalLabel<?php echo $row['id']; ?>" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5"
                                                            id="modalLabel<?php echo $row['id']; ?>">
                                                            Update Details for <?php echo $row['uname']; ?></h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                       
                                                        <form name="form" action="" method="POST">
                                                            <input type="hidden" name="id"
                                                                value="<?php echo $row['id']; ?>" />
                                                            <input type="text" name="uname" id="uname"
                                                                placeholder="Full Name" value="<?php echo $row['uname']; ?>"
                                                                required>
                                                            <input type="email" name="email" id="email"
                                                                value="<?php echo $row['email']; ?>"
                                                                placeholder="Email Address" required>
                                                            <input type="text" name="sub" id="sub" placeholder="subject"
                                                                value="<?php echo $row['sub']; ?>" required>
                                                            <input type="text" name="msg" id="msg" placeholder="message"
                                                                value="<?php echo $row['msg']; ?>" required>




                                                            <input type="submit" name="update" id="update"
                                                                class="btn btn-danger" value="Update" />
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </td> -->






                                <td class="update">
    <form method="post" action="" style="display: inline;">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
        <button type="button" style="border: none; background: none; cursor: pointer;"
            data-bs-toggle="modal" data-bs-target="#modal<?php echo $row['id']; ?>">
            <i class="fas fa-edit"></i>
        </button>
    </form>
    <div class="modal fade" id="modal<?php echo $row['id']; ?>" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalLabel<?php echo $row['id']; ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalLabel<?php echo $row['id']; ?>">
                        Update Details for <?php echo $row['uname']; ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form name="form" action="" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                        <input type="text" name="uname" id="uname"
                            placeholder="Full Name" value="<?php echo $row['uname']; ?>" required>
                        <input type="email" name="email" id="email"
                            value="<?php echo $row['email']; ?>" placeholder="Email Address" required>
                        <input type="text" name="sub" id="sub" placeholder="Subject"
                            value="<?php echo $row['sub']; ?>" required>
                        <input type="text" name="msg" id="msg" placeholder="Message"
                            value="<?php echo $row['msg']; ?>" required>
                        <input type="submit" name="update" id="update"
                            class="btn btn-danger" value="Update" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</td>



                            </tr>
                            <?php

                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>