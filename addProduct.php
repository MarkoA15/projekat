<?php
session_start();
require_once("require.php");
$baza=konekcijaNaBazu();
if(!$baza) exit(1);
if(isset($_SESSION['status'])!="Administrator" and isset($_SESSION['status'])!="Urednik"){
    echo "Ovu stranicu mogu da vide samo administator i urednik!<br>";
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
<body >
    <?php require_once("header.php");?>
    <div id="wrapper"> 
        <h1>Dodavanje proizvoda</h1>
        <form action="addProduct.php" method="post" enctype="multipart/form-data">
            <input type="text" name="naziv" placeholder="Naziv proizvoda"><br><br>
            <textarea name="opis" id="opis" cols="30" rows="10" placeholder="Opis proizvoda"></textarea><br><br>
            <input type="text" name="cena" placeholder="Cena proizvoda"><br><br>
            <input type="text" name="boja" placeholder="Boja proizvoda"><br><br>
            <input type="file" name="slikaProizvoda"><br><br>
            <input type="file" name="viseSlika[]" multiple><br><br>
            <button name="snimi">Dodaj novi proizvod</button>
            <hr>
        </form>
   <?php
            //dodavanje proizvoda
            if(isset($_POST['snimi'])){
                $naziv=$_POST['naziv'];
                $opis=$_POST['opis'];
                $cena=$_POST['cena'];
                $boja=$_POST['boja'];
                if($naziv!="" and $opis!="" and $cena!="" and $boja!=""){
                    $upit="INSERT INTO proizvodi (naziv,opis,cena,boja) VALUES ('{$naziv}','{$opis}','{$cena}','{$boja}')";
                    $obrada=mysqli_query($baza,$upit);
                    if(mysqli_error($baza)){
                        echo izbaciPoruku("Greska pri dodavanju novog proizvoda!".mysqli_error($baza),0);
                    }
                    else {
                        $id=mysqli_insert_id($baza);
                        echo izbaciPoruku("Novi proizvod sa id: ".$id."  uspesno dodat",1);
                        //dodavanje jedne slike
                        if($_FILES['slikaProizvoda']['name']!=""){
                            $ime="slikeproizvoda/".$id.".jpg";
                            $tmp=$_FILES['slikaProizvoda']['tmp_name'];
                            $ekstenzije=array("jpg","jpeg","png","webp");
                            if(in_array(pathinfo($ime, PATHINFO_EXTENSION), $ekstenzije))
                            {
                                if(move_uploaded_file($tmp, $ime))
                                    echo izbaciPoruku("USPESAN upload slike na server",1);
                                else
                                    echo izbaciPoruku("NEUSPESAN upload slike na server",0);
                            }

                        }
                        //dodavanje vise slika
                        for($i=0;$i<$_FILES['viseSlika']['name'];$i++){
                            $imeslika=microtime(true).".jpg";
                            if(move_uploaded_file($_FILES['viseSlika']['tmp_name'][$i],"slikeproizvoda/".$imeslika)){
                                $upit1="INSERT INTO slikeproizvoda (idProizvodi,ime) VALUES ({$id},'{$imeslika}')";
                                mysqli_query($baza,$upit1);
                            }
                        }
                    }
                }
                else echo izbaciPoruku("Svi podaci su obavezni!!!<br>",0);
            }
           
   ?>
   
       </div>  <!--end wrappera-->

     
</body>
</html>