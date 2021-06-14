<!doctype html>
<html lang="ja">

<body>
  <?php
  require('db_connect.php');
  $statement = $db->prepare('UPDATE boards SET name = :name, content = :content WHERE id = :id');
  $statement->bindParam(':name', $_POST['update_name'], PDO::PARAM_STR);
  $statement->bindParam(':content', $_POST['update_content'], PDO::PARAM_STR);
  $statement->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
  $statement->execute();
  ?>
  <h2>編集が完了しました。</h2>
  <button onclick="location.href='index.php'">投稿一覧へ戻る</button>
  </main>

</body>

</html>