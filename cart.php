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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js/cart.js"></script>
    <title>www.shopcool.rs</title>
</head>
<body>
    <?php require_once("header.php");
    ?>
   <!--Pocetak celog wrappera-->
   <div id="wrapper">
   <div id="main">
   <h1>KORPA</h1>
    <h3>Dodati proizvodi u korpi</h3>
    <div id="dodatPr"></div><br>
    <hr>
    <h3>Kupljeni proizvodi</h3>
    <div id="kupljenPr"></div>
       </div ><!--end main-->
       </div>  <!--end wrappera-->       
</body>
</html>