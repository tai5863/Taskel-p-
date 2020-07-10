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

        if(isset($_POST["task_id"]) && ($_POST["task_id"] != "")){
            $task_id = $_POST["task_id"];
        }

        $sql = "SELECT * FROM progress_table WHERE progress_table.task_id = $task_id";
        $res = $mysqli->query($sql);

        print("<h2 class='category_name'>進捗一覧</h2>");
        print("<p class='category_mes'>サインインしたユーザが保有するタスクの進捗を取得し表示します。</p>");
        print("<table class='category_content'>");
        print("<tr><td>コメント</td><td>日付</td><td>削除</td></tr>");
        while($row = $res->fetch_array()) {
            print("<tr>");
            print("<td>".$row["comment"]."</td>");
            print("<td>".$row["date"]."</td>");
            print("
            <td>
                <form class='op_form' action=\"delete_progress.php\" method=\"post\">
                    <input type=\"hidden\" name=\"user_id\" value=\"".$user_id."\">
                    <input type=\"hidden\" name=\"name\" value=\"".$name."\">
                    <input type=\"hidden\" name=\"task_id\" value=\"".$task_id."\">
                    <input type=\"hidden\" name=\"progress_id\" value=\"".$row["progress_id"]."\">
                    <input class='b close' type=\"submit\" name=\"delete\" value=\"捨てる\">
                </form>
            </td>");
            print("</tr>");
        }
        print("</table>");
        echo "<h2 class='category_name'>進捗の追加</h2>";
        print("<p class='category_mes'>サインインしたユーザが保有するタスクの進捗を追加します。</p>");
        print("
            <form class='op_form' action=\"add_progress.php\" method=\"post\">
                <input type=\"hidden\" name=\"user_id\" value=\"".$user_id."\">
                <input type=\"hidden\" name=\"name\" value=\"".$name."\">
                <input type=\"hidden\" name=\"task_id\" value=\"".$task_id."\">
                <table cellspacing='0' class='category_content'>
                    <tr>
                        <td>コメント</td>
                        <td><input type='text' name='comment'></td>
                    </tr>
                    <tr>
                        <td colspan='2' align='center'><input class='b' type='submit' name='submit' value='追加'></td>
                    </tr>
                </table>
            </form>
        ");
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
        color: rgb(40, 40, 40);
        font-weight: 800;
        background-color: rgb(219, 173, 86);
        box-shadow: 1px 1px 3px #333;
        border-radius: 3px;
        padding: 3px;
        cursor: pointer;
    }
</style>
