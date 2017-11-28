<?php
/**
 * Created by PhpStorm.
 * User: Filipe
 * Date: 27/06/17
 * Time: 18:05
 */
require 'dbConnect.php';

$db = pg_connect( pg_connection_string()  );
if(!$db) {
    echo "Error : Unable to open database\n";
} else {
    echo "Opened database successfully\n";
}

$sql =<<<EOF
      INSERT INTO ACCOUNTS (ID,NAME,BALANCE)
      VALUES (1, 'Paul', 20000.00 );

      INSERT INTO ACCOUNTS (ID,NAME,BALANCE)
      VALUES (2, 'Bob', 25000.00 );

      INSERT INTO ACCOUNTS (ID,NAME,BALANCE)
      VALUES (3, 'Jacob', 30000.00 );
EOF;

$ret = pg_query($db, $sql);
if(!$ret) {
    echo pg_last_error($db);
} else {
    echo "Records created successfully\n";
}
pg_close($db);
?>