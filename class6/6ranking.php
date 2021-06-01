<?php
if( isset($_GET['_a']) ){
 $file = file("6.txt");
 foreach($file as $f){
 list($date, $name, $score) = explode(',', rtrim($f));
 $db[$date.','.$name] = $score;
 }
 asort($db); //タイムが短い順にソートする
 foreach($db as $key => $val) {
 echo "$key,$val\n";
 }
}else if( isset($_GET['_d']) ){
 $file = file("6.txt");
 foreach($file as $f){
 list($date, $name, $score) = explode(',', rtrim($f));
 list($day, $time) = explode(' ', $date);
  if( $day == date('y/m/d') ){
 $db[$date.','.$name] = $score;
 }
 asort($db); //タイムが短い順にソートする
}
 foreach($db as $key => $val) {
 echo "$key,$val\n";
 }
}else if( isset($_GET['_m']) ){
 $file = file("6.txt");
 foreach($file as $f){
 list($date, $name, $score) = explode(',', rtrim($f));
 list($y, $m, $time) = explode('/', $date);
  if( $y.'/'.$m == date('y/m') ){
 $db[$date.','.$name] = $score;
 }
 asort($db); //タイムが短い順にソートする
}
 foreach($db as $key => $val) {
 echo "$key,$val\n";
 }
}
?>
