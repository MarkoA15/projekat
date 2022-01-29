function prijava() {
    let email = $("#email").val();
    let lozinka = $("#lozinka").val();
    let odg = $("#upis");
    if (email == "" || lozinka == "") {
        odg.html("Niste uneli sve podatke!!!");
        return false;
    }
    $.post("ajax/loginAjax.php?funkcija=prijava", { email: email, lozinka: lozinka }, function(response) {
        // odg.html(response);
        let a = JSON.parse(response);
        if (a.greska)
            odg.html(a.greska);
        else
            window.location.assign(a.ispis);
    })
}