<?php
/**
 * Created by PhpStorm.
 * User: Filipe
 * Date: 08/09/17
 * Time: 00:35
 */

$host        = "host = 127.0.0.1";
$port        = "port = 5432";
$dbname      = "dbname = beti_db";
$credentials = "user = beti password=password";

$db = pg_connect( "$host $port $dbname $credentials"  );

$name=$_REQUEST['user'];
$password=$_REQUEST['password'];
$balance=25000;

$query = "INSERT INTO ACCOUNTS(name, balance, password) VALUES ('$name','$balance','$password')";
$result = pg_query($query);

if(!$result) {
    echo pg_last_error($db);
    exit;
} else {
    echo "Conta criada com sucesso\n";
}
pg_close($db);
