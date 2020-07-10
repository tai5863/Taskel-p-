
<html>
<head><title>ユーザ</title></head>
<body>
<table border="1">
<tr><td>ID</td><td>ユーザ名</td><td>性別</td><td>登録日</td></tr>
<?php
$host = "localhost";
if (!$conn = mysqli_connect($host, "s1911396", "5863")){
    die("MySQL接続エラー.<br />");
}
mysqli_select_db($conn, "s1911396");
mysqli_set_charset($conn, "utf8");
$sql = "SELECT * FROM user_table";
$res = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($res)) {
    print("<tr>");
    print("<td>".$row["user_id"]."</td>");
    print("<td>".$row["name"]."</td>");
    print("<td>".$row["sex"]."</td>");
    print("<td>".$row["regist"]."</td>");
    print("</tr>\n");
}
mysqli_free_result($res);
?>
</table>
</body>
</html>
