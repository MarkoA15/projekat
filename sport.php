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
    <?php require_once("header.php");
    ?>
   <!--Pocetak celog wrappera-->
   <div id="pano"><img src="slike/sport.png" alt=""></div>
   <div id="wrapper">
   <div id="main">
         <?php
        $upit="SELECT * FROM viewproizvodi where na_stanju=1 and naslov='SPORT'";
        if(isset($_GET['id']))$upit="SELECT * FROM proizvodi WHERE id=".$_GET['id'];   
        $obrada=mysqli_query($baza,$upit);       
        for($i=0;$i<mysqli_num_rows($obrada);$i++){
            $proizvod=mysqli_fetch_assoc($obrada);
            
            echo "<div style='border:1px solid black;width:300px;height:150px;margin:5px;padding:5px;display:inline-block;color:#01627f'";
               echo "<span><center><h4><a href='product.php?id=".$proizvod['id']."'>".$proizvod['naziv']."</a></h4></center><br></span>";              
              if(file_exists("slikeproizvoda/".$proizvod['id'].".jpg")) $slika="slikeproizvoda/".$proizvod['id'].".jpg";
              else $slika="slike/no-image-available.jpeg";
             
             echo "<center><img src='{$slika}' height='70px' width='30%'></center>";
            echo "</div>";
        }            
        unset($baza);
       ?>
       </div ><!--end main-->
       </div>  <!--end wrappera-->

        


         

<?php
   
   require_once("footer.php");
 ?>
</body>
</html>