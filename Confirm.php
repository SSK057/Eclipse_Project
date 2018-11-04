<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Confirm Form</title>
</head>
<body>
  <form action="" method="POST">
  <h1>入力内容の確認</h1>
  <p>問題と回答の選択肢は以下の内容でよろしいですか？</p>
    <?php
       session_start();
       $Qval = $_SESSION['Qval'];
       echo '問題文：' . $Qval . '<br>';
       foreach ($_SESSION['Aval'] as $key => $value) {
           $Aval[$key] = $value;
           echo '選択肢' . $key . '：' . $value . '<br>';
       }
    ?>
  <input type="submit" value="Send!">
  <?php
       if($_SERVER['REQUEST_METHOD'] === 'POST') {
       try {
           $sql = new PDO('mysql:host=localhost;dbname=QandA;charset=utf8',
                          'root','root');
           echo '接続成功';
           $sql -> query('INSERT INTO questions(question, Answer1, Answer2, Answer3, Answer4)
                         VALUES("' . $Qval . '","' . $Aval[0] . '","' . $Aval[1] . '","' .
                         $Aval[2] . '","' . $Aval[3] . '")');
           #将来的に成功判定を導入
           http_response_code(301);
           header( "Location:./result.php");
           exit;
       } catch (PDOException $e) {
           echo '接続エラー:{' . $e -> getmessage() . '}';
       }
       $sql = null;
   }
  ?>
  </form>
</body>
</html>