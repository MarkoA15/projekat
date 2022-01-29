<?php
//require_once("require.php");
$baza=mysqli_connect("localhost","root","","bazaprodavnice");
if(!$baza) exit(1);


$opcija=$_GET['opcija'];
if($opcija=="izmeni"){
    $upit="UPDATE korisnici SET ime='{$_POST['ime']}', prezime='{$_POST['prezime']}',email='{$_POST['email']}',adresa='{$_POST['adresa']}',grad='{$_POST['grad']}',postanski_broj='{$_POST['pos']}',broj_telefona='{$_POST['broj_telefona']}' WHERE id={$_POST['id']}";
    mysqli_query($baza,$upit);
}
?>