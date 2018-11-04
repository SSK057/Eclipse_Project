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
       echo htmlspecialchars($_SESSION['Qval'], ENT_QUOTES, "UTF-8");
    ?>
  <br>
    <?php
       foreach ($_SESSION['Aval'] as $value) {
           echo $value;
       }
    ?>
  </form>
</body>
</html>