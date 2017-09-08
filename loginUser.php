<?php
/**
 * Created by PhpStorm.
 * User: Filipe
 * Date: 08/09/17
 * Time: 00:32
 */

$host        = "host = 127.0.0.1";
$port        = "port = 5432";
$dbname      = "dbname = beti_db";
$credentials = "user = beti password=password";

$db = pg_connect( "$host $port $dbname $credentials"  );
$name=$_REQUEST['user'];
$password=$_REQUEST['password'];

$query = "SELECT * from ACCOUNTS where NAME='$name' AND PASSWORD='$password'";
$result = pg_query($db, $query);

$result = pg_query($db, $query);
if(pg_num_rows($result) != 1) {
    // do error stuff
    echo "error";
} else {
    // user logged in
    setcookie("user", "$name");
    echo('<script type="text/javascript">location.href="/beti-csrf/index.html";</script>');
}
pg_close($db);