
<?php

require_once "config.php";


if(isset($_POST["username"])){

    $form_username = $_POST["username"]; // formdan kullanıcı adı mail ve şifre alındı.
    $form_password = $_POST["password"];
    $form_mail = $_POST["mail"];

    if(strlen($form_password)<6 || strlen($form_password)>16){ // şifre 6 karakter ile 16 karakter arasnda değilse uyarı gelecek.

        echo "Lütfen 6 karakter ile 16 karakter arasında bir şifre giriniz.";
        exit();
    }

    $hash_password = hash("sha256",$form_password);

    $kayıt = mysqli_query($db, "INSERT INTO `users` (`username`,`password`,`email`) VALUES ('".$form_username."','".$hash_password."','".$form_mail."')");

    if(mysqli_errno($db) != 0){ // kayıt sırasında hata meydana gelirse, mesele bir kullanıcı aynı kullanıcı adıyla kaydolmak isterse hata verecek.

        echo "Kayıt sırasında bir hata meydana geldi.";
        header("Location: index.php"); // kayıt aşamasında sorun olursa ana sayfaya atacak.
        exit();
    }

    header("Location: index.php"); // sorunsuz kayıt olunduğunda ana sayfaya atacak.
}



echo <<<EOF
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Kaydı</title>

    <style>

    body{
        background-color: #F5CC98;  
        display: flex;
        flex-direction: column;
    }

    .sign{
        background-color:#8fe9c0;
        width: 400px;
        height: 200px;
        border: solid white 6px;
        border-radius: 8px;
        color: white;
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

    .buton{
        margin-left: 170px;
        margin-top: 30px;
    }
</style>

</head>
<body>

    <div class="baslik">KAYIT SAYFASI</div>
    <div class = "sign">

        <form class = "formum" action = "login.php" method = "POST">

            Kullanıcı adı : <input type="text" name = "username" placeholder = "username"><br>
            <br>
            Şifre : <input type= "password" name = "password" placeholder="password">
            <br><br>
            E-mail : <input type="mail" name = "mail" placeholder = "blabla@hotmail.com"><br>

            <button type = "submit" class = "buton">Kaydol</button>
        </form>
    </div>
    
</body>
</html>


EOF;

?>