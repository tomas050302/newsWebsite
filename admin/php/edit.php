<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/edit.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <title>Edit</title>
</head>

<body>
  <form action="handleUpdate.php" method="post" enctype="multipart/form-data">
    <?php
    require('../../php/lib/config.php');

    $table = $_GET['table'];
    $primaryKey = $table == 'News' ? 'idNew' : 'topicCode';

    $id = $_GET['id'];

    $command = 'SELECT * FROM ' . $table . ' WHERE ' . $primaryKey . '=' . $id . ';';
    $result = mysqli_fetch_array(query($command));

    if ($table == 'Topic') {
      echo ('
        <h1>Family</h1>
        <h2>Id: ' . $result['idFamily'] . '</h2>
          <input type="hidden" name="idFamily" value=' . $result['idFamily'] . '></input>
          <input type="hidden" name="table" value= ' . $table . '></input>
          <label for="name">Name</label>
          <input type="text" name="name" value=' . $result['name'] . '></input>
        ');
    } else if ($table == 'News') {
      echo ('
        <h1>New</h1>
        <h2>Id: ' . $result['idNew'] . '</h2>
        <input type="hidden" name="table" value= ' . $table . '></input>
        <input type="hidden" name="idNew" value=' . $result['idNew'] . '></input>
        <label for="title">Title</label>
        <input type="text" name="title" value="' . $result['title'] . '"></input><br>
        <label for="body">Body</label>
        <textarea name="body">' . $result['body'] . '</textarea><br>
        <label for="author">Author</label>
        <input type="text" name="author" value="' . $result['author'] . '"></input><br>
        <label for="image">Image</label>
        <input type="file" name="photo" value="' . $result['dir_img'] . '"></input><br>
      ');
      $command = 'SELECT * FROM Topic';
      $topicResult = query($command);
      $topicComboString = "";

      $arrayOfTopics = decodeBinaryCombination($result['topicCode']);

      foreach ($topicResult as $key => $line) {
        if (in_array($line['topicCode'], $arrayOfTopics)) {
          $topicComboString .= '<input name="topicCodes[]" checked type="checkbox" value=' . $line['topicCode'] . '>' . $line['name'] . '</input>';
        } else {
          $topicComboString .= '<input name="topicCodes[]" type="checkbox" value=' . $line['topicCode'] . '>' . $line['name'] . '</input>';
        }
      }

      echo ($topicComboString . '<br>');
    }

    echo ('<input type="submit" class="submitBtn" value="Salvar"></input>')
    ?>
  </form>
</body>

</html>
