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
    $sql ="SELECT * FROM client WHERE username = '$username' AND pwd = '$pwd'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);
        if($row["username"] == $username && $row["pwd"] == $pwd){
            echo "Logged in!";
            exit();
        }
        else{
            header("Location: home.php?error=Incorrect User name or Pass Word");
            exit();
        }
}
}
}
?>
