<?php
function validnostStringa($string){
    if(strpos($string,"=")!=false) return false;  
    if(strpos($string,"+")!=false) return false; 
    if(strpos($string,"-")!=false) return false; 
    if(strpos($string,",")!=false) return false; 
    if(strpos($string,"'")!=false) return false; 
    if(strpos($string,'"')!=false) return false; 
    if(strpos($string,"*")!=false) return false; 
    if(strpos($string,"/")!=false) return false; 
    if(strpos($string,"%")!=false) return false; 
    return true;
   
}

function proveraPrijave(){
    if(isset($_SESSION['id']) and isset($_SESSION['imeprezime']) and isset($_SESSION['status']) and isset($_SESSION['email']))
        return true;
    else
        return false;
}

function izbaciPoruku($string,$odluka){
    if($odluka==0) return "<h4 style='width:100%;color:red;'>$string</h4>";
    if($odluka==1) return "<h4 style='width:100%;color:green;'>$string</h4>";
}
?>