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

        if(isset($_POST["user_id"]) && ($_POST["user_id"] != "")){
            $user_id = $_POST["user_id"];
        }

        if(isset($_POST["name"]) && ($_POST["name"] != "")){
            $name = $mysqli->escape_string($_POST["name"]);
            $name = str_replace("%", "\%", $name);
        }

        $sql = "SELECT * FROM user_table WHERE user_table.user_id = ".$user_id." AND user_table.name = '".$name."'";
        $res = $mysqli->query($sql);

        if ($res->num_rows == 0) {
            echo "
            <script>
                window.alert('このようなアカウントは存在しません！');
                window.location.href = 'http://turkey.slis.tsukuba.ac.jp/~s1911396/signin.php';
            </script>
            ";
        }

        print("<div class='category_container'>");
        print("<h2 class='category_name'>ユーザ情報</h2>");
        print("<p class='category_mes'>サインインしたユーザの情報取得し表示します。</p>");
        print("<table class='category_content'>");
        print("<tr><td>ID</td><td>ユーザ名</td><td>メールアドレス</td><td>登録日</td></tr>");
        while($row = $res->fetch_array()) {
            print("<tr>");
            print("<td>".$row["user_id"]."</td>");
            print("<td>".$row["name"]."</td>");
            print("<td>".$row["email"]."</td>");
            print("<td>".$row["regist"]."</td>");
            print("</tr>");
        }
        print("</table>");
        print("</div>");
        
        $sql = "SELECT * FROM task_table WHERE task_table.user_id = ".$user_id."";
        $res = $mysqli->query($sql);

        print("<div class='category_container'>");
        print("<h2 class='category_name'>タスク一覧</h2>");
        print("<p class='category_mes'>サインインしたユーザが保有するタスクを取得し表示します。</p>");
        print("<p class='category_mes'>開くを押すと, タスクの進捗を見ることができます。捨てるを押すと, タスクを削除することができます。</p>");
        print("<table class='category_content'>");
        print("<tr><td>タイトル</td><td>タイプID</td><td>登録日</td><td>閲覧</td><td>削除</td></tr>");
        while($row = $res->fetch_array()) {
            print("<tr>");
            print("<td>".$row["title"]."</td>");
            print("<td>".$row["type_id"]."</td>");
            print("<td>".$row["regist"]."</td>");
            print("
            <td>
                <form class='op_form' action=\"progress.php\" method=\"post\">
                    <input type=\"hidden\" name=\"task_id\" value=\"".$row["task_id"]."\">
                    <input class='b open' type=\"submit\" name=\"open\" value=\"開く\">
                </form>
            </td>");
            print("
            <td>
                <form class='op_form' action=\"delete_task.php\" method=\"post\">
                    <input type=\"hidden\" name=\"user_id\" value=\"".$user_id."\">
                    <input type=\"hidden\" name=\"name\" value=\"".$name."\">
                    <input type=\"hidden\" name=\"task_id\" value=\"".$row["task_id"]."\">
                    <input class='b close' type=\"submit\" name=\"delete\" value=\"捨てる\">
                </form>
            </td>");
            print("</tr>");
        }
        print("</table>");
        print("</div>");

        $sql = "SELECT * FROM type_table";
        $res = $mysqli->query($sql);

        print("<div class='category_container'>");
        print("<h2 class='category_name'>タイプ一覧</h2>");
        print("<p class='category_mes'>タスクのタイプを取得し表示します。</p>");
        print("<table class='category_content'>");
        print("<tr><td>ID</td><td>タイプの名前</td><td>タイプの説明</td></tr>");
        while($row = $res->fetch_array()) {
            print("<tr>");
            print("<td>".$row["type_id"]."</td>");
            print("<td>".$row["type_name"]."</td>");
            print("<td>".$row["explanation"]."</td>");
            print("</tr>");
        }
        print("</table>");
        print("</div>");
        $res->free();

        ?>
        <div class='category_container'>
        <h2 class='category_name'>タスクの追加</h2>
        <p class='category_mes'>タスクを追加します。このときにタイプIDを忘れず指定してください。</p>
        <form action="add_task.php" method="post">
            <input type="hidden" name="user_id" value="<?php print("$user_id");?>">
            <input type="hidden" name="name" value="<?php print("$name");?>">
            <table cellspacing="0" class='category_content'>
                <tr>
                    <td>タイプID</td>
                    <td><input type="number" name="type_id"></td>
                </tr>
                <tr>
                    <td>タイトル</td>
                    <td><input type="text" name="title"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input class="b" type="submit" name="submit" value="登録"></td>
                </tr>
            </table>
        </form>
        </div>
        <div class='category_container'>
        <h2 class='category_name'>タイプの追加</h2>
        <p class='category_mes'>タイプを追加します。</p>
        <form action="add_type.php" method="post">
            <input type="hidden" name="user_id" value="<?php print("$user_id");?>">
            <input type="hidden" name="name" value="<?php print("$name");?>">
            <table cellspacing="0" class='category_content'>
                <tr>
                    <td>タイプの名前</td>
                    <td><input type="text" name="type_name"></td>
                </tr>
                <tr>
                    <td>タイプの説明</td>
                    <td><input type="text" name="exp"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input class="b" type="submit" name="submit" value="登録"></td>
                </tr>
            </table>
        </form>
        </div>
        <div class='category_container'>
        <h2 class='category_name'>タイプの編集</h2>
        <p class='category_mes'>タイプを編集します。この時にタイプIDが合致する項目がなければサインインページに飛ばされます。</p>
        <form action="edit_type.php" method="post">
            <input type="hidden" name="user_id" value="<?php print("$user_id");?>">
            <input type="hidden" name="name" value="<?php print("$name");?>">
            <table cellspacing="0" class='category_content'>
                <tr>
                    <td>タイプID</td>
                    <td><input type="text" name="type_id"></td>
                </tr>
                <tr>
                    <td>タイプの名前</td>
                    <td><input type="text" name="type_name"></td>
                </tr>
                <tr>
                    <td>タイプの説明</td>
                    <td><input type="text" name="exp"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input class="b" type="submit" name="submit" value="編集"></td>
                </tr>
            </table>
        </form>
        </div>
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
    .container {
        padding: 0 100px;
        display: flex;
        flex-flow: row wrap;
        justify-content: flex-start;
    }
    .category_container {
        margin: 30px 50px;
    }
    .category_name {
        font-size: 20px;
        color: rgb(50, 50, 50);
    }
    .category_content {
        background-color: rgb(109, 152, 168);
        box-shadow: 3px 3px 3px #999;
        padding: 10px;
        border-radius: 3px; 
        table-layout: fixed;
    }
    .category_content td {
        padding: 7px 10px;
    }
    .op_form {
        margin: 0 auto;
    }
    .b {
        border: none;
        font-weight: 800;
        color: rgb(40, 40, 40);
        background-color: rgb(219, 173, 86);
        box-shadow: 1px 1px 3px #333;
        border-radius: 3px;
        padding: 3px;
        cursor: pointer;
    }
</style>


