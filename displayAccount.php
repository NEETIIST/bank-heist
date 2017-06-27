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
echo "Value of Cookie userid:";
echo $_COOKIE["userid"];
echo "<br />";
$userid=$_COOKIE["userid"];

if(!$db) {
    echo "Error : Unable to open database\n";
} else {
    echo "Opened database successfully\n";
}

$sql =<<<EOF
      SELECT * from ACCOUNTS where ID=$userid;
EOF;

$ret = pg_query($db, $sql);
if(!$ret) {
    echo pg_last_error($db);
    exit;
}
while($row = pg_fetch_row($ret)) {
    echo "ID = ". $row[0] . "\n";
    echo "NAME = ". $row[1] ."\n";
    echo "BALANCE = ". $row[2] ."\n";
}
echo "Operation done successfully\n";
pg_close($db);
?>