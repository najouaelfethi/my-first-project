<?php
if(isset($_POST['pay'])){
    $myconn = mysqli_connect("localhost","root",""); 
    if($myconn==false) die("Connexion impossible");
    $selectdb = mysqli_select_db($myconn,"gestion_bus"); 
    if($selectdb==false) die("Database inaccessible");

    $cin = $_POST['cin'] ;
    $typeabb = $_POST['typeabonn'] ;
    $typecard = $_POST['typecarte'] ;
    $cardnum = $_POST['numcard'] ;
    $date = date("Y-m-d");
    
    if(strcmp($typeabb,"monthlystudent")) $prix = 80 ;
    if(strcmp($typeabb,"monthlynotstudent")) $prix = 100 ;
    if(strcmp($typeabb,"annual")) $prix = 700 ;

    $req = "insert into abonnement(type,prix,cin) values ('$typeabb',$prix,'$cin')" ;
    mysqli_query($myconn,$req) ;

    $req = "insert into paiement(date,type,cin,numerocarte) values ('$date','$typecard','$cin', '$cardnum')" ;
    mysqli_query($myconn,$req) ;

    echo "<h1>Operation Accomplished Successfully</h1>" ;

    mysqli_close($myconn) ;
}
?>
