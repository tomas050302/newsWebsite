<?php
require_once '../../php/lib/config.php';

$table = $_POST['table'];
if ($table == 'family') {
  $idFamily = $_POST['idFamily'];
  $name = $_POST['name'];

  $command = 'UPDATE ' . $table . ' SET name="' . $name . '" WHERE idFamily=' . $idFamily . ';';
} else if ($table == 'product') {
  $idProduct = $_POST['idProduct'];
  $name = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  if (isPhoto($_FILES['photo'])) {
    $photo = $_FILES['photo'];
    $dir_img = time() . '_' . $photo['name'];
    $fullDir = $dir_site . 'images/' . $dir_img;
  }
  $idFamily = $_POST['idFamily'];

  $command = 'UPDATE ' . $table . ' SET  name="' . $name . '", description="' . $description . '", price=' . $price . ', 
  dir_img="' . $dir_img . '", idFamily=' . $idFamily . ', state=1 WHERE idProduct=' . $idProduct . ';';
}

$tempSelect = 'SELECT dir_img FROM product WHERE idProduct=' . $idProduct . ';';
$oldFileName = mysqli_fetch_array(query($tempSelect))['dir_img'];

unlink($dir_site . 'images/' . $oldFileName);
copy($photo['tmp_name'], $fullDir);

if (query($command)) {
  echo ('<h1>Event Updated successfully</h1>');
  header("Refresh:.5; url=../pages/manage.php?table=" . $table);
}
