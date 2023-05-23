<?php
session_start();

$db_host = "sql106.epizy.com";
$db_user = "epiz_34270185";
$db_pass = "oLWGDRwossn";
$db_name = "epiz_34270185_vtpsis";

$db = mysqli_connect($db_host,$db_user,$db_pass,$db_name);

if(mysqli_connect_errno()){
    echo "bir hatayla karşılaşıldı.";
    exit();
}



