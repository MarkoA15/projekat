$(function(){
    dodavanje();
    kupljeno();
})

function dodavanje(){
    $.get("ajax/cartAjax.php?funkcija=dodavanje",function(response){
        $("#dodatPr").html(response);
    })
}

function kupljeno(){
    $.get("ajax/cartAjax.php?funkcija=kupljeno",function(response){
        $("#kupljenPr").html(response);
    })
}
function dodaj(id){
    $.get("ajax/cartAjax.php?funkcija=dodaj",{id:id},function(response){
        dodavanje();
        kupljeno();
        alert(response);
    })
}

function ukloni(id){
    $.get("ajax/cartAjax.php?funkcija=ukloni",{id:id},function(response){
        dodavanje();
        alert(response);     
    })
}