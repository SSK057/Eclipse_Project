<?php
#何かが投稿されたら実行
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Aform = array_fill(0, 4, '');
    $Qval = '';
    $Aval = array_fill(0, 4, '');
    $err = false;
    $Aformsearch = array_search(false, $_POST['Aform']);
    if(empty($_POST['Qform']) === false && $Aformsearch === false) {
        $Qval = $_POST['Qform'];
        $Aval = $_POST['Aform'];
        $err = true;
    } else {
        echo '全ての入力フォームを入力してください。';
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Input Form</title>
</head>
<body>
  <form action="" method="POST">
    <textarea cols="60" rows="10" name="Qform" placeholder="問題文を入力"> </textarea>
    <br>

    <input type="text" name="Aform[0]" placeholder="回答1を入力"
    value="<?php echo htmlspecialchars($Aform[0], ENT_QUOTES, 'UTF-8'); ?>">
    <input type="text" name="Aform[1]" placeholder="回答2を入力"
    value="<?php echo htmlspecialchars($Aform[1], ENT_QUOTES, 'UTF-8'); ?>">
    <input type="text" name="Aform[2]" placeholder="回答3を入力"
    value="<?php echo htmlspecialchars($Aform[2], ENT_QUOTES, 'UTF-8'); ?>">
    <input type="text" name="Aform[3]" placeholder="正解を入力"
    value="<?php echo htmlspecialchars($Aform[3], ENT_QUOTES, 'UTF-8'); ?>">

    <input type="submit" value="Send!">
    <?php
       session_start();
       if ($err) {
           $_SESSION['Qval'] = htmlspecialchars($Qval, ENT_QUOTES, "UTF-8");
           foreach($Aval as $key => $value) {
               $_SESSION['Aval'][$key] = $value;
           }
           #入力内容確認画面に遷移
           http_response_code(301);
           header( "Location:./Confirm.php");
           exit;
       }
    ?>
  </form>
</body>
</html>