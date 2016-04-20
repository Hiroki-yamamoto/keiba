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

function UpdateTotal($bet){
    $total_bet = array_sum($bet);
    return $total_bet;
}


//出馬数
    $horse_total = $_GET['horse_total'];
    echo "<label class='horse_total'>出馬数:".$horse_total."<br></label>";
//それぞれの倍率(オッズ)
    $odds = array();

    $odds[0] = $_GET['0'];
    $odds[1] = $_GET['1'];
    $odds[2] = $_GET['2'];
    $odds[3] = $_GET['3'];
    $odds[4] = $_GET['4'];
    $odds[5] = $_GET['5'];
    $odds[6] = $_GET['6'];
    $odds[7] = $_GET['7'];


    echo "オッズ0:".$odds[0]."<br>";
    echo "オッズ1:".$odds[1]."<br>";
    echo "オッズ2:".$odds[2]."<br>";
    echo "オッズ3:".$odds[3]."<br >";


    echo "<div class="container">
            <form action = 'horse.php' method = 'get'>";
                for ($i=0; $i < $horse_total ; $i++) { 
                    echo "馬番".$i."のオッズ<input type = 'text' name ='".$i."'><br>";
                }
                echo "<input type = 'submit' value ='賭け金を算出する'><br>
            </form>
        </div>";



    $bet = array();
        for($i=0; $i < $horse_total ; $i++){ 
    $bet[$i]=100; 
}
    $back = array();
    for ($i=0; $i < $horse_total ; $i++) { 
        $back[$i] = $bet[$i]*$odds[$i];
        echo "backループ作動済み";
    }
    
    $total_bet = UpdateTotal($bet);//合計賭け金を算出する
    
    for ($j=0; $j <100 ; $j++) { 
        for ($i=0; $i < $horse_total ; $i++) { 
            if($back[$i] < $total_bet){
                $bet[$i] = $bet[$i] + 100;
                $back[$i] = $bet[$i]*$odds[$i];
                //echo "賭け金".$i.":".$bet[$i]."<br>";
            }
        }
    $total_bet = UpdateTotal($bet);
    }



    $total_bet = UpdateTotal($bet);//合計賭け金を算出する
    for ($i=0; $i < $horse_total ; $i++) { 
        echo "馬".$i."の賭け金".$bet[$i]."→払い戻し額".$back[$i]."円<br>";
        
    }
    echo "合計賭け金:".$total_bet."<br>";

echo "oddsの中身:";
var_dump($odds);
echo "<br>betの中身:";
var_dump($bet);
?>  
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>