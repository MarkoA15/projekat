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
    require_once("pano.php");
    ?>
   <!--Pocetak celog wrappera-->
   <div id="wrapper">
   <div id="main">
   <h1>O NAMA</h1>

   <p>ShopCool je jedan od najvećih multibrend lanaca sportske opreme u Srbiji i regionu jugoistočne Evrope. Svi najpoznatiji svetski brendovi se nalaze u našem asortimanu: Nike, Adidas, Reebok, Hummel, Converse, Puma, Asics i mnogi drugi.Počeli smo sa idejom da najpopularnijim sportskim brendovima, prepoznatljivom uslugom i stabilnim poslovanjem unese zdrav duh u sve segmente života. Tržište sa kojeg smo krenuli pre više od dve decenije je Srbija, a sada poslujemo i u Crnoj Gori, Bosni i Hercegovini i Makedoniji i širimo se i dalje.Imamo široku ponudu najpoznatijih sportskih brendova obuće, odeće i opreme za fudbal, trčanje, košarku, rukomet, odbojku, tenis i svakodnevne prilike. U našim prodavnicama možete pronaći i opremu za borilačke sportove, stoni tenis, biciklizam kao i kućne trenažere i sprave za vežbanje. Kompanija je i ekskluzivni uvoznik i distributer renomiranog danskog proizvođača sportske opreme Hummel, poznatog po svom rukometnom, fudbalskom i modnom programu.Našu sportsku porodicu čini preko 700 zaposlenih i preko 80 maloprodajnih objekata širom regiona. Osim Đak prodavnica ponosni smo i na novu specijalizovanu premijum multibrend radnju The Spot , koja je deo naše porodice od 2017. godine.Naš cilj je da svim generacijama, rekreativcima i sportistima ponudimo veliki izbor kvalitetne sportske opreme na jednom mestu i da im obezbedimo zadovoljstvo prilikom odabira i kupovine u našim radnjama kao i putem on-line kupovine.</p>
    </div ><!--end main-->
    </div>  <!--end wrappera-->

<?php
   require_once("footer.php");
?>
</body>
</html>