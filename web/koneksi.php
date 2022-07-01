<?php
   $hostname  = "localhost";
   $username  = "root";
   $password  = "";
   $dbname  = "tubes";
   $db = mysql_connect($hostname, $username, $password) or die ('Koneksi Gagal! ');
   mysql_select_db($dbname);
?>