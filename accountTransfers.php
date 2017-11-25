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
//echo "<br />";

$user=$_COOKIE["user"];

if(!$db) {
    //echo "ERROR OPENING DB";
} else {
    //echo("<p style='color:darkcyan'> 'Opened database successfully\n'</p>");
}

//Ver movimentos
$sql =<<<EOF
      SELECT * from TRANSFERS where account1='$user' OR account2='$user' ORDER BY created_at;
EOF;

$ret = pg_query($db, $sql);
if(!$ret) {
    echo pg_last_error($db);
    exit;
}
while($row = pg_fetch_row($ret)) {
    if ($row[1]==$user){
        echo("<tr><td>".$row[4]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td class='text-right'>".$row[3]." €</td></tr>");
        //echo("<script>".$row[4].".slice(0,indexOf('.');</script>");
    }elseif ($row[2]==$user){
        echo("<tr><td>".$row[4]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td class='text-right'>".$row[3]." €</td></tr>");
    }

}


pg_close($db);
?>