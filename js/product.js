function dodaj(idProizvodi){
    $.post("ajax/productAjax.php",{idProizvodi:idProizvodi},function(response){
        alert(response);
    })
}