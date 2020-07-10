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

        if(isset($_POST["type_id"]) && ($_POST["type_id"] != "")){
            $type_id = $_POST["type_id"];
        }

        if(isset($_POST["type_name"]) && ($_POST["type_name"] != "")){
            $type_name = $_POST["type_name"];
            $type_name = str_replace("%", "\%", $type_name);
        }

        if(isset($_POST["exp"]) && ($_POST["exp"] != "")){
            $exp = $mysqli->escape_string($_POST["exp"]);
            $exp = str_replace("%", "\%", $exp);
        }

        $sql = "SELECT * FROM type_table WHERE type_table.type_id = $type_id";
        $res = $mysqli->query($sql);

        if ($res->num_rows == 0) {
            echo "
            <script>
                window.alert('このようなタイプは存在しません！');
                window.location.href = 'http://turkey.slis.tsukuba.ac.jp/~s1911396/signin.php';
            </script>
            ";
        } else {
            $sql = "UPDATE type_table SET type_name = '$type_name', explanation = '$exp' WHERE type_id = '$type_id'";
            $res = $mysqli->query($sql);

            if ($res == 1) {
                echo "
                <form class='op_form' action=\"user.php\" method=\"post\">
                    <input type=\"hidden\" name=\"user_id\" value=\"".$user_id."\">
                    <input type=\"hidden\" name=\"name\" value=\"".$name."\">
                    <input id='back' class='b back' type=\"submit\" name=\"back\" value=\"戻る\" style='display: none;'>
                </form>
                <script>
                    window.alert('正しく編集できました！');
                    let eBack = document.getElementById('back');
                    eBack.click();
                </script>
                ";
            } else {
                echo "
                <script>
                    window.alert('正しく編集できませんでした...');
                    window.location.href = 'http://turkey.slis.tsukuba.ac.jp/~s1911396/signin.php';
                </script>
                ";
            }
        }
        $res->free();
        ?>
    </body>
</html>
