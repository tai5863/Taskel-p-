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
    $mysqli->set_charset("utf8"); //utf8 コードの利用にはこれが必要
}

if(isset($_POST["user_id"]) && ($_POST["user_id"] != "")){
    $user_id = $_POST["user_id"];
}

$sql = "SELECT * FROM user_table WHERE user_table.user_id = ".$user_id."";
$res = $mysqli->query($sql);

print("<table border=\"1\">");
print("<tr><td>ID</td><td>ユーザ名</td><td>性別</td><td>メールアドレス</td><td>登録日</td></tr>");
while($row = $res->fetch_array()) {
    print("<tr>");
    print("<td>".$row["user_id"]."</td>");
    print("<td>".$row["name"]."</td>");
    print("<td>".$row["sex"]."</td>");
    print("<td>".$row["email"]."</td>");
    print("<td>".$row["regist"]."</td>");
    print("</tr>");
}
print("</table>");
$res->free();
?>
</body>
</html>