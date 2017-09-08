<?php
/**
 * Created by PhpStorm.
 * User: Filipe
 * Date: 27/06/17
 * Time: 17:58
 */
$host        = "host = 127.0.0.1";
$port        = "port = 5432";
$dbname      = "dbname = beti_db";
$credentials = "user = beti password=password";

$db = pg_connect( "$host $port $dbname $credentials"  );
if(!$db) {
    echo "Error : Unable to open database\n";
} else {
    echo "Opened database successfully\n";
}

$sql =<<<EOF
      CREATE TABLE ACCOUNTS
      (ID INT PRIMARY KEY     NOT NULL,
      NAME           TEXT    NOT NULL,
      BALANCE         REAL);
EOF;

$sql =<<<EOF
      CREATE TABLE TRANSFERS
      (ID INT PRIMARY KEY     NOT NULL,
      NAME           TEXT    NOT NULL,
      ACCOUNT1 INT REFERENCES accounts(id) NOT NULL,
      ACCOUNT2 INT REFERENCES accounts(id) NOT NULL,
      VALUE         REAL,
      created_at TIMESTAMP  NOT NULL);
EOF;

$sql =<<<EOF
      CREATE TABLE LOGINS
      (NAME  TEXT PRIMARY KEY    NOT NULL,
      PASSWORD         TEXT  NOT NULL,
      created_at TIMESTAMP  NOT NULL);
EOF;

$ret = pg_query($db, $sql);
if(!$ret) {
    echo pg_last_error($db);
} else {
    echo "Table created successfully\n";
}
pg_close($db);

?>