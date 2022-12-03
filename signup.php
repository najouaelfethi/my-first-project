<?php
 if(isset($_POST['valider'])){
    $myconn = mysqli_connect("localhost","root",""); 
    if($myconn==false) die("Connexion impossible");
    $selectdb = mysqli_select_db($myconn,"gestion_bus"); 
    if($selectdb==false) die("Database inaccessible");

 $nom = $_POST['nom'] ;
 $prenom = $_POST['prenom'] ;
 $username = $_POST['username'] ;
 $adresse = $_POST['adresse'] ;
 $cin = $_POST['cin'] ;
 $email = $_POST['email'] ;
 $pass = $_POST['pwd'] ;
 $cpass = $_POST['pwdc'] ;
 $check = $_POST['checkstudent'] ;
 $filename = $_FILES["photo"]["name"];
 $tempname = $_FILES["photo"]["tmp_name"];
 $folder = "./image_client/" . $filename;
 if(strcmp($pass,$cpass)!=0) die("<h1>Passwords Are Not Identical</h1>") ;
 $req = " select * from client where cin = '$cin' " ;
 $res = mysqli_query($myconn,$req) ;
 $nb = mysqli_num_rows($res) ;
 if($nb > 0) die("<h1>User Already Exists</h1>") ;
 else {
    
    $req = "insert into client values('$nom', '$prenom', '$username', '$adresse', '$cin', '$email','$filename', '$pass')" ;
    mysqli_query($myconn,$req) ;
    move_uploaded_file($tempname, $folder) ;

    if(strcmp($check,"yes")==0) {
      $filename = $_FILES["carte"]["name"];
      $tempname = $_FILES["carte"]["tmp_name"];
      $folder = "./doc_etud/" . $filename;
      $req = "insert into etudiant(doc,cin) values ('$filename','$cin') " ;
      mysqli_query($myconn,$req) ;
      move_uploaded_file($tempname, $folder) ;
    }
    echo "<h1>Successful Authentication Welcome to our world</h1>" ;
 }
   mysqli_free_result($res) ;
   mysqli_close($myconn) ;   
}
?>
