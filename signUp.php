<?php
/**
 * Created by PhpStorm.
 * User: Filipe
 * Date: 08/09/17
 * Time: 00:35
 */

require 'dbConnect.php';

$db = pg_connect( pg_connection_string()  );

$name=$_REQUEST['user'];
$password=$_REQUEST['password'];
$balance=25000;

$query = "INSERT INTO ACCOUNTS(name, balance, password) VALUES ('$name','$balance','$password')";
$result = pg_query($query);

if(!$result) {
    echo pg_last_error($db);
    exit;
} else {
    setcookie("user", "$name");
    echo('<script type="text/javascript">location.href="/beti-csrf/index.html";</script>');
}
pg_close($db);
