<?php
session_start();
require_once("../require.php");
$baza=konekcijaNaBazu();
if(!$baza) exit(1);
//provera prijave korisnika
$funkcija=$_GET['funkcija'];
$upis['greska']="";
$upis['ispis']="";
if($funkcija=="prijava"){
    $email=$_POST['email'];
    $lozinka=$_POST['lozinka'];
    if($email!="" and $lozinka!=""){
        if(validnostStringa($email) and validnostStringa($lozinka)){
            $upit="SELECT * FROM korisnici where email='{$email}'";
                        $obrada=mysqli_query($baza,$upit);
                        if(mysqli_num_rows($obrada)==1){
                            $korisnik=mysqli_fetch_assoc($obrada);
                            if($korisnik['aktivan']==1){
                                if($korisnik['lozinka']==$lozinka){
                                    $_SESSION['id']=$korisnik['id'];
                                    $_SESSION['imeprezime']=$korisnik['ime']." ".$korisnik['prezime'];
                                    $_SESSION['status']=$korisnik['status'];
                                    $_SESSION['email']=$korisnik['email'];
                                   // $upis['ispis']=izbaciPoruku('Uspesno ste se prijavili.',1);                                   
                                    $upis['ispis']="index.php";                                                                                                     
                                }
                                else $upis['greska']=izbaciPoruku("Pogresna lozinka,molimo vas pokusajte ponovo.",0);
                            }
                            else $upis['greska']=izbaciPoruku("Korisnik {$email} trenutno nije aktivan na nasem sajtu.",0);
                        }
                        else $upis['greska']=izbaciPoruku("Korisnik sa imenom {$email} ne postoji.",0);
        }
        else $upis['greska']=izbaciPoruku("Lozinka ili e-mail sadrze nedozvoljen karakter!!",0);
    }
    else $upis['greska']=izbaciPoruku("Svi podaci su obavezni!",0);
    echo JSON_encode($upis,256);
}
?>