<?php
session_start();
require_once("../require.php");
if(!proveraPrijave()){
    echo "Morate biti prijavljeni!!!!<br><br>";
    echo "<a href='login.php'>Vratite se na stranicu za prijavu</a>";
    exit();
}
$baza=konekcijaNaBazu();
if(!$baza) exit(1);
$funkcija=$_GET['funkcija'];
if($funkcija=="dodavanje"){
    $upit="SELECT * FROM viewkorpa WHERE idKorisnici={$_SESSION['id']} AND kupljen=0";
    $obrada=mysqli_query($baza,$upit);
    if(mysqli_num_rows($obrada)==0)
        echo "Nemate proizvod u korpi!";
    else
        while($proizvod=mysqli_fetch_assoc($obrada)){
            echo "<div style='width:400px;height:150px;margin:5px;padding:5px;display:inline-block;color:#01627f'";
            //if(file_exists("slikeproizvoda/".$proizvod['id'].".jpg")) 
            //$slika1="slikeproizvoda/".$proizvod['id'].".jpg";
            //echo "<center><img src='{$slika1}' height='80px' width='30%'></center>"; 
            echo "<h4>Korisnik {$proizvod['ime']} {$proizvod['prezime']} dodala/o u korpu : {$proizvod['naziv']}, cena - {$proizvod['cena']} $</h4><br> <br>";
           
            echo "<button onclick='dodaj({$proizvod['id']})'>Kupite proizvod</button>  ";
            echo "<button onclick='ukloni({$proizvod['id']})'>Uklonite proizvod</button>";
            echo "</div>";
          
        }
       
}

if($funkcija=="kupljeno"){
    $upit="SELECT * FROM viewkorpa WHERE idKorisnici={$_SESSION['id']} AND kupljen=1";
    $obrada=mysqli_query($baza,$upit);
    if(mysqli_num_rows($obrada)==0)
        echo "Nemate kupljen proizvod!";
    else
        while($proizvod=mysqli_fetch_assoc($obrada)){
            echo "<div style='width:400px;height:150px;margin:5px;padding:5px;display:inline-block;color:#01627f'";
            //if(file_exists("slikeproizvoda/".$proizvod['id'].".jpg")) 
            //$slika1="slikeproizvoda/".$proizvod['id'].".jpg";          
            //echo "<center><img src='{$slika1}' height='80px' width='30%'></center>"; 
            echo "<h4>Korisnik {$proizvod['ime']} {$proizvod['prezime']} je kupio proizvod : {$proizvod['naziv']}, cena - {$proizvod['cena']} $</h4>";
            echo "</div>";
        }
        
}

if($funkcija=="dodaj"){
    $id=$_GET['id'];
    $upit="UPDATE korpa SET kupljen=1 WHERE id={$id}";
    mysqli_query($baza,$upit);
    if(mysqli_error($baza))
        echo "Greska pri kupovini proizvoda!!!";
    else
        echo "Uspesno kupljen proizvod.";
}

if($funkcija=="ukloni"){
    $id=$_GET['id'];
    $upit="DELETE FROM korpa WHERE id={$id}";
    mysqli_query($baza,$upit);
    if(mysqli_error($baza))
        echo "Greska pri brisanju proizvoda!!!";
    else
        echo "Uspesno obrisan proizvod.";
}
?>