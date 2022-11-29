<?php
$conn = mysqli_connect("localhost", "root", " ", "gestion_bus");
if($conn -> connect_error){
  die("Connection failed!"); 
}
else{
  echo "Connected";
}

?> 