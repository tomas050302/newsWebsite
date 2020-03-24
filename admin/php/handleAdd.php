<?php
$table = $_GET['table'];

require('../../php/lib/config.php');

$command = 'INSERT INTO ' . $table;

if ($table == 'News') {
  $title = $_POST['title'];
  $body = $_POST['body'];
  $author = $_POST['author'];
  if (isPhoto($_FILES['photo'])) {
    $photo = $_FILES['photo'];
    $dir_img = time() . '_' . $photo['name'];
    $fullDir = $dir_site . 'images/' . $dir_img;
  }

  $topicCode = 0;
  foreach ($_POST['topicCodes'] as $key => $line) {
    $topicCode += $line;
  }

  $command .= ' (title, body, author, dir_img, topicCode) VALUES 
  ("' . $title . '", "' . $body . '"," ' . $author . '", "' . $dir_img . '", ' . $topicCode . ');';

  copy($photo['tmp_name'], $fullDir);
} else if ($table == 'Topic') {
  $name = $_POST['name'];

  $command .= ' (name) VALUES ("' . $name . '");';
}

if (query($command)) {
  echo ('New added successefully');
  header("Refresh:1; url=../pages/manage.php?table=" . $table);
} else {
  echo ('Error!');
}
