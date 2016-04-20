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
        <div class="container">
            <form action = "horse.php" method = "get">
                <div class="form-group">
                    <label>出走馬数を入力してください</label>
                    <input type = "text" name ="horse_total" required="required" placeholder="18頭以下で入力してください">
                    <input type = "submit" value ="頭"><br>
                    <p>※半角英数字のみ </p>
                </div>    
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>