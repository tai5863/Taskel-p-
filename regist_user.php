<html>
    <head>
        <title>Taskhel(p)</title>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap" rel="stylesheet">
    </head>

    <body>
    <div class="header">
        <h1 class="tile">Taskhel(p)</h1>
    </div>
    <div class="container">
    <?php
    $host = "localhost";
    $mysqli = new mysqli($host, "s1911396", "5863", "s1911396");
    if ($mysqli->connect_error) {
    die("MySQL 接続エラー.<br />");
    } else {
        $mysqli->set_charset("utf8");
    }

    if(isset($_POST["name"]) && ($_POST["name"] != "")){
        $name = $mysqli->escape_string($_POST["name"]);
        $name = str_replace("%", "\%", $name);
    }

    if(isset($_POST["sex"]) && ($_POST["sex"] != "")){
        $sex = $mysqli->escape_string($_POST["sex"]);
    }

    if(isset($_POST["email"]) && ($_POST["email"] != "")){
        $email = $mysqli->escape_string($_POST["email"]);
        $email = str_replace("%", "\%", $email);
    }

    $date = date("Ymd");
    
    $sql = "INSERT INTO user_table(name, sex, email, regist) VALUES('".$name."', $sex, '".$email."', $date)";
    $res = $mysqli->query($sql);

    if($res == 1){
        //成功
        $sql = "SELECT * FROM user_table WHERE user_table.name = '".$name."'";
        $res = $mysqli->query($sql);

        while($row = $res->fetch_array()) {
            echo "
            <div class='mes_container'>
                <h1 class='mes welcome'>ようこそ！".$row["name"]."さん</h1>
                <p class='mes id'>あなたのユーザIDは".$row["user_id"]."です。忘れないように控えて置きましょう。</p>
                <a href='http://turkey.slis.tsukuba.ac.jp/~s1911396/signin.php'>サインインページに戻る</a>
            </div>";
        }

    }
    else{
        //失敗
        echo "
        <script>
            window.alert('登録に失敗しました！');
            window.location.href = 'http://turkey.slis.tsukuba.ac.jp/~s1911396/signin.php';
        </script>
        ";
    }
    
    $res->free();

    ?>
    </div>
    </body>
</html>

<style>
    body {
        margin: 0;
        background-color: rgb(240, 240, 240);
        color: black;
        font-family: 'Noto Sans JP', sans-serif;
    }
    .header{
        height: 30%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .tile {
        font-size: 120px;
    }
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .signup {
        position: relative;
    }
    .ac_signup {
        margin: 10px 0;
        font-size: 15px;
        font-weight: 800;
        border: none;
        color: rgb(40, 40, 40);
        background-color: rgb(219, 173, 86);
        border-radius: 3px;
        padding: 3px;
        cursor: pointer;
    }
</style>
