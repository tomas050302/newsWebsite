<?php
require_once('lib/config.php');
require_once('config/config.php');

if (isset($_GET['idFamily'])) {
  $command = 'SELECT idProduct, name, description, dir_img FROM product WHERE state = 1 AND idFamily=' . $_GET['idFamily'] . ';';
} else {
  $command = 'SELECT idProduct, name, description, dir_img FROM product WHERE state = 1;';
}
$result = query($command);

foreach ($result as $key => $line) {
  if ($key <= $nOfImagesInHomePage) {
    echo ('
    <li class="one-fourth">
      <p><a href="productTemplate.php?id=' . $line['idProduct'] . '"><img src="images/' . $line['dir_img'] . '" alt="" width="210" height="145" class="portfolio-img pretty-box"></a> </p>
      <h4><a href="">' . $line['name'] . '</a></h4>
      <p>' . $line['description'] . '</p>
    </li>ouse SteelSeries
  ');
  }
}
