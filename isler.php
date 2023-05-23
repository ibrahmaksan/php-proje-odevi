<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş</title>

    <style>

        body{
            background-image:url(images/office.jpg);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }


        .ekle{
            color: greenyellow;
            height: 30px;
            width: 50px;
            margin-left: 0%  auto;
        }
        .baslik{
            font-size: 26px;
            font-family: "Comic Sans MS";
        }

        .is{
            width : 750px;
            height: 150px;
            background-color: yellowgreen;
            opacity: 0.7;
            border: solid black 3px;
        }
        .cik{
            background-color: lightblue;
            width: 100 px;
            height: 50px;
            color: yellow;
            border: solid black 3px;
            border-radius : 3px;
            margin-top: 10px;
        }

    
</style>

</head>
<body>

    <h3 class = "baslik">İŞLER</h3>
    
    <?php 

        require_once "config.php";

        $islerim = mysqli_query($db, "SELECT * FROM isler LIMIT 10"); // her bir aşamada 10 tane eleman çekilecek.
        $dizi_isler = mysqli_fetch_all($islerim); // tabloyu diziye attık.
        $i = 0;

        for($i; $i<count($dizi_isler); $i++){ // databaseden çekilen veri üzerinde gezinme işlemi. Bu veriler sayfada görüntülenecek.

            echo "<div class='is'>"."Is : "."$i"+"1"."<br>"."Sirket Adı ve Is : ".$dizi_isler[$i][1]."<br>"."Tecrube : ".$dizi_isler[$i][2]."<br>"."Kategori : ".$dizi_isler[$i][3]."<br>"."Konum : ".$dizi_isler[$i][4]."<br>"."Telefon : ".$dizi_isler[$i][5]."<br>"."</div>";
        }
    ?>

    <div class="ekle"><button type ="submit" onClick="location.href = 'is_ekle.php'">İş ekle</button></div>
    <div class="cik"><a href="index.php">Çıkış yap</button></div>


</body>
</html>