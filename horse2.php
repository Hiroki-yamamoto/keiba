<?php
    session_start() ;
    echo $_SESSION["id"] ;
function UpdateTotal($bet){
    $total_bet = array_sum($bet);
    return $total_bet;
}

?>

<html xmlns="http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <!-- Bootstrap -->
    <link href="BootStrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div class="warpper container">
        <div class="title">
            競馬で勝てるように賭け金を配分メーカー
        </div>

<?php
    $horse_total = $_GET['horse_total'];
    echo "<label class='horse_total'>出馬数:".$horse_total."</label></br>";

    $odds = array();

    $odds[0] = $_GET['0'];
    $odds[1] = $_GET['1'];
    $odds[2] = $_GET['2'];
    $odds[3] = $_GET['3'];
    $odds[4] = $_GET['4'];
    $odds[5] = $_GET['5'];
    $odds[6] = $_GET['6'];
    $odds[7] = $_GET['7'];
    $odds[8] = $_GET['8'];
    $odds[9] = $_GET['9'];
    $odds[10] = $_GET['10'];
    $odds[11] = $_GET['11'];
    $odds[12] = $_GET['12'];
    $odds[13] = $_GET['13'];
    $odds[14] = $_GET['14'];
    $odds[15] = $_GET['15'];
    $odds[16] = $_GET['16'];
    $odds[17] = $_GET['17'];
    $odds[18] = $_GET['18'];

    $bet = array();
        for($i=0; $i < $horse_total ; $i++){ 
    $bet[$i]=100; 
}
    $back = array();
    for ($i=0; $i < $horse_total ; $i++) { 
        $back[$i] = $bet[$i]*$odds[$i];
    }
    
    $total_bet = UpdateTotal($bet);//合計賭け金を算出する
    
    for ($j=0; $j <100000 ; $j++) { 
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
        $win_money[$i] = $back[$i] - $total_bet;
    }   



    echo "    <table class='table table-striped table-hover'>
                <thead>
                    <tr>
                        <th>馬番</th>
                        <th>賭け金</th>
                        <th>オッズ</th>
                        <th>払戻額</th>
                        <th>勝ち分</th>
                        <th>勝率</th>
                    </tr><tbody>";

    for ($i=0; $i < $horse_total ; $i++) {
        $j = $i + 1; 
            // 勝率計算
            if(1 <= $odds[$i] && $odds[$i] < 1.4){
                $win_probability[$i] = 60;
            }else if(1.4 <= $odds[$i] && $odds[$i] <= 1.9){
                $win_probability[$i] = 45;
            }else if(2 <= $odds[$i] && $odds[$i] <= 2.9){
                $win_probability[$i] = 31;
            }else if(3 <= $odds[$i] && $odds[$i] <= 3.9){
                $win_probability[$i] = 23;
            }else if(4 <= $odds[$i] && $odds[$i] <= 4.9){
                $win_probability[$i] = 18;
            }else if(5 <= $odds[$i] && $odds[$i] <= 5.9){
                $win_probability[$i] = 14;
            }else if(6 <= $odds[$i] && $odds[$i] <= 6.9){
                $win_probability[$i] = 13;
            }else if(7 <= $odds[$i] && $odds[$i] < 9.9){
                $win_probability[$i] = 10;
            }else if(9.9 <= $odds[$i] && $odds[$i] < 14.9){
                $win_probability[$i] = 7.2;
            }else if(14.9 <= $odds[$i] && $odds[$i] < 19.9){
                $win_probability[$i] = 5;
            }else if(19.9 <= $odds[$i] && $odds[$i] < 29.9){
                $win_probability[$i] = 3.5;
            }else if(29.9 <= $odds[$i] && $odds[$i] < 49.9){
                $win_probability[$i] = 1.7;
            }else if(50.9 <= $odds[$i] && $odds[$i] <99.9){
                $win_probability[$i] = 1.2;
            }else if(99.9 <= $odds[$i] && $odds[$i] < 200){
                $win_probability[$i] = 0.1;
            }else if(200 <= $odds[$i]){
                $win_probability[$i] = 0;
            }else{
                $win_probability[$i] = 0;
            
            }


        echo "<tr><td>".$j."</td><td>".$bet[$i]."円</td>
                  <td>".$odds[$i]."倍</td><td>".$back[$i]."円</td>
                  <td class='win'>".$win_money[$i]."円</td><td>".$win_probability[$i]."%</td></tr>";
        
    }
    echo "</tbody></thead></table>合計賭け金:".$total_bet."<br>
            <div class='container'>
                <form action = 'index.php' method = 'get'>
                    <div class='form-group'><input type = 'hidden'>
                        <input type = 'submit' value ='TOPページへ戻る'><br>
                    </div>
                </form>
            </div>";

    for ($i=0; $i < $horse_total ; $i++) { 
        if($win_money[$i] < 0){
            echo "今回のレースに必勝法はありませんでした。";
            break;
        }
    }

?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>