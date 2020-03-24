<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/edit.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <title>Add</title>
</head>

<body>
  <?php
  $table = $_GET['table'];
  ?>
  <form action="handleAdd.php?table=<?php echo $table ?>" method="post" enctype="multipart/form-data">
    <?php
    if ($table == 'News') {
      require('../../php/lib/config.php');
      $command = 'SELECT * FROM Topic';
      $result = query($command);
      $topicComboString = "";

      foreach ($result as $key => $line) {
        $topicComboString .= '<input name="topicCodes[]" type="checkbox" value=' . $line['topicCode'] . '>' . $line['name'] . '</input>';
      }

      echo ('<label for="title">Title</label>');
      echo ('<input type="text" name="title" required></input><br>');
      echo ('<label for="body">Body</label>');
      echo ('<textarea name="body" required></textarea><br>');
      echo ('<label for="text">Author</label>');
      echo ('<input type="text" name="author" required></input><br>');
      echo ('<label for="photo">Photo</label>');
      echo ('<input type="file" name="photo" required></input><br>');
      echo ($topicComboString . '<br>');
    } else if ($table == 'Topics') {
      echo ('<label for="name">Name</label>');
      echo ('<input type="text" name="name"></input>');
    }
    echo ('<input type="submit" class="submitBtn" value="Adicionar"></input>');
    ?>
  </form>
</body>

</html>
