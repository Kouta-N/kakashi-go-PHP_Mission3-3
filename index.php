<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <title>Mission3-3</title>
</head>

<body>
  <main>
    <h1>掲示板</h1>
    <h2>新規投稿</h2>
    <form action="input_do.php" method="post">
      name: <input name="input_name" type="text" /><br />
      投稿内容<br />
      <textarea name="content" cols="30" rows="10"></textarea><br />
      <button type="submit">投稿</button>
    </form>
    <h2>投稿内容</h2>
    <?php
      require('db_connect.php');
      $boards = $db->prepare('SELECT * FROM boards ORDER BY id ASC');
      $boards->execute();
      $fetched_boards = $boards->fetchAll(PDO::FETCH_ASSOC);
      $counter=1;
    ?>
    <article>
      <?php
      foreach ($fetched_boards as $board) {
        echo '<hr>No: '.$counter.'<br>名前:' . $board['name'] . '<br>投稿内容: '.$board['content'].'<br><br>';
        ?>
      <a href="update.php?id=<?php print($board['id']);?>"><button>編集</button></a><br>
      <a href="delete.php?id=<?php print($board['id']);?>"><button>削除</button></a>
      <hr><br>
      <?php 
        $counter++;
      } 
      ?>
    </article>
  </main>
</body>

</html>