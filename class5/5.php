<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8"/>
  <title>時間潰し教えて</title>
</head>
<body background="https://thumb.photo-ac.com/20/20172af990e51d6f4d87bb03dd128908_t.jpeg">

  <div style="background:#ffffff; text-align:center; padding:10px; border-radius:10px; border: 2px dotted #556b2f;width:500px;">
    <b style="text-align:center">Web 掲示板 時間潰し教えて</b><br>

  </div>

  <pre>

    <div style="background:#ffffff; text-align:center; padding:10px; border-radius: 10px; border: 2px dotted #556b2f;width:500px;">
      <?php
      $d = date("Y/m/d H:i:s");
      echo "現在の日時：$d<br>";

      $f = fopen("counter.txt", "r+");
      $counter = rtrim(fgets($f));
      $counter++;
      rewind($f);
      fputs($f, $counter);
      fclose($f);
      echo '    あなたは '.$counter.'人目の訪問者です。<br>';
      ?>
    </div>


    <div style="background:#ffffff; padding:10px; border-radius: 10px; border: 2px dotted #556b2f;width:800px;">
      <?php
      $f = file_get_contents("5.txt");
      $item = explode("\n<END>\n", $f);
      for($i = 0; $i < count($item) - 1; $i++){
        list($header, $body) = explode("\n", $item[$i], 2);
        list($date, $ip, $host, $name) = explode(',', $header);
        list($text, $imgfile) = explode("\n<IMG>\n", $body);
        echo '<font color="#008000"><b>'.($i+1).": $date $host($ip) $name</b></font>\n";
        echo "$body\n";
      }

      $delete = $_POST["delete"];
      $f = fopen("5.txt", "w");
      fwrite($f, "\n");

    // ファイルを閉じる
    fclose($f);
    ?>
        </div>
      </pre>

      <div style="background:#ffffff; padding:50px; border-radius: 0px; border: 2px dotted #556b2f;width:700px;">
        <form enctype="multipart/form-data" action="5_submit.php" method="POST">
    	    <input type="text" name="name" size=20 placeholder="氏名"><br><br>
          <textarea name="body" rows=4 cols=80 placeholder="コメント"></textarea><br><br>
          添付ファイル：<input type="file" name="upfile" size=100><br><br><br>
          <input type="submit" value=" 記事を投稿する "> <br><br><br><br>
        </form>

        <form action="5.php" method="post">
        <input type="submit" name="submit" value = "リセット">
        </form>
        </div>


      </body>
      </html>
