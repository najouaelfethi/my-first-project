<?php 
//{}
@include 'dbConnection-php';
if(isset($_POST["envoyer"])){
    $nom = mysqli_real_escape_string($conn, $_POST["nom"]);
    $prenom = mysqli_real_escape_string($conn, $_POST["prenom"]);
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $adresse = mysqli_real_escape_string($conn, $_POST["adresse"]);
    $cin = mysqli_real_escape_string($conn, $_POST["cin"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $pwd = mysqli_real_escape_string($conn, $_POST["pwd"]);
    $pwdC = mysqli_real_escape_string($conn, $_POST["pwdC"]);
    $photo = $_FILES["photo"]["name"];
    $photo_size = $_FILES["photo"]["size"];
    $phptp_temp_name = $_FILES["image"]["temp_name"];
    $photo_folder = "uploaded_photo/".$photo;
    $carte = $_FILES["carte"]["name"];
    $carte_size = $_FILES["carte"]["size"];
    $carte_folder = "uploaded_carte/".$carte;
    $select = mysqli_query($conn, "SELECT * FROM gestion_bus WHERE username = '$username' && pwd = '$pwd'");
    if(mysqli_num_rows($select) > 0){
    $msg[] = "User already exist";
}
if($pwdC != $pwd){
    $msg[] = "Password unmatched!";
}
elseif($photo_size > 2000000){
$msg[] = "Photo size is too large";
}
    else{
        $insert = mysqli_query($conn, "INSERT INTO gestion_bus(nom, prenom, username, adresse, cin, email, pwd, pwdC) VALUES ('$nom', '$prenom', '$username', '$adresse', '$cin', '$email', '$pwd', '$pwdC')");
        if($insert){
            move_uploaded_file($photo_temp_name, $photo_folder){
                $msg[] = "Registred successfully";
                header("location: login.php");
            }
            else{
                $msg[] = "Registration failed";
            }
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
    <link rel="stylesheet" href="Css/signup.css">
    <!-- Render All Elements Normally  -->
    <link rel="stylesheet" href="Css/normalize.css">
    <!-- Font Awesome Library  -->
    <link rel="stylesheet" href="Css/all.min.css">
    <!-- Google Fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@400;500;700;800&family=Open+Sans:wght@400;700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,600&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <title>BUS CARD | sign up</title>
</head>
<body>
    <div class="signup">
        <div class="container">
            <i class="fa-solid fa-user-plus"></i>
            <h3>Sign Up</h3>
            <form action="userRegistration.php" method="post" enctype="multipart/form-data">
               <?php 
               if(isset($msg)){
                foreach($msg as $msg){
                    echo "<div class"message">".$msg."</div>";
                }
               }
               ?>
            <label>First Name :</label>
                <input type="text" name="nom" required placeholder="your first name">
                
                <label>Last Name :</label>
                <input type="text" name="prenom" required placeholder="your last name">

                <label>User Name :</label>
                <input type="text" name="username" required placeholder="user name">
                
                <label>Adress :</label>
                <input type="text" name="adresse" required placeholder="your adress">
                
                <label>CIN :</label>
                <input type="text" name="cin" required placeholder="cin">
                
                <label>Are you a Student ?</label>
                <div class="yes">
                    <input id="y" type="radio" name="checkstudent" value="yes">
                    <label for="y" >Yes</label>
                </div>
                <div class="no">
                    <input id="n" type="radio" name="checkstudent" value="no">
                    <label for="n" >No</label>
                </div>
               <label>Email :</label>
                <input type="text" name="email" required placeholder="your email">
                
                <label>Password :</label>
                <input type="password" name="pwd" required placeholder="your password">
                
                <label>Confirm Password :</label>
                <input type="password" name="pwdc" required placeholder="confirm password">
                
                <label>Scan your photo :</label>
                <input type="file" name="photo" required>
                
                <label>If you are a student scan your student card :</label>
                <input type="file" name="carte" required>
                <input class="sub" type="submit" name="valider" value="Sign Up">
            </form>
        </div>
    </div>
</body>
</html>