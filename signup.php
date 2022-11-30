<?php 
//{}
@include 'dbConnection.php';
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
    $select = mysqli_query($conn, "SELECT * FROM client WHERE username = '$username' AND pwd = '$pwd'");
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
        $insert = mysqli_query($conn, "INSERT INTO client(nom, prenom, username, adresse, cin, email, pwd, pwdC) VALUES ('$nom', '$prenom', '$username', '$adresse', '$cin', '$email', '$pwd', '$pwdC')");
        if($insert){
            move_uploaded_file($photo_temp_name, $photo_folder){
                $msg[] = "Registred successfully";
                header("location: home.php");
            }
            else{
                $msg[] = "Registration failed";
            }
        }
    }

if(isset($msg)){
    foreach($msg as $msg){
        echo "<div class="message">".$msg."</div>";
    }
   }
}

?>
