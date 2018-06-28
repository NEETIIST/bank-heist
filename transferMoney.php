<?php
/**
 * Created by PhpStorm.
 * User: Filipe
 * Date: 27/06/17
 * Time: 19:08
 */

require 'dbConnect.php';
require 'vigenere.php';

$db = pg_connect( pg_connection_string()  );
if(!$db) {
    echo "Error : Unable to open database\n";
} else {
    //echo "Opened database successfully\n";
}

#TODO GET those values from html
$user1=$_COOKIE["user"];
$user=$_REQUEST['user'];
$value=$_REQUEST['value'];
$code=$_REQUEST['code'];
#TODO check if works:

#$checksum=$_REQUEST['checksum'];
$alpha = array('A','B','C','D','E','F','G','H','I','J','K', 'L','M','N','O','P','Q','R','S','T','U','V','W','X ','Y','Z');
#echo $alpha[1];



#$user1="filipe";
#$user="valadas";
#$value=10;
#$valueString=(string)$value;
$valueString=$value;
#echo "Value pos:".$valueString[0]."\n";
$numlength = strlen((string)$value);
$toLetters="";
$add="";
$i=0;

for ($i = 0; $i <= $numlength; $i++) {
    $add=$alpha[$valueString[$i]];
    #echo "ADD:".$add."\n";
    $toLetters .= $alpha[$valueString[$i]];
}
#echo "toletters:".$toLetters."\n";
$cipher= encrypt($user1,"$toLetters");

/*echo "\n";
echo "User: " . $user . "\n";
echo "User1: ".$user1."\n";
echo "Value:".$value."\n";
echo "Cipher:".$cipher."\n";*/

if ($code==$cipher){
    $sql =<<<EOF
      START TRANSACTION;
      
        INSERT INTO TRANSFERS (ACCOUNT1,ACCOUNT2,VALUE)
        VALUES ('$user1', '$user', $value);
      
        UPDATE ACCOUNTS set BALANCE = BALANCE + $value where NAME='$user';
        UPDATE ACCOUNTS set BALANCE = BALANCE - $value where NAME='$user1';
        
      COMMIT;
EOF;
}else{
    echo('<script type="text/javascript">alert("Codigo errado");location.href="index.html";</script>');
}

$ret = pg_query($db, $sql);
if(!$ret) {
    echo pg_last_error($db);
    exit;
} else {
    //echo "Record updated successfully\n";
}

//echo "Operation done successfully\n";
echo('<script type="text/javascript">alert("Transferência feita com sucesso");location.href="index.html";</script>');
pg_close($db);
?>