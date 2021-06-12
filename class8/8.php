<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8"/>
</head>
<body background="https://~">

<div style="text-align:center; background:#ffffff; padding:10px; border-radius: 10px; border: 2px dotted #123456;width:100px;">
<img src="./eigo/school_text_eitango.png">学習サービス
</div>

<div style="text-align:center; background:#ffffff; padding:10px; border-radius: 10px; border: 2px dotted #123456;width:1000px;">
<b><font color="blue">英和辞典</font></b><br>
<form action="8-1.php" method="POST">
単語: <input type="text" name="word" size=20><br>
<input type="submit" value="意味を表示する">
</form>
</div>
<br>

<div style="text-align:center; background:#ffffff; padding:10px; border-radius: 10px; border: 2px dotted #123456;width:1000px;">
<b><font color="blue">和英辞典</font></b><br>
<form action="8-3.php" method="POST">
単語: <input type="text" name="meaning" size=20><br>
<input type="submit" value="単語を表示する">
</form>
</div>

<img src="./~~.png">
<br>
<br>

<div style="text-align:center; background:#ffffff; padding:10px; border-radius: 10px; border: 2px dotted #123456;width:1000px;">
<b><font color="blue">語彙力テスト(英単語から日本語)</font></b><br>
<form action="8-2.php" method="POST">
<?php
 session_start();
 $con = mysql_connect('localhost','アカウント','') or die("接続失敗");
 mysql_select_db('DB') or die("選択失敗");
 mysql_query('SET NAMES utf8', $con);
 $sql = "SELECT * FROM user WHERE dt1 is not null";
 $res = mysql_query($sql, $con) or die("エラー");
 while ($db = mysql_fetch_assoc($res)) {
 $d[$db['level'] * 1000 + $db['id'] * 1000 - 1] = 1;
 }
 echo "あなたの得点：".count($d)."<br>";
 while(1){
 $r = rand(1000, 5999);
 if( !isset($d[$r]) ) break;
 }
 $level = (int)($r / 1000);
 $id = $r % 1000 + 1;
 $sql = "SELECT * FROM svl5000 WHERE level=$level and id=$id";
 $res = mysql_query($sql, $con) or die("エラー");
 $db = mysql_fetch_assoc($res);
 echo $db['word']."の意味は下記の中のどれでしょうか？<br>";
 $meaning = $db['meaning'];
 $rp = rand(1, 5);
 $_SESSION['level'] = $level;
 $_SESSION['id'] = $id;
 $_SESSION['word'] = $word;
 $_SESSION['answer'] = $rp;
 for($i = 1; $i <= 5; $i++){
 if( $i == $rp ) {
 echo $i.". ".$meaning."<br>";
 }else{
 $r = rand(1000,5999);
 $level = (int)($r / 1000);
 $id = $r % 1000 + 1;
 $sql = "SELECT * FROM svl5000 WHERE level=$level and id=$id";
 $res = mysql_query($sql, $con) or die("エラー");
 $db = mysql_fetch_assoc($res);
 echo $i.". ".$db['meaning']."<br>";
 }
 }
 mysql_close($con);
?>
<input type="radio" name="r" value="1">1
<input type="radio" name="r" value="2">2
<input type="radio" name="r" value="3">3
<input type="radio" name="r" value="4">4
<input type="radio" name="r" value="5">5
<input type="submit" value="解答する">
</form>
</div>

<br>
<br>


<div style="text-align:center; background:#ffffff; padding:10px; border-radius: 10px; border: 2px dotted #123456;width:1000px;">
<b><font color="blue">語彙力テスト(日本語から英単語)</font></b><br>
<form action="8-4.php" method="POST">
<?php
 session_start();
 $con = mysql_connect('localhost','アカウント','') or die("接続失敗");
 mysql_select_db('DB') or die("選択失敗");
 mysql_query('SET NAMES utf8', $con);
 $sql = "SELECT * FROM user WHERE dt1 is not null";
 $res = mysql_query($sql, $con) or die("エラー");
 while ($db = mysql_fetch_assoc($res)) {
 $d[$db['level'] * 1000 + $db['id'] * 1000 - 1] = 1;
 }
 echo "あなたの得点：".count($d)."<br>";
 while(1){
 $r = rand(1000, 5999);
 if( !isset($d[$r]) ) break;
 }
 $level = (int)($r / 1000);
 $id = $r % 1000 + 1;
 $sql = "SELECT * FROM svl5000 WHERE level=$level and id=$id";
 $res = mysql_query($sql, $con) or die("エラー");
 $db = mysql_fetch_assoc($res);
 echo $db['meaning']."はなんでしょう？<br>";
 $word = $db['word'];
 $_SESSION['level'] = $level;
 $_SESSION['id'] = $id;
 $_SESSION['answer'] = $word;

 mysql_close($con);
?>
単語: <input type="text" name="word" size=20><br>
<input type="submit" value="解答する">
</form>
</div>

</body>
</html>
