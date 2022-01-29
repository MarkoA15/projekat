<?php
session_start();
require_once("../require.php");
if(!proveraPrijave()){
    echo "Morate da budete prijavljeni!!!";
    exit();
}
$baza=konekcijaNaBazu();
if(!$baza) exit(1);

if(isset($_POST['idProizvodi'])){
    $idProizvodi=$_POST['idProizvodi'];
    $upit="INSERT INTO korpa (idKorisnici,idProizvodi) VALUES ({$_SESSION['id']},{$idProizvodi})";
    mysqli_query($baza,$upit);
    if(mysqli_error($baza)){
        echo "Greska pri dodavanju proizvoda u korpu!".mysqli_error($baza);
    }
    else echo "Uspesno dodat proizvod u korpu.";
}
else echo "Svi podaci su obavezni!!!";
?>