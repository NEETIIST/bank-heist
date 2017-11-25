<?php
/**
 * Created by PhpStorm.
 * User: Filipe
 * Date: 08/09/17
 * Time: 00:32
 */

require 'dbConnect.php';

$db = pg_connect( pg_connection_string()  );
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
    echo('<script type="text/javascript">location.href="index.html";</script>');
}
pg_close($db);