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
<?php 
    require_once("header.php");
    require_once("pano.php");
?>
   <!--Pocetak celog wrappera-->
   <div id="wrapper">
   <div id="main">

   <h1>NASA LOKACIJA</h1>
   
   <p>Pronađite nasu radnju u ulici Zivka Davidovica 10 i svratite do nas jer imamo veliki izbor sportske opreme na jednom mestu.

        Cekamo vas!</p>

       <center><div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=belgrade,zvezdara,zivka%20davidovica%2010&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://2piratebay.org"></a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style><a href="https://www.embedgooglemap.net"></a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div></div></center> 

       </div ><!--end main-->
       </div>  <!--end wrappera-->
<?php
   require_once("footer.php");
?>
</body>
</html>