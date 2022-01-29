<?php
session_start();
require_once("require.php");
$ispis="";
$baza=konekcijaNaBazu();
if(!$baza) exit(1);
if(isset($_SESSION['status'])!="Administrator"){
    echo "Ovu stranicu moze da vidi samo administator!<br>";
    echo "<a href='index.php'>Vratite se na pocetnu stranicu.</a>";
    exit();
}

//brisanje korisnika
if(isset($_POST['snimi'])){
    $opcija=$_POST['opcija'];
    if(!$opcija=="0"){
        $upit1="DELETE FROM korisnici WHERE id={$opcija}";
       $obrada1=mysqli_query($baza,$upit1);
       if(mysqli_error($baza)){
        $ispis=izbaciPoruku("Greska prilikom brisanja korisnika!".mysqli_error($baza),0);
       }
       else
        $ispis=izbaciPoruku("Uspesno obrisan korisnik!",1);
    }
    else
        $ispis=izbaciPoruku("Morate izabrati nekog korisnika!",0);
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
<body >
    <?php require_once("header.php");?>
    <div id="wrapper"> 
        <h1>Brisanje korisnika</h1>
        
        <form action="deleteUser.php" method="post">
            <select name="opcija" id="opcija">
                <option value="0">Izaberite korisnika</option>
                <?php
                $upit="SELECT * FROM korisnici";
                $obrada=mysqli_query($baza,$upit);
                while($korisnik=mysqli_fetch_assoc($obrada))
                    echo "<option value='{$korisnik['id']}'>{$korisnik['id']}: {$korisnik['ime']}  {$korisnik['prezime']}</option>";
                ?>
            </select><br><br>
            <button name="snimi">Obrisi korisnika</button>
            <hr>
        </form>
                <div><?= $ispis?></div>
   
   
       </div>  <!--end wrappera-->

     
</body>
</html>