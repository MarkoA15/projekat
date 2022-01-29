<?php
function konekcijaNaBazu(){
   @$baza=mysqli_connect("localhost","root","","novabaza");
   if(!$baza){
      if(mysqli_connect_errno()==1045)
         return "Korisnicko ime ili lozinka je pogresna!!!<br>";
      if(mysqli_connect_errno()==1049)
         return "Uneli ste pogresno ime baze ili bazu koja ne postoji!!!<br>";
      if(mysqli_connect_errno()==2002)
         return "Nije dobar server,pokusajte ponovo!!!<br>";
   } 
   else return $baza;
}

?>