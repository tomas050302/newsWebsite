<?php
$table = $_GET['table'];

require('../../php/lib/config.php');

$command = 'INSERT INTO ' . $table;

if ($table == 'product') {
  $name = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  if (isPhoto($_FILES['photo'])) {
    $photo = $_FILES['photo'];
    $dir_img = time() . '_' . $photo['name'];
    $fullDir = $dir_site . 'images/' . $dir_img;
  }
  $idFamily = $_POST['idFamily'];
  $state = 1;

  $command .= ' (name, description, price, dir_img, idFamily, state) VALUES 
  ("' . $name . '", "' . $description . '", ' . $price . ', "' . $dir_img . '", ' . $idFamily . ', ' . $state . ');';
  copy($photo['tmp_name'], $fullDir);
} else if ($table == 'family') {
  $name = $_POST['name'];

  $command .= ' (name) VALUES ("' . $name . '");';
}

if (query($command)) {
  echo ('Product added successefully');
  header("Refresh:1; url=../pages/manage.php?table=" . $table);
} else {
  echo ('Error!');
}
