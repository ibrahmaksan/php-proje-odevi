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

    
</style>

</head>
<body>

    <h3 class = "baslik">İŞLER</h3>
    
    <?php 

        require_once "config.php";

        $islerim = mysqli_query($db, "SELECT * FROM isler LIMIT 10");
        $dizi_isler = mysqli_fetch_all($islerim);

        

        for($i = 0; $i<count($dizi_isler); $i++){
            echo "<div class='is'>"."İş : "."$i"+"1"."<br>".$dizi_isler[$i][1]."</div>";
        }
    ?>

    <div class="ekle"><button type ="submit" onClick="location.href = 'is_ekle.php'">İş ekle</button></div>

</body>
</html>