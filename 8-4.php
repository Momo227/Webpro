<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8"/>
</head>
<body background="https://~">
<br>

<div style="text-align:center; background:#ffffff; padding:10px; border-radius: 10px; border: 2px dotted #123456;width:1000px;">

<img src="./eigo/pose_dance_ukareru_woman.png">

<?php
 session_start();
 if( $_POST['word'] == $_SESSION['answer'] ){
 echo "正解です。<br>";
 $con = mysql_connect('localhost','アカウント','') or die("接続失敗");
 mysql_select_db('DB') or die("選択失敗");
 mysql_query('SET NAMES utf8', $con);
 $level = $_SESSION['level'];
 $id = $_SESSION['id'];
 $date = date("Y-m-d H:i:s");
 $sql = "INSERT INTO user(level, id, dt1) VALUES('$level','$id','$date')";
 $res = mysql_query($sql, $con) or die("エラー");
 mysql_close($con);
 }else{
 echo "不正解です。<br>";
 echo "正解：";
 echo $_SESSION['answer'];
 }
 session_unset();
?>
<br>
<img src="./~~.png">

<a href="javascript:history.back()">戻る</a>
</div>
</body>
</html>
