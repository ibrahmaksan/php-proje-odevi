
<?php 

require_once "config.php";

if(isset($_POST["ad"])){

    $form_ad = $_POST["ad"];
    $form_tecrube =  $_POST["tecrube"];
    $form_kategori =  $_POST["kategori"];
    $form_konum = $_POST["konum"];

    $isler = mysqli_query($db, "INSERT INTO `isler` (`name`,`tecrübe`,`kategori`,`konum`) VALUES ('".$form_ad."','".$form_tecrube."','".$form_kategori."','".$form_konum."')");
    
    if(mysqli_errno($db) != 0){

        echo "Kayıt sırasında bir hata meydana geldi.";
    }

    header("Location: isler.php");
}


echo <<<EOF

<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş</title>

    <style>

    body{
        background-color: #F5CC98;  
        display: flex;
        flex-direction: column;
    }

    .ekle{
        background-color:white;
        width: 400px;
        height: 260px;
        border: solid white 6px;
        border-radius: 8px;
        color: black;
        font-family: 'Comic Sans MS';
        margin: auto;
        margin-top: 50px;
      
    }

    .formum{
        margin-top: 10px;
    }
    .baslik{
        margin: auto;
        margin-top: 50px;
        color: white;
        font-family: 'Comic Sans MS';
        font-size: 32px;

    }
</style>

</head>
<body>

    <div class="baslik">İŞ EKLE</div>
    <div class = "ekle">
        <form class = "formum" action="is_ekle.php" method = "POST">
            İş adı: <input type="text" name = "ad"><br>
            <br>
            Tecrübe : <input type = "text" name = "tecrube"><br><br>
            Kategori: <input type = "text" name = "kategori"><br><br>
            Konum : <input type = "text" name = "konum"><br><br>
            <button type = "submit">Ekle</button>
        </form>
    </div>
    
</body>
</html>

EOF;

?>