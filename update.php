<?php require('db_connect.php'); ?>
<!doctype html>
<html lang="ja">

<body>
  <?php
    if (isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) {
        $id = $_REQUEST['id'];
        $boards = $db->prepare('SELECT * FROM boards WHERE id=?');
        $boards->execute(array($id));
        $fetched_board = $boards->fetch();
    }
?>
  <h2>編集ページ</h2>
  <form action="update_do.php" method="post">
    <input type="hidden" name="id" value="<?php print($id); ?>">
    name: <input name="update_name" type="text" value="<?php print($fetched_board['name']) ?>"><br />
    投稿内容<br />
    <textarea name="update_content" cols="30" rows="10"><?php print($fetched_board['content'])?></textarea><br>
    <button type=" submit">登録する</button>
    <button><a href="index.php">戻る</a></button>
  </form>
</body>

</html>