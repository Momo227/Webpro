<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8"/>
</head>
<body background="https://~">

<div style="text-align:center; background:#ffffff; padding:10px; border-radius: 10px; border: 2px dotted #123456;width:1000px;">
<b>和英辞典</b><br>
<img src="./~~.png">

<?php
$con = mysql_connect('localhost','アカウント','') or die("接続失敗");
mysql_select_db('DB') or die("選択失敗");
mysql_query('SET NAMES utf8', $con);
$meaning = $_POST['meaning'];
$meaning = addslashes($meaning);
$sql = "SELECT * FROM svl5000 WHERE meaning = '$meaning'";
$res = mysql_query($sql, $con) or die("エラー");
while ($db = mysql_fetch_assoc($res)) {
  echo "<table border=1><tr><td>意味</td><td>${db['meaning']}</td></tr>";
  echo "<tr><td>レベル</td><td>${db['level']}</td></tr>";
  echo "<tr><td>英単語</td><td>${db['word']}</td></tr></table>";



}
mysql_close($con);
?>

<img src="./~~.png">
<br>
<a href="javascript:history.back()">戻る</a>
</div>
</body>
</html>
