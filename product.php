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
    <link href="css/lightbox.css" rel="stylesheet" />
    <script src="js/lightbox-plus-jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js/product.js"></script>
    <title>www.shopcool.rs</title>
</head>
<body>
    <?php require_once("header.php");
    
    
    ?>
   <!--Pocetak celog wrappera-->
   <div id="wrapper">
   <div id="main">
       <?php
        $upit="SELECT * FROM proizvodi where na_stanju=1";
      if(isset($_GET['id']))$upit="SELECT * FROM proizvodi WHERE id=".$_GET['id'];

      
        $obrada=mysqli_query($baza,$upit);
        for($i=0;$i<mysqli_num_rows($obrada);$i++){
            $proizvod=mysqli_fetch_assoc($obrada);      
           echo "<center><h1><a href='product.php?id=".$proizvod['id']."'>".$proizvod['naziv']."</a></h1></center><br>";       
            $slika="slikeproizvoda/".$proizvod['id'].".jpg";
            echo "<center><img src='{$slika}' width='350px'></center>";
            echo "<center><div>";
              $upit="SELECT * FROM slikeproizvoda WHERE idProizvodi={$proizvod['id']}";
                  $sveslike=mysqli_query($baza,$upit);
                  while($redslike=mysqli_fetch_assoc($sveslike))                    
                    echo "<div style='display:inline-block;padding:5px'><a href='slikeproizvoda/{$redslike['ime']}' data-lightbox='proizvod' data-title='{$proizvod['naziv']}'><img src='slikeproizvoda/{$redslike['ime']}' height='50px'></a></div>";
                    echo "</div>";
            echo "<center><p>".$proizvod['opis']."</p></center><br>"; 
               echo "<center><h4 id='h' onclick='promeni()'>Boja:".$proizvod['boja']."</h4></center><br>"; 
               echo "<center><h4>Cena proizvoda : ".$proizvod['cena']."$</center></h4><br>"; 
              if(proveraPrijave()){
                echo "<center><button onclick='dodaj({$proizvod['id']})'>DODAJ U KORPU</button></center><br>"; 
              }
              else echo "<center><button id='greska' onclick='klikni()'>DODAJ U KORPU</button><br>"; 
           
        }   
         
       ?>
        <hr>
        <?php
        if(proveraPrijave()){
        ?>
       <form action="product.php?id=<?= $_GET['id']?>" method="post">
         <input type="text" name="ime" placeholder="Unesite vase ime"><br><br>
         <textarea name="kom" id="kom" cols="25" rows="10" placeholder="Unesite komentar"></textarea><br><br>
         <button name="dugme">Posaljite komentar</button>
       </form><br>
      <?php
        }
        else echo "Morate biti prijavljeni da bi ste ostavili vas komentar";
      ?>
       <?php
       //upis komentara
       if(isset($_GET['id']) and isset($_POST['ime']) and isset($_POST['kom'])){
         $idKom=$_GET['id'];
         $ime=$_POST['ime'];
         $kom=$_POST['kom'];
         if($idKom!="" and $ime!="" and $kom!=""){
            $upit="INSERT INTO komentari (idProizvodi,ime,komentar) VALUES ({$idKom},'{$ime}','{$kom}')";
            mysqli_query($baza,$upit);
            echo izbaciPoruku("Uspesno poslat komentar",1);
         }
         else echo izbaciPoruku("Svi podaci su obavezni!!!",0);
       }
       ?>
       <?php
       //prikaz komentara
       $upit="SELECT * FROM komentari where idProizvodi={$_GET['id']} ORDER BY vreme DESC";
       $obrada=mysqli_query($baza,$upit);
       if(mysqli_num_rows($obrada)==0){
         echo "<h4>Trenutno nema nijedan komentar za ovaj proizvod</h4>";
       }
       while($komentar=mysqli_fetch_assoc($obrada)){
        echo "<div>";
        echo "<p>{$komentar['komentar']}</p>";
        echo "(<b>{$komentar['ime']}</b> , <i>{$komentar['vreme']}</i>)";
        echo "</div><br>";
       }

        unset($baza);
       ?>
       
       </div ><!--end main-->

       </div>  <!--end wrappera-->    
       <?php require_once("footer.php");?>
      
</body>
</html>
<script src="js/header.js">
 
</script>
