<?php
session_start();
require_once("require.php");
$baza=konekcijaNaBazu();
if(!$baza) exit(1);
if(isset($_SESSION['status'])!="Administrator"){
    echo "Ovu stranicu moze da vidi samo administator!<br>";
    echo "<a href='index.php'>Vratite se na pocetnu stranicu.</a>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fa/css/all.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title>www.shopcool.rs</title>
</head>
<body>
    <?php require_once("header.php");?>
    <div id="wrapper"> 
        <h1>Dodavanje korisnika</h1>
        <form action="addUser.php" method="post">
            <input type="text" name="ime" placeholder="Ime korisnika"><br><br>
            <input type="text" name="prezime" placeholder="Prezime korisnika"><br><br>
            <input type="email" name="email" placeholder="E-mail korisnika"><br><br>
            <input type="text" name="lozinka" placeholder="Lozinka korisnika"><br><br>
            <input type="text" name="adresa" placeholder="Adresa korisnika"><br><br>
            <input type="text" name="grad" placeholder="Grad korisnika"><br><br>
            <input type="text" name="pos" placeholder="Postanski broj korisnika"><br><br>
            <input type="text" name="broj" placeholder="Br.telefona korisnika"><br><br>
            <select name="status" id="status">
                <option value="0">Izaberi status</option>
                <option value="Administrator">Administrator</option>
                <option value="Urednik">Urednik</option>
                <option value="Korisnik">Korisnik</option>
            </select><br><br>
            <button name="snimi">Dodaj korisnika</button>
            <hr>
        </form>
   <?php
            //dodavanje korisnika
            if(isset($_POST['snimi'])){
                $ime=$_POST['ime'];
                $prezime=$_POST['prezime'];
                $email=$_POST['email'];
                $lozinka=$_POST['lozinka'];
                $adresa=$_POST['adresa'];
                $grad=$_POST['grad'];
                $pos=$_POST['pos'];
                $broj=$_POST['broj'];
                $status=$_POST['status'];
                if($ime!="" and $prezime!="" and $email!="" and $lozinka!="" and $adresa!="" and $grad!="" and $pos!="0" and $broj!="0" and $status!="0"){
                    $upit="INSERT INTO korisnici (ime,prezime,email,lozinka,adresa,grad,postanski_broj,broj_telefona,status) VALUES ('{$ime}','{$prezime}','{$email}','{$lozinka}','{$adresa}','{$grad}','{$pos}','{$broj}','{$status}')";
                    $obrada=mysqli_query($baza,$upit);
                    if(mysqli_error($baza)){
                        echo izbaciPoruku("Greska pri dodavanju novog korisnika!",0);
                    }
                    else echo izbaciPoruku("Korisnik sa id: ".(mysqli_insert_id($baza))."  uspesno dodat.",1);
                }
                else echo izbaciPoruku("Svi podaci su obavezni!!!",0);
            }
           
   ?>
          </div>  <!--end wrappera-->
</body>
</html>