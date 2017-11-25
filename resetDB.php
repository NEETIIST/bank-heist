<?php
/**
 * Created by PhpStorm.
 * User: Filipe
 * Date: 25/11/17
 * Time: 22:24
 */
require 'dbConnect.php';

$db = pg_connect( pg_connection_string()  );

if(!$db) {
    echo "Error : Unable to open database\n";
} else {
    echo "Opened database successfully\n";
}

$sql =<<<EOF
  DELETE FROM transfers;
  DELETE FROM accounts;
EOF;



$ret = pg_query($db, $sql);
if(!$ret) {
    echo pg_last_error($db);
} else {
    echo "DB reset successful\n";
}
pg_close($db);

?>