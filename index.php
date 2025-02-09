<!DOCTYPE html>
<html>
<head>
<title>Blissful Events</title>
<style>
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
.logbtn{
    background: transparent;
    margin :30px auto 15px;
    width: 70%;
    opacity:0.7;
    display: block;
    text-align:center;
    border-radius: 10px;
    border: 1px solid purple;
    color: crimson;
    background-color:white;
    cursor: pointer;
    font-size: 18px;
}
.container{
    width: 90%;
    background: white;
    text-align:center;
    opacity:0.8;
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
  background-image: url("images/catering1.jpg");
  background-size: cover;
  padding: auto;
  border-radius:20px;
  margin:auto;
  height: 40vh;
  width: 48%; 
  box-sizing: border-box;
}

.right-div {
background-image: url("images/Event1.jpg");
background-size: cover; 
padding: auto;
  margin:auto;
  border-radius:20px;
  width: 48%; 
  height: 40vh;
  align-items: center; 
  box-sizing: border-box;
}
.left-div1 {
  background-image: url("images/dj2.jpg");
  background-size: cover;
  padding: auto;
  border-radius:50px;
  margin:auto;
  width: 48%; 
  box-sizing: border-box;
}

.right-div1 {
  background-color: purple;
  padding: auto;
  margin:auto;
  border-radius:50px;
  width: 48%; 
  box-sizing: border-box;
}
a{
    text-decoration: none;
} 
h1,h2,h3{
    color: white;
}
p{
    color:white
    ;
}
</style>
</head>
<body>
    <div class ="sticky-top" style="color: purple;background-color: white;font-size: 50px;opacity: 0.9;">
    Blissful Events
    </div>
    <br/>
    <div class="container">
    <h1 style="color:purple;">Welcome to Blissful Events</h1>
    <p style="color:purple;">
    At Blissful Events, we turn your special moments into unforgettable
     experiences.
    </p>
    <h2>Our Services</h2>
    <div class="container1" >
        <div class="left-div">
        <h3 style="">Catering Services</h3>
            <p>
            At Blissful Events, we believe that great food is the heart of any 
            successful event. Our professional catering team provides a diverse
            menu tailored to your preferences, offering delicious cuisine that
            will delight your guests. From gourmet multi-course meals to 
            casual buffets and themed menus, we use high-quality ingredients 
            and exquisite presentation to enhance your celebration.
            </p>
        </div>
        <div class="right-div">
        <h3>Event Planning</h3>
            <p>
            Our expert event planners take the stress out of organizing 
            your special day. We handle everything from conceptualization 
            to execution, ensuring a smooth and enjoyable experience. Our 
            services include venue selection, budgeting, vendor coordination, 
            timeline management, and on-the-day coordination to ensure every 
            detail is taken care of with precision and creativity.
            </p>
        </div>
    </div>
<br>
<div class="container1">
    <div class="right-div1">
    <h3>Login or Register Here!</h3>
    <a href="login.php"class="logbtn" >Login</a> 
    <a href="register.php" class="logbtn">Register</a>
    </div>
    <div  class="left-div1">
    <h3>MC and DJ Services</h3>
    <p>Elevate your event with our professional MCs and DJs who bring energy,
         charisma, and the perfect soundtrack to your celebration. 
         Whether you need a lively atmosphere for a party or 
         a sophisticated vibe for a formal gathering, our talented 
         entertainers keep the crowd engaged and ensure a memorable 
         experience for everyone in attendance.
    </p>
    </div>
</div>
    <br/>
</div>
<br>
<div class="sticky-bottom">
    &copy; 2025 Blissful Events
    <div style="float:right">Contacts: +255 615 931 114</div>
</div>
</div>
</body>
</html>