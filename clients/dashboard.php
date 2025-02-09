<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'client') {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username']; 

?>

<!DOCTYPE html>
<html>
<head>
<title>Client Dashboard</title>
</head>
<style> 
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family:  "Courier New", Courier, monospace;
}
body{
    background-image: url("../images/catering.webp");
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
    border: 3px solid black;
    float: right;

}
.container{
    width: 60%;
    background: white;
    text-align:center;
    opacity:0.8;
    box-shadow: purple;
    padding: 50px 0;
    margin: auto;
    border-radius: 50px;

}
a{
    text-decoration: none;
} 
p,h1,h2{
    color:purple;
}
.div1 {
  background-image: url("../images/catering2.webp");
  background-size: cover;
  padding: 20px;
  border-radius:20px;
  margin-top:10px;  
  margin-left:auto;
  margin-right:auto;
  height:40vh;
  width: 80%; 
  box-sizing: border-box;
  color:white;

}
.div2 {
  background-image: url("../images/dj2.jpg");
  background-size: cover;
  padding: 20px;
  color:white;
  margin-top:10px;
  margin-left:auto;
  margin-right:auto;
  border-radius:20px;
  height:40vh;
  width: 80%; 
  box-sizing: border-box;
}

</style>
<body>
    <div class ="sticky-top" style="color: purple;background-color: white;font-size: 50px;opacity: 0.9;">
    Blissful Events
    <a href="../logout.php" class="btn">Logout</a>

    </div>
    <br>
    <div class="container">
    <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
    <p>Welcome to your personalized dashboard. Here, you can easily book all aspects of your event planning process.</p>
    <div class="div1">
    <p style="color:white;">Blissful Events, we offer a range of services to ensure your
         celebration is seamless and memorable. Our expert catering 
         team provides delicious and beautifully presented cuisine, 
         tailored to suit your preferences and event theme. From exquisite 
         gourmet meals to casual buffets, we use high-quality ingredients
          to delight your guests. Our professional event planning services
           take care of every detail, including venue selection, budgeting, 
           vendor coordination, and timeline management, 
        ensuring a stress-free experience from start to finish.
    </p>
    <br>
    </div>
    <div class="div2">
    we provide top-notch entertainment with our experienced MCs and DJs
     who bring energy and excitement to your event. Whether you need an 
     engaging host to keep the event flowing smoothly or a DJ to create 
     the perfect ambiance with music, we have you covered. Our team is 
     dedicated to delivering exceptional service, making every 
     celebration—whether it's a wedding, birthday,
     or anniversary—unforgettable and enjoyable for you and your guests.
    </div>
    <br>




    <p>Ready to get started? You can book your event services here</p>
    <a href="bookings.php" class="logbtn">Book Now</a>

    <br><br>
</div>
<br>
<div class="sticky-bottom">
    &copy; 2025 Blissful Events
    <div style="float:right">Contacts: +255 615 931 114</div>
</div>
</body>
</html>