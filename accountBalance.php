<?php
/**
 * Created by PhpStorm.
 * User: Filipe
 * Date: 27/06/17
 * Time: 19:01
 */
$host        = "host = 127.0.0.1";
$port        = "port = 5432";
$dbname      = "dbname = beti_db";
$credentials = "user = beti password=password";

$db = pg_connect( "$host $port $dbname $credentials"  );

//$userid=$_REQUEST['userid'];

//$cookie_name = "userid";
//$cookie_value = "1";

//setcookie( $cookie_name , $cookie_value,time() + (86400 * 30), "/");

$user=$_COOKIE["user"];

if(!$db) {
    //echo "ERROR OPENING DB";
} else {
    //echo("<p style='color:darkcyan'> 'Opened database successfully\n'</p>");
}

$sql =<<<EOF
      SELECT * from ACCOUNTS where NAME='$user';
EOF;

$ret = pg_query($db, $sql);
if(!$ret) {
    echo pg_last_error($db);
    exit;
}
while($row = pg_fetch_row($ret)) {
    echo($row[2]);
}

pg_close($db);
?>