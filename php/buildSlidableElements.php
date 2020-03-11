<?php
require_once('lib/config.php');

$command = 'SELECT name, dir_img FROM product WHERE state=1;';

$result = query($command);

foreach ($result as $key => $line) {
  if ($key <= $nOfImagesInHomePage - 1) {
    echo ('
    <li><a href="#">' . $line['name'] . '</a><img src="images/' . $line['dir_img'] . '" alt=""></li>
  ');
  }
}
