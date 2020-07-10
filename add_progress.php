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
            $name = $_POST["name"];
        }

        if(isset($_POST["task_id"]) && ($_POST["task_id"] != "")){
            $task_id = $_POST["task_id"];
        }

        if(isset($_POST["comment"]) && ($_POST["comment"] != "")){
            $comment = $mysqli->escape_string($_POST["comment"]);
            $comment = str_replace("%", "\%", $comment);
        }

        $date = date("Ymd");
        $progress = 0;
        
        $sql = "INSERT INTO progress_table(task_id, progress, comment, date) VALUES($task_id, $progress, '$comment', $date)";
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
                window.alert('正しく登録できました！');
                let eBack = document.getElementById('back');
                eBack.click();
            </script>
            ";
        } else {
            echo "
            <script>
                window.alert('正しく登録できませんでした...');
                window.location.href = 'http://turkey.slis.tsukuba.ac.jp/~s1911396/signin.php';
            </script>
            ";
        }
        $res->free();
        ?>
    </body>
</html>
