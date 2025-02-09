<?php
include("includes/db_connect.php");

$error_message = "";
$success_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $user_type = $_POST['user_type'];
    $email = $_POST['email'];

    
    if (empty($username) || empty($password) || empty($confirm_password) || empty($user_type) || empty($email)) {
        $error_message = "All fields are required.";
    } elseif ($password != $confirm_password) {
        $error_message = "Passwords do not match.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format.";
    } else {
        $check_username_sql = "SELECT * FROM users WHERE username = '$username'";
        $check_username_result = $conn->query($check_username_sql);
        if ($check_username_result->num_rows > 0) {
            $error_message = "Username already exists. Please choose a different one.";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (username, password, user_type, email) VALUES ('$username', '$hashed_password', '$user_type', '$email')";

            if ($conn->query($sql) === TRUE) {
                $success_message = "Registration successful. You can now <a href='login.php'>login</a>.";
            } else {
                $error_message = "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family:  "Courier New", Courier, monospace;
}
 body{
    background-image: url("images/catering.webp");
    background-size: cover;
    background-position:center ;
}
 .sticky-top {
  position: sticky; 
  top: 0;    
  width: 100%;   
  background-color: #f0f0f0; 
  padding: 10px;   
  z-index: 100;
  box-sizing: border-box;
}
.sticky-bottom {
  position: sticky;
  bottom: 0;
  width: 100%;
  background-color: #f0f0f0;
  padding: 10px;
  box-sizing: border-box;
}
.form-content{
    padding-bottom: 5px;
    margin: 30px auto;
    padding-top: 10px;
    width: 80%;
    border-bottom: 1px solid purple;
    color: purple;

}
::placeholder{
    color: purple;
    font-size: 16px;
}

.form-content input{
    width: 70%;
    outline: none;
    border: none;
    background: transparent;
    color: purple;
    font-size: 16px;
}
.logbtn{
    background: transparent;
    margin :30px auto 15px;
    width: 40%;
    opacity:0.9;
    display: block;
    text-align:center;
    border-radius: 10px;
    border: 1px solid purple;
    color: white;
    background-color:purple;
    cursor: pointer;
    font-size: 18px;
}
.btn{
    color:white;
    background-color:purple;
    font-size:25px;
    border-radius:4px;
    float: right;
    border: 3px solid black;
}
.container{
    width: 60%;
    background: white;
    text-align:left;
    opacity:0.9;
    box-shadow: purple;
    padding: 50px 0;
    margin: auto;
    border-radius: 50px;

}
a{
    text-decoration: none;
} 
#sel{
    background:transparent;
    color:purple;
    width:70%;
    outline: none;
    border: none;

}

</style>
<body>
    <div class ="sticky-top" style="color: purple;background-color: white;font-size: 50px;opacity: 0.9;">
    Blissful Events
    <a href="index.php" class="btn">Home</a>
    </div>
    <br>
    <div class="container">
    <h2 style="color:purple;text-align:center;">Register Here!</h2>

    <?php if (!empty($error_message)) { ?>
        <div style="color: red;"><?php echo $error_message; ?></div>
    <?php } ?>

    <?php if (!empty($success_message)) { ?>
        <div style="color: green;"><?php echo $success_message; ?></div>
    <?php } ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div  class="form-content">
       <input type="text" placeholder="Username" name="username" required><br>
    </div>
       <div  class="form-content">
       <input type="email" placeholder="Email" name="email" required><br>
    </div>
    <div  class="form-content">
       <input type="password" placeholder="Password"name="password" required><br>
    </div>
    <div  class="form-content">
       <input type="password" placeholder="Confirm Password" name="confirm_password" required><br>
    </div>
    <div  class="form-content" style="color:purple;"> 
        <select id="sel" name="user_type" required>
            <option value="" disabled selected>Select User Type</option>
            <option value="client">Client</option>
            <option value="admin" >Admin</option>
        </select><br>
    </div>
        <input type="submit"  class ="logbtn"value="Register">
    </form>
    <p style="color:purple;text-align:center;">Already have an account? <a href="login.php" class="logbtn">Login</a></p>
    </div>
    <div class="sticky-bottom">
    &copy; 2025 Blissful Events
    <div style="float:right">Contacts: +255 615 931 114</div>
</div>
</body>
</html>