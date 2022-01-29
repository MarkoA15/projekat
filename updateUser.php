<?php
session_start();
require_once("require.php");
$baza=konekcijaNaBazu();
if(!$baza) exit(1);
if(isset($_SESSION['status'])!="Administrator"){
    echo "Ovu stranicu moze da vidi samo administator!<br>";
    echo "<a href='index.php'>Vratite se na pocetnu stranicu.</a>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fa/css/all.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title>www.shopcool.rs</title>
    <style>
        .korisnici{
            border:1px solid black;
            width: 200px;
            padding:2px;
            margin:1px;
            cursor: pointer;
        }
        .korisnici:hover{
            background-color:lightgrey;
        }
    </style>
</head>
<body>
<?php require_once("header.php");?>
    <div id="wrapper"> 
    <h1>Izmena korisnika</h1>

    <?php


$upit="SELECT * FROM korisnici";
$obrada=mysqli_query($baza,$upit);
for ($i=0; $i <mysqli_num_rows($obrada); $i++) { 
    $proizvod= mysqli_fetch_object($obrada);
    echo "<div class='korisnici' data-id='{$proizvod->id}' data-ime='{$proizvod->ime}' data-prezime='{$proizvod->prezime}' data-email='{$proizvod->email}' data-adresa='{$proizvod->adresa}' data-grad='{$proizvod->grad}' data-pos='{$proizvod->postanski_broj}' data-broj='{$proizvod->broj_telefona}'>{$proizvod->id}: {$proizvod->ime} {$proizvod->prezime}<br></div>";
   
}
?>
<hr>
<div id="odgovor"></div>
<input type="text" id="id" placeholder="Unesite id" disabled><br><br>
<input type="text" id="ime" placeholder="Unesite ime"><br><br>
<input type="text" id="prezime" placeholder="Unesite prezime"><br><br>
<input type="email" id="email" placeholder="Unesite e-mail"><br><br>
<input type="text" id="adresa" placeholder="Unesite adresu"><br><br>
<input type="text" id="grad" placeholder="Unesite grad"><br><br>
<input type="text" id="pos" placeholder="Unesite postanski broj"><br><br>
<input type="text" id="broj_telefona" placeholder="Unesite broj telefona"><br><br>
<button id="d1">Ukloni</button> <button id="d2">Izmeni</button>
<hr>
<div id="odg"></div>
    </div>  <!--end wrappera-->
</body>
</html>

<script>
    //izmena korisnika
    $(document).ready(function(){
       $(".korisnici").click(function(){
          // let div=$("#odg");
           let id=$(this).data("id");
           let ime=$(this).data("ime");
           let prezime=$(this).data("prezime");
           let email=$(this).data("email");
           let adresa=$(this).data("adresa");
           let grad=$(this).data("grad");
           let postanski_broj=$(this).data("pos");
           let broj=$(this).data("broj");
          //div.html(id+": "+ime+" "+prezime);
           $("#id").val(id);
           $("#ime").val(ime);
           $("#prezime").val(prezime);
           $("#email").val(email);
           $("#adresa").val(adresa);
           $("#grad").val(grad);
           $("#pos").val(postanski_broj);
           $("#broj_telefona").val(broj);
           
       })
       $("#d1").click(function(){
            $("input").val("");
       })
       $("#d2").click(function(){
        let id=$("#id").val();
        let ime=$("#ime").val();
        let prezime= $("#prezime").val();
        let email=$("#email").val();
        let adresa=$("#adresa").val();
        let grad=$("#grad").val();
        let pos=$("#pos").val();
        let broj_telefona=$("#broj_telefona").val();
        
        if(id==""){

        }
        else{
            $.post("ajax/saveUser.php?opcija=izmeni",{id:id,ime:ime,prezime:prezime,email:email,adresa:adresa,grad:grad,pos:pos,broj_telefona:broj_telefona},function(response){
                $("#odg").html("Uspesno ste izmenili podatke za korisnika"+response);
            })
        }
       })
    })
</script>
