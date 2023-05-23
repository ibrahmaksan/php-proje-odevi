
<?php

require_once "config.php"; // bağlantı kurmak için tüm sayfalara eklendi


if(isset($_POST["username"])){ 

    $form_username = $_POST["username"]; // username ve passwprd alındı.
    $form_password = $_POST["password"];

    $hash_password = hash("sha256",$form_password); // password şifrelendi.

    $quser = mysqli_query($db, "SELECT * FROM users WHERE `username` = '$form_username' AND `password` = '$hash_password' LIMIT 1");
    // kullanıcı karşılaştırması yapıldı.

    $num = mysqli_num_rows($quser);

    if($num == 0){ // eşleşen kullanıcı yoksa buraya girer.
        header("Location: index.php"); // ana sayfaya geri atar.
        exit();
        
    }
    else if($num == 1){
        echo "giriş başarılı";
        $kullanıcı = mysqli_fetch_assoc($quser); // giriş başarılı ise kullanıcıdan gelen verinin kullanılması için diziye attım.
    }
    
    header("Location: isler.php"); // giriş başarılı ise işler görüntülenecek.
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
        background-color: white;  
        display: flex;
        flex-direction: column;
    }

    .sign{
        background-color:#8fe9c0;
        width: 400px;
        height: 120px;
        border: solid black 6px;
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
        color: black;
        font-family: 'Comic Sans MS';
        font-size: 32px;

    }

    .github{
        margin-left : 710px; 
    }
</style>

</head>
<body>

    <div class="baslik">ANA SAYFA</div>
    <div class = "sign">
        <form class = "formum" action="index.php" method = "POST">
            Kullanıcı adı : <input type="text" name = "username"><br>
            <br>
            Şifre : <input type= "password" name = "password" placeholder="password">
            <button type = "submit">Giriş</button>
        </form>
        <p><a href="login.php">Hesabınız yok mu? Giriş yapmak için kaydolun.</a></p>
    </div>
    <br><br>
     <a class = "github" href = "https://github.com/ibrahmaksan/php-proje-odevi" target = "_blank" >Github Linki</a>   
</body>
</html>

EOF;

?>