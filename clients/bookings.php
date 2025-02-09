<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blissful_events";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'client') {
    header("Location: login.php"); 
}

$client_id = $_SESSION['user_id'];
$error_message = "";
$success_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_type = $_POST['event_type'];
    $event_term = $_POST['event_term'];
    $catering = isset($_POST['catering']) ? 1 : 0; 
    $event_planner = isset($_POST['event_planner']) ? 1 : 0;
    $dj_mc = isset($_POST['dj_mc']) ? 1 : 0;
    $event_date = $_POST['event_date'];

    $cost = 0;
    if ($event_term == "short_term") {
        $cost = 500000; 
    } elseif ($event_term == "moderate_term") {
        $cost = 1000000;
    } elseif ($event_term == "long_term") {
        $cost = 1500000;
    }

    if (empty($event_date)) {
        $error_message = "Please select an event date.";
    } else if (strtotime($event_date) < strtotime('now')) {
        $error_message = "Event date cannot be in the past.";
    }
    else{
        $sql = "INSERT INTO bookings (client_id, event_type, event_term, catering, event_planner, dj_mc, cost, event_date) 
        VALUES ('$client_id', '$event_type', '$event_term', '$catering', '$event_planner', '$dj_mc', '$cost', '$event_date')";

        if ($conn->query($sql) === TRUE) {
            $success_message = "Booking submitted successfully!";
        } else {
            $error_message = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Client Booking</title>
</head>
<style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family:  "Courier New", Courier, monospace;
}
body{
    background-image: url("../images/dj.jpg");
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
.container{
    width: 60%;
    background: white;
    text-align:left;
    opacity:0.8;
    box-shadow: purple;
    padding: 50px 0;
    margin: auto;
    border-radius: 50px;
}
.form-content{
    padding-bottom: 5px;
    margin: 30px auto;
    padding-top: 10px;
    width: 80%;
    border-bottom: 1px solid purple;
    color: purple;

}
#sel{
    background:transparent;
    color:purple;
    width:70%;
    outline: none;
    border: none;}
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
a{
    text-decoration: none;
}
</style>
<body>
    <div class ="sticky-top" style="color: purple;background-color: white;font-size: 50px;opacity: 0.9;">
    Blissful Events
    <a href="dashboard.php" class="btn">Back to Dashboard</a>
    </div>    
    <br>
    <div class="container">
    <h2 style="color:purple; text-align:center;">Client Booking</h2>

    <?php if (!empty($error_message)) { ?>
        <div style="color: red;"><?php echo $error_message; ?></div>
    <?php } ?>

    <?php if (!empty($success_message)) { ?>
        <div style="color: green;"><?php echo $success_message; ?></div>
    <?php } ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div  class="form-content">
     <input type="text" placeholder ="Event Type" name="event_type" required>
    </div>
    <div  class="form-content">
        <select name="event_term" id="sel" required>
            <option value="" disabled selected>Select Event Term</option>
            <option value="short_term">Short Term</option>
            <option value="moderate_term">Moderate Term</option>
            <option value="long_term">Long Term</option>
        </select>
    </div>
        <div  class="form-content">
        Event Date <input type="date"  name="event_date" required><br><br>
        </div>
        <div style="padding-left:10%;text-align:left; color:purple; ">
        Services <br>
        <input type="checkbox" name="catering" id="catering">
        <label for="catering">Catering</label><br>

        <input type="checkbox" name="event_planner" id="event_planner">
        <label for="event_planner">Event Planner</label><br>

        <input type="checkbox" name="dj_mc" id="dj_mc">
        <label for="dj_mc">DJ/MC</label>
        </div>
        <input type="submit" class="logbtn" value="Submit Booking">

    </form>
    </div>
    <div class="sticky-bottom">
    &copy; 2025 Blissful Events
    <div style="float:right">Contacts: +255 615 931 114</div>
</div>
</body>
</html>