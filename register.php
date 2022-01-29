<?php
session_start();
require_once("require.php");
$baza=konekcijaNaBazu();
if(!$baza) exit(1);

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
        <!--Forma za registraciju -->
        <h1>Registracija</h1>
        <form action="register.php" method="post">
            <input type="text" name="ime" id="ime" placeholder="Vase ime"><br><br>
            <input type="text" name="prezime" id="prezime" placeholder="Vase prezime"><br><br>
            <input type="email" name="email" id="email" placeholder="Vas e-mail" require><br><br>
            <input type="password" name="lozinka" id="lozinka" placeholder="Unesite lozinku"><br><br>
            <input type="password" name="potvrdi" id="potvrdi" placeholder="Potvrdite vasu lozinku"><br><br>
            <input type="text" name="adresa" id="adresa" placeholder="Vasa adresa"><br><br>
            <input type="text" name="grad" id="grad" placeholder="Vas grad"><br><br>
            <input type="text" name="pos" id="pos" placeholder="Unesite postanski broj"><br><br>
            <input type="text" name="broj" id="broj" placeholder="Vas broj telefona"><br><br>
            <input type="checkbox" name="stisni" value="da">Da li se slazete sa uslovima koriscenja?<br><br>
           
            <button name="snimi">Registruj se</button>
            
            <hr>
        </form>
   <?php
            //provera registracije
            if(isset($_POST['snimi'])){
                $ime=$_POST['ime'];
                $prezime=$_POST['prezime'];
                $email=$_POST['email'];
                $lozinka=$_POST['lozinka'];
                $adresa=$_POST['adresa'];
                $grad=$_POST['grad'];
                $pos=$_POST['pos'];
                $broj=$_POST['broj'];
              
               
                if($ime!="" and $prezime!="" and $email!="" and $lozinka!="" and $adresa!="" and $grad!="" and $pos!="0" and $broj!=""){
                    if(validnostStringa($ime) and validnostStringa($prezime) and validnostStringa($lozinka) and validnostStringa($adresa) and validnostStringa($grad)){
                        if($lozinka==$_POST['potvrdi']){
                            if(isset($_POST['stisni'])==true){
                                $upit="SELECT * FROM korisnici where email='{$email}'";
                                $obrada=mysqli_query($baza,$upit);
                                $br=mysqli_num_rows($obrada);
                                    if($br==1){
                                        echo izbaciPoruku("Korisnik sa ovim e-mailom vec postoji,pokusajte ponovo!!!",0);
                                    }
                                        else{
                                $upit1="INSERT INTO korisnici (ime,prezime,email,lozinka,adresa,grad,postanski_broj,broj_telefona) VALUES ('{$ime}','{$prezime}','{$email}','{$lozinka}','{$adresa}','{$grad}',{$pos},'{$broj}')";
                                $obrada1=mysqli_query($baza,$upit1);
                                        echo izbaciPoruku("Dobro dosli {$ime}  {$prezime},uspesno ste se registrovali.",1);
                                }
                            }
                                    else echo izbaciPoruku("Morate se slagati sa uslovima koriscenja,da bi ste bili registrovani!!!",0);
                        }
                             else echo izbaciPoruku("Potvrda lozinke nije ispravna,pokusajte ponovo!!!",0);
                 }
                         else echo izbaciPoruku("Neki od podataka sadrzi nedozvoljen karakter!!!",0);
                }
                else echo izbaciPoruku("Svi podaci su obavezni!!!",0);
            }
            else echo "<h4>Dobro dosli na stranicu za registraciju,unesite vase podatke!</h4>";
               
   ?>
   <div id="upis"></div>
       </div>  <!--end wrappera-->

     
</body>
</html>
