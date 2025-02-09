<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'admin') {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username']; 

?>
<!DOCTYPE html>
<html>
<head>
<title>Blissful Events</title>
<style>
 *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family:  "Courier New", Courier, monospace;
}
body {
  margin: 0;
  box-sizing:border-box;
  overflow: hidden; 
  transition: background-image 1s ease-in-out; 
  background-size: cover;
  background-position: center; 
  overflow-y: scroll;
  font-family: "Courier New", Courier, monospace;
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
table, th, td {
            border: 1px solid lightseagreen;
            border-collapse: collapse;
            text-align:center;
            color:purple;
        }
.logbtn{
    background: transparent;
    margin :30px auto 15px;
    width: 70%;
    display: block;
    text-align:center;
    border-radius: 10px;
    border: 1px solid purple;
    color: purple;
    background-color:white;
    cursor: pointer;
    font-size: 18px;
}
.container{
    width: 90%;
    background: white;
    text-align:center;
    opacity:0.9;
    box-shadow: rgba(0,0,0,0.7);
    padding: 50px 0;
    margin: auto;
    border-radius: 4px;

}
.container1 {
  display: flex; 
  text-align:center;
  justify-content: space-between;
  align-items: center;
}

.left-div {
  background-image: url("../images/catering1.webp");
  background-size: cover;
  padding: 70px;
  opacity:0.9;
  border-radius:20px;
  margin:auto;
  height: 40vh;
  width: 48%; 
  box-sizing: border-box;
}

.right-div {
background-image: url("../images/event3.avif");
background-size: cover; 
padding: 70px;
margin:auto;
  border-radius:20px;
  width: 48%; 
  height: 40vh;
  align-items: center; 
  box-sizing: border-box;
}

a{
    text-decoration: none;
}
.btn{
    color:white;
    background-color:purple;
    font-size:25px;
    border-radius:4px;
    border: 3px solid black;
    float: right;

} 

</style>
</head>
<body>
    <div class ="sticky-top" style="color: purple;background-color: white;font-size: 50px;opacity: 0.9;">
    Blissful Events
    <a href="../logout.php" class="btn">Logout</a>
    </div>
    <br/>
    <div class="container">
    <h2 style="color:purple;">Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
    <br>
    <p style="color:purple;">
        Dear Admin this admin page can 
        help in monitoring events relate t Bliss Events.
    </p>
    <br>
    <div class="container1" >
        <div class="left-div">
            <a href="view_bookings.php" class="logbtn"> View Users</a>
        </div>
        <div class="right-div">
            <a href="view_bookings.php" class="logbtn"> View Events</a>
        </div>
        </div>
    </div>
<br>
<br>
<br>
<br>
</div>
<div class="sticky-bottom">
    &copy; 2025 Blissful Events
    <div style="float:right">Contacts: +255 615 931 114</div>
</div>
</div>
</body>
</html>