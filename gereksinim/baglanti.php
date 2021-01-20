<?php
define('DB_SERVER','remotemysql.com');
define('DB_USER','AVLsn1APjE');
define('DB_PASS' ,'6I1T801FlV');
define('DB_NAME','AVLsn1APjE');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Database Bağlantısı Başarısız: " . mysqli_connect_error();
}
?>