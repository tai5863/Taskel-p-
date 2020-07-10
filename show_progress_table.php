
<html>
<head><title>進捗</title></head>
<body>
<table border="1">
<tr><td>ID</td><td>タスクID</td><td>進捗</td><td>コメント</td><td>日付</td></tr>
<?php
$host = "localhost";
if (!$conn = mysqli_connect($host, "s1911396", "5863")){
    die("MySQL接続エラー.<br />");
}
mysqli_select_db($conn, "s1911396");
mysqli_set_charset($conn, "utf8");
$sql = "SELECT * FROM progress_table";
$res = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($res)) {
    print("<tr>");
    print("<td>".$row["progress_id"]."</td>");
    print("<td>".$row["task_id"]."</td>");
    print("<td>".$row["progress"]."</td>");
    print("<td>".$row["comment"]."</td>");
    print("<td>".$row["date"]."</td>");
    print("</tr>\n");
}
mysqli_free_result($res);
?>
</table>
</body>
</html>
