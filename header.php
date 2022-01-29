<?php

require_once("require.php");
?>
<!--Pocetak celog headera-->
<div id="header">
        <div id="headertop">
            <div id="info">
                <p id="p" onmouseover="promena()" onmouseout="vrati()">Pozovite telefonom i narucite : 011.555.333 / Posetite nas na nasoj adresi</p>
            </div><!--end info-->
            <div id="slicice"> 
                <a href="#"> <i style="font-size: 35px;color:#fff;" onclick="klik3()" class="fab fa-facebook-square"></i></a> 
                <a href="#"> <i style="font-size: 35px;color:#fff;" onclick="klik1()" class="fab fa-instagram-square"></i></a>
                <a href="#"> <i style="font-size: 35px;color:#fff;" onclick="klik2()" class="fab fa-twitter-square"></i></a>
            </div><!--end slicice-->
            
</div><!--end headertop-->

<div id="headerdown">
    <div id="logo">
       <a href="index.php"> <img src="slike/logo.png" alt="logoprodavnice"></a>
    </div><!--end logo-->
    <div id="search">
    <form action="index.php" method="post">
       <input type="text" name="pretraga" placeholder="Pretrazi"> <button><i style=" color: black;margin-left:5px" class="fas fa-search"></i></button>
        </form>
    </div><br><br><!--end search-->
    <div id="register">
        <a href="register.php">Registracija  </a> |
        <a href="cart.php">Korpa<i style="color: purple; margin-left: 3px;font-size: 20px;" class="fas fa-shopping-cart"></i></a>
    </div><!--end registar-->
</div><!--end headerdown-->
<nav >
            <div > 
                <a href="index.php"><i style="font-size: 22px;" class="fas fa-home"></i></a>
            </div>
            <div >
                <a href="man.php">MUSKARCI</a>
                <div >
                    <!--<a href="">Odeca za muskarce</a>
                    <a href="">Obuca za muskarce</a>
                    <a href="">Dodatno za muskarce</a>-->
                </div>
            </div>
            <div>
                <a href="women.php">ZENE</a>
                <div >
                   <!--<a href="">Odeca za zene</a>
                    <a href="">Obuca za zene</a>
                    <a href="">Dodatno za zene</a>-->
                </div>
            </div>
            <div >
                <a href="kid.php">DECA</a>
                <div >
                  <!--<a href="">Odeca za decu</a>
                    <a href="">Obuca za decu</a>
                    <a href="">Dodatno za decu</a>-->
                </div>
            </div>
            <div >
                <a href="sport.php">SPORT</a>
                <div>
                   <!--<a href="">Fudbal</a>
                    <a href="">Kosarka</a>
                    <a href="">Ostali sportovi</a>-->
                </div>
            </div>
            <div >
               <a href="#">PROFIL</a>
            <div>
            <?php
                if(proveraPrijave()){
                    echo "<p>{$_SESSION['imeprezime']} ({$_SESSION['status']})</p>";
                    echo "<a href='logout.php'>Odjavite se</a>";
                }
                else echo "<a href='login.php'>Prijavite se</a>";
                if(proveraPrijave()){

  if($_SESSION['status']=='Administrator')
  {
    echo "<h4>Korisnici</h4>";
    echo "<a href='addUser.php'>Dodaj korisnika</a>";
    echo "<a href='deleteUser.php'>Obrisi korisnika</a>"; 
    echo "<a href='updateUser.php'>Izmena korisnika</a>"; 

    echo "<h4>Proizvodi</h4>";
    echo "<a href='addProduct.php'>Dodaj proizvod</a>"; 
    echo "<a href='deleteProduct.php'>Obrisi proizvod</a>"; 
  }
  if($_SESSION['status']=='Urednik')
  {
    echo "<h4>Proizvodi</h4>";
    echo "<a href='addProduct.php'>Dodaj proizvod</a>"; 
    echo "<a href='deleteProduct.php'>Obrisi proizvod</a>"; 
  }
}
            ?>
            </div>
            </div>
            </nav><!--end nav-->

        
   

    </div><!--end header-->
    <!--Kraj celog headera-->
<script src="js/header.js"></script>
