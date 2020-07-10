<html>
    <head>
        <title>Taskhel(p)</title>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap" rel="stylesheet">
    </head>

    <body>
    <?php
    $host = "localhost";
    $mysqli = new mysqli($host, "s1911396", "5863", "s1911396");
    
    if ($mysqli->connect_error) {
    die("MySQL 接続エラー.<br />");
    } else {
        $mysqli->set_charset("utf8");
    }

    if(isset($_POST["user_id"]) && ($_POST["user_id"] != "")){
        $user_id = $_POST["user_id"];
    }

    if(isset($_POST["name"]) && ($_POST["name"] != "")){
        $name = $mysqli->escape_string($_POST["name"]);
        $name = str_replace("%", "\%", $name);
    } 

    if(isset($_POST["progress_id"]) && ($_POST["progress_id"] != "")){
        $progress_id = $_POST["progress_id"];
    }

    if(isset($_POST["task_id"]) && ($_POST["task_id"] != "")){
        $task_id = $_POST["task_id"];
    }

    $sql = "DELETE FROM progress_table WHERE progress_table.progress_id = ".$progress_id."";
    $res = $mysqli->query($sql);

    if ($res == 1) {
        echo "
        <form class='op_form' action=\"progress.php\" method=\"post\">
            <input type=\"hidden\" name=\"user_id\" value=\"".$user_id."\">
            <input type=\"hidden\" name=\"name\" value=\"".$name."\">
            <input type=\"hidden\" name=\"task_id\" value=\"".$task_id."\">
            <input id='back' class='b back' type=\"submit\" name=\"back\" value=\"戻る\" style='display: none;'>
        </form>
        <script>
            window.alert('正しく削除できました！');
            let eBack = document.getElementById('back');
            eBack.click();
        </script>
        ";
    } else {
        echo "
        <script>
            window.alert('正しく削除できませんでした...');
            window.location.href = 'http://turkey.slis.tsukuba.ac.jp/~s1911396/signin.php';
        </script>
        ";
    }
    $res->free();
    ?>
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
        background-color: rgb(43, 46, 49);
        height: 10%;
        display: flex;
        justify-content: left;
        padding: 0 50px;
        align-items: center;
    }
    .tile {
        color: rgb(240, 240, 240);
        font-size: 30px;
    }
</style>
