<?php

$db_host = "sql106.epizy.com"; // host adresi 
$db_user = "epiz_34270185"; // kullanıcı_adim
$db_pass = "oLWGDRwossn";  // dtbase sifresi;
$db_name = "epiz_34270185_vtpsis"; // database_ismi

$db = mysqli_connect($db_host,$db_user,$db_pass,$db_name); // database ile bağlantıyı gerçekleştirdik.

if(mysqli_connect_errno()){ // bağlantıda hata varsa direkt çıkılacak
    echo "bir hatayla karşılaşıldı.";
    exit();
}



