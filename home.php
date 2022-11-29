<?php 
//{}
session_start();
@include 'dbConnection.php';
if(isset($_POST["envoyer"])){
    if (isset($_POST['username']) && isset($_POST['pwd'])){
        function validate($data){
           $data = trim($data);
           $data = stripslashes($data);  
           $data = htmlspecialchars($data);    
           return $data;
        }
    $username = validate($_POST['username']);
    $pwd = validate($_POST['pwd']);
    $sql ="SELECT * FROM gestion_bus WHERE username = '$username' AND pwd = '$pwd'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);
        if($row["username"] == $username && $row["pwd"] == $pwd){
            echo "Logged in!";
            exit();
        }
        else{
            header("Location: index.php?error=Incorrect User name or Pass Word");
            exit();
        }
}
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Home Style  -->
    <link rel="stylesheet" href="Css/home.css">
    <!-- Render All Elements Normally  -->
    <link rel="stylesheet" href="Css/normalize.css">
    <!-- Font Awesome Library  -->
    <link rel="stylesheet" href="Css/all.min.css">
    <!-- Google Fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@400;500;700;800&family=Open+Sans:wght@400;700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,600&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <title>BUS CARD | home</title>
</head>
<body>
    <div class="header">
        <div class="container">
            <img class="logo" src="Images/logo-bus.png" alt="this is logo">
            <div class="links">
                <ul>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#contact">Contact Us</a></li>
                    <li><a href="#login">Sign In</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Start Landing  -->
    <div class="landing">
        <div class="intro-text">
            <h1>Hello There</h1>
            <p>Welcome to the Web Site Of Urban Transport of Beni Mellal | Fquih Ben Salh</p>
        </div>
    </div>
    <!-- Start Login  -->
    <div id="login" class="login">
            <div class="container">
                <i class="fa-regular fa-user"></i>
                <h1>Login</h1>
                <form method="POST" action="">
                    <p>User Name :</p>
                    <input class="pas-text" type="text" name="username" required placeholder="enter your user name">
                   
                    <p>Pass Word :</p>
                    <input class="pas-text" type="password" name="pwd" required placeholder="enter your password">
                    
                    <input class="sub-text" type="submit" name="envoyer" value="Login">
                    
                    <a href="signup.php">Don't Have an account ? Sign Up</a>
                </form>
            </div>
    </div>
    <!-- End Login -->
    <!-- Start Services  -->
        <div id="services" class="services">
            <div class="container">
                <div class="serv">
                    <i class="fa-sharp fa-solid fa-bus-simple"></i>
                    <h3>Monthly | Student</h3>
                    <h4>80 MAD</h4>
                    <p>Monday to Saturday</p>
                    <p>Before 20h</p>
                    <p>Not Available on Holidays</p>
                </div>
                <div class="serv">
                    <i class="fa-sharp fa-solid fa-bus-simple"></i>
                    <h3>Monthly | Not Student</h3>
                    <h4>100 MAD</h4>
                    <p>Monday to Sunday</p>
                    <p>Before 20h</p>
                    <p>Available on Holidays</p>
                </div>
                <div class="serv">
                    <i class="fa-sharp fa-solid fa-bus-simple"></i>
                    <h3>Annual</h3>
                    <h4>700 MAD</h4>
                    <p>All Days</p>
                    <p>Available on Holidays</p>
                </div>
            </div>
        </div>
    <!-- End Services  -->
    <!-- Start Contact -->
    <div id="contact" class="contact">
        <h4>If you have any questions, suggestions or complaints, do not hesitate to Contact Us :</h4>
        <div class="container">
            <p>Gmail : citybus@gmail.com</p>
            <p>Phone : 0512569334 / 22</p>
        </div>
     </div>
    <!-- End Contact -->
</body>
</html>