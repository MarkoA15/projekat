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
   <h1>UPUTSVO ZA KUPOVINU</h1>

  <p>Da li ste znali da sve artikle koje smo spremili za Vas možete poručiti putem našeg sajta, na brz i jednostavan način?
Sve što je potrebno da uradite je da se registrujete kao kupac na sajtu, prijavite, nađete artikal koji želite, i ostavite svoje podatke, a mi ćemo se potruditi da vam sva roba koju ste naručili stigne u roku od 2-5 radnih dana.
Nakon što pristupite našem sajtu, otvoriće vam se početna strana na kojoj se u gornjem, desnom uglu nalazi opcija za registraciju. Uputstvo za registraciju možete pogledati ovde. Po dobijanju potvrde da ste se uspešno registrovali, neophodno je da se ulogujete na sajt odnosno prijavite na Vaš nalog. Uputstvo za prijavu možete pogledati ovde.
Nakon prijave prelazite na pretragu artikala. Kako biste ubrzali i olakšali svoju pretragu možete koristiti filtere koji se nalaze na levoj strani prozora (veličina, pol, uzrast, boja, brend, robna grupa). Kada se odlučite za neki artikal kliknite na odgovarajuću veličinu artikla, a zatim ga stavite u korpu. Kada to uradite u gornjem, desnom uglu će se pojaviti novi prozor koji vam nudi mogućnost da vidite stvari koje se nalaze u korpi, kao i mogućnost direktnog odlaska na kasu. Ukoliko ste našli sve artikle koje želite da naručite kliknite na opciju ’’kasa’’ kako biste otvorili novo polje u koje treba da unesete podatke o vašoj adresi. Nakon unosa adrese kliknite na opciju ’’dalje’’ kako biste prešli na sledeći korak. Na drugom koraku bira se način isporuke i tu postoji jedina opcija, a to je Dexpress kurirska služba koju treba da izaberete.
Nakon toga birate način plaćanja. Za sada su ponuđeni načini plaćanja “pouzećem” – plaćanje po preuzimanju, “plaćanje platnim karticama” – plaćanje preko kartice i “sindikalna prodaja” – plaćanje putem administrativne zabrane. Nakon što ste izabrali opciju koja Vam najviše odgovara prelazite na sledeći korak. Naredna stvar koju treba da uradite jeste da proverite porudžbenicu, odnosno da utvrdite da li ste poručili sve stvari koje ste želeli ili ste možda izostavili neki artikal, pogrešili u broju ili veličini. Na ekranu će vam se pojaviti podaci svih artikala koje ste prethodno ‘’stavili u korpu’’. Ukoliko su svi podaci ispravni, idete na potvrdu porudžbenice. Nakon te opcije pojaviće vam se porudžbenica koju možete odštampati ili jednostavno zabeležite ID broj porudžbenice. Imajte u vidu da je ID broj svake porudžbenice jedinstven.
Ovim korakom se završava proces online porudžbine, a artikli koje ste poručili će stići na Vašu adresu u roku od 2 do 5 radnih dana. Dostava za porudžbine čija je ukupna vrednost preko 6000,00 dinara je besplatna. Za porudžbine čija je ukupna vrednost do 6000,00 dinara troškovi dostave iznose 200,00 dinara. Važno je naglasiti da se troškovi dostave obračunavaju isključivo na osnovu ukupne vrednosti porudžbine, bez obzira koliko je artikala poručeno i koliko pošiljki se prosleđuje na adresu navedenu za isporuku. Dostava se evidentira samo na jednom računu.
</p>
</div ><!--end main-->
</div>  <!--end wrappera-->
<?php
   require_once("footer.php");
?>
</body>
</html>