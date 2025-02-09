<?php
session_start();
include("includes/db_connect.php");

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password, user_type FROM users WHERE username = ?");
    $stmt->bind_param("s", $username); 
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($user_id, $hashed_password, $user_type);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_type'] = $user_type;
            $_SESSION['username'] = $username; 

            if ($user_type == 'client') {
                header("Location: clients/dashboard.php");
            } elseif ($user_type == 'admin') {
                header("Location: admin/dashboard.php");
            }
            exit();
        } else {
            $error_message = "Invalid username or password.";
        }
    } else {
        $error_message = "Invalid username or password.";
    }
    $stmt->close(); 
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family:  "Courier New", Courier, monospace;
}
 body{
    background-image: url("images/catering2.webp");
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
    color: white;

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
.btn{
    color:white;
    background-color:purple;
    font-size:25px;
    border-radius:4px;
    float: right;
    border: 3px solid black;
}

a{
    text-decoration: none;
} 

</style>
<body>
    <div class ="sticky-top" style="color: purple;background-color: white;font-size: 50px;opacity: 0.9;">
    Blissful Events
    <a href="index.php" class="btn">Home</a>
    </div>
    <br/>
    <div class="container">
    <div class="container">
    <h2 style="color:purple;text-align:center;">Login Here!</h2>
    <?php if (!empty($error_message)) { ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php } ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div  class="form-content">
            <input type="text" placeholder="Username" name="username" required><br>
        </div>
        <div  class="form-content">
            <input type="password"  placeholder="Password" name="password" required><br>
        </div>
        <input type="submit" class="logbtn" value="Login">
    </form>
        <p style="color:purple;text-align:center;">Don't have an account? <a href="register.php" class="logbtn">Register</a></p>
    </div>
    </div>
    <br><br><br>
    <div class="sticky-bottom">
    &copy; 2025 Blissful Events
    <div style="float:right">Contacts: +255 615 931 114</div>
</div>
</body>
</html>