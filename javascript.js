/**
 * Created by Filipe on 27/06/17.
 */

function makeActive(option)
{
    let m = option.id ;
    let d = m.replace("menu_","opt_");

    $(".menu").css("color","#1c1c1c");
    $("#"+m).css("color","#1976D2");

    $(".display").hide();
    $("#"+d).show();
};

function hideAll()
{
    $(".display").hide();
    $("#opt_0").show();
}

function isLogged(){
    if ( getCookie("user") !== "" ) //User is Logged
    {
        $(".not_logged").hide();
        $(".logged").show();
        $("#loggedUser").text(getCookie("user"));
    }
    else
    {
        $(".not_logged").show();
        $(".logged").hide();   
    }
}

function showLogin(){
    $("#loginButton").css("color","#1976D2");
    $("#registerButton").css("color","#1c1c1c");
    $('#loginForm').attr('action', 'loginUser.php');
    $('#loginFormText').text("Entrar >");
    //$('#loginFormIcon').addClass('fa-sign-in').removeClass('fa-user-plus');

}

function showRegister(){
    $("#loginButton").css("color","#1c1c1c");
    $("#registerButton").css("color","#1976D2");
    $('#loginForm').attr('action', 'signUp.php');
    $('#loginFormText').text("Criar conta >");
    //$('#loginFormIcon').addClass('fa-user-plus').removeClass('fa-sign-in');
}

function setCookie(cname,cvalue,exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

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

function checkCookie() {
    var user=getCookie("username");
    if (user != "") {
        alert("Welcome again " + user);
    } else {
        user = prompt("Please enter your name:","");
        if (user != "" && user != null) {
            setCookie("username", user, 30);
        }
    }
}

function deleteAllCookies() {
    var cookies = document.cookie.split(";");

    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        var eqPos = cookie.indexOf("=");
        var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
}

/* AJAX */

function getBalance()
{
    $('.loading').show();
    $('#balanceHolder').hide();
    $.post(                             //call the server
        "accountBalance.php",{}                     //At this url
    ).done(                             //And when it's done
        function(data)
        {
            $('.loading').hide();
            $('#balanceHolder').show();
            $('#balance').html(data);  //Update here with the response
        }
    );
}

function getTransfers()
{
    $('.loading').show();
    $('#transfers').hide();
    $('#transfers tr').remove();
    $.post(                             //call the server
        "accountTransfers.php",{}                     //At this url
    ).done(                             //And when it's done
        function(data)
        {
            $('.loading').hide();
            $('#transfers').show();
            $('#transfers').append(data);  //Update here with the response
        }
    );
}