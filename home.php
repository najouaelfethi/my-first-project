<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container {
            width: 50%;
            height: calc(100vh - 40px) ;            
            margin: 0 auto;
            padding-top: 20px;
            padding-left: 20px;
            background-color: #f6f6f6;
            border: 2px dashed #333;
            border-radius: 20px;
            text-align: center ;
            position: relative;
        }
        .image img {
            width: 100px ;
            border-radius: 20px;
        }
        .info p {
            color: black;
            font-size: 20px;
            padding: 10px ;
            margin-bottom: 40px;
        }
        a { display:block;
            position: absolute;
            left: 50% ;
            transform: translateX(-50%);
            bottom: 30px;
            text-decoration: none;
            width: fit-content;
            color: white;
            padding: 20px 40px;
            font-weight: bold;
            transition: 0.3s;
            background-color: red;
        }
        a:hover {
            background-color: #10c4ca;
            color: red;
            cursor: pointer;
            border-radius: 20px;
        }
    </style>
</head>
<body>
<?php
if(isset($_POST['envoyer'])) {
    $myconn = mysqli_connect("localhost","root",""); 
    if($myconn==false) die("Connexion impossible");
    $selectdb = mysqli_select_db($myconn,"gestion_bus"); 
    if($selectdb==false) die("Database inaccessible");
$user = $_POST['username'] ;
$pwd = $_POST['pwd'] ;

$req = "select * from client where username = '$user' and pwd = '$pwd' " ;
$res = mysqli_query($myconn,$req);
if(mysqli_num_rows($res)!=1) die("<h1>User Does Not Exist</h1>") ; 
else $tab = mysqli_fetch_array($res) ;
}
?>
<div class="container">
 <div class="image">
    <img src="image_client/<?php echo $tab['photofilename'] ?> " alt="photo">
  </div>
  <div class="info">
    <p>First Name : <?php echo $tab["nom"] ; ?></p>
    <p>Last Name : <?php echo $tab["prenom"] ; ?></p>
    <p>User Name : <?php echo $tab["username"] ; ?></p>
    <p>Adress : <?php echo $tab["adresse"] ; ?></p>
    <p>Email : <?php echo $tab["email"] ; ?></p>
  </div>
  <a href="pay.html">Pay Now</a>
</div>
</body>
</html>
<?php
mysqli_free_result($res);
mysqli_close($myconn);
?>
