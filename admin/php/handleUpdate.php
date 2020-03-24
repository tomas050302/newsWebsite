<?php
require_once '../../php/lib/config.php';

$table = $_POST['table'];
if ($table == 'Topic') {
  $topicCode = $_POST['topicCode'];
  $name = $_POST['name'];

  $command = 'UPDATE ' . $table . ' SET name="' . $name . '" WHERE topicCode=' . $topicCode . ';';
} else if ($table == 'News') {
  $idNew = $_POST['idNew'];
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

  echo $command = 'UPDATE ' . $table . ' SET  title="' . $title . '", body="' . $body . '", author="' . $author . '", 
  dir_img="' . $dir_img . '", topicCode=' . $topicCode . ' WHERE idNew=' . $idNew . ';';
}

$tempSelect = 'SELECT dir_img FROM News WHERE idNew=' . $idNew . ';';
$oldFileName = mysqli_fetch_array(query($tempSelect))['dir_img'];

unlink($dir_site . 'images/' . $oldFileName);
copy($photo['tmp_name'], $fullDir);

if (query($command)) {
  echo ('<h1>Event Updated successfully</h1>');
  header("Refresh:.5; url=../pages/manage.php?table=" . $table);
}
