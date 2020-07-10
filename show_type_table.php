
<html>
<head><title>タスクタイプ</title></head>
<body>
<table border="1">
<tr><td>ID</td><td>タイプ名</td><td>説明</td></tr>
<?php
$host = "localhost";
if (!$conn = mysqli_connect($host, "s1911396", "5863")){
    die("MySQL接続エラー.<br />");
}
mysqli_select_db($conn, "s1911396");
mysqli_set_charset($conn, "utf8");
$sql = "SELECT * FROM type_table";
$res = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($res)) {
    print("<tr>");
    print("<td>".$row["type_id"]."</td>");
    print("<td>".$row["type_name"]."</td>");
    print("<td>".$row["explanation"]."</td>");
    print("</tr>\n");
}
mysqli_free_result($res);
?>
</table>
</body>
</html>
