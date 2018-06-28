<?php
/**
 * Created by PhpStorm.
 * User: Filipe
 * Date: 27/06/17
 * Time: 16:55
 */

//class dbConnect{
//
//    private $host = "host = 127.0.0.1";
//    private $port = "port = 5432";
//    private $dbname = "dbname = beti_db";
//    private $credentials = "user = beti password=password";
//
//    public function getHost(){
//        return $this->host;
//    }
//
//    public function getPort(){
//        return $this->port;
//    }
//
//    public function getDBname(){
//        return $this->dbname;
//    }
//
//    public function getCredentials(){
//        return $this->credentials;
//    }
//
//    public function connect(){
//
//    $db = pg_connect( "$this->getHost() $this->getPort() $this->getDBname() $this->getCredentials()"  );
//    if(!$db) {
//        echo "Error : Unable to open database\n";
//    } else {
//        echo "Opened database successfully\n";
//        }
//    }
//}

function pg_connection_string() {
    //return "dbname = bankheist_db host = 127.0.0.1 port = 5432 user = bankheist password=password";
    return getenv('connString');;
}


?>