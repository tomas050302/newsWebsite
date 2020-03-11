<?php
require('../../php/lib/config.php');

$command = 'SELECT * FROM product WHERE state = 1;';
$result = query($command);


foreach ($result as $key => $line) {
  $command = 'SELECT name FROM family WHERE idFamily = ' . $line['idFamily'] . ';';
  $familyResult = query($command);

  $family = mysqli_fetch_array($familyResult)[0];

  echo ('<div class="product">');
  echo ('<h1>Id: ' . $line['idProduct'] . '</h1>');
  echo ('<img src="../../images/' . $line['dir_img'] . '"/>');
  echo ('<h2>Name: ' . $line['name'] . '</h2>');
  echo ('<p>Description: ' . $line['description'] . '</p>');
  echo ('<h3>Price: ' . $line['price'] . '</h3>');
  echo ('<h2>Family: ' . $family . '</h2>');
  echo ('</div>');
}
