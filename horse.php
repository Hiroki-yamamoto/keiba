<html xmlns="http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <!-- Bootstrap -->
    <link href="BootStrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div class="warpper">
        <div class="title">
            競馬で勝てるように賭け金を配分メーカー
        </div>
<?php

    $horse_total = $_GET['horse_total'];
    echo "<label class='horse_total'>出馬数:".$horse_total."<br></label>";


    echo "<div class='container'>
            <form action = 'horse2.php' method = 'get'>
                <div class='form-group'>";
        for ($i=0; $i < $horse_total ; $i++) { 
            $j = $i +1; 
            $num = $j * 1.9 + $num;
            echo "<label>馬番".$j."のオッズ</label><input placeholder='".$num."' type = 'text' required='required' name ='".$i."'><br>";
        }
    echo "<input type = 'hidden' name='horse_total' value='".$horse_total."' ><p>※半角英数字のみ</p>";
    echo "<input type = 'submit' value ='賭け金を算出する'><br></div>";
    echo "</form>
        </div>";

?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>