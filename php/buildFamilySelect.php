<?php
require('lib/config.php');

$command = 'SELECT idFamily, name FROM family;';
$result = query($command);

echo ('<h1 class="familyHeader">Families</h1>');

echo ('<a class="family" href="?">Any</a>');
foreach ($result as $key => $line) {
  echo ('<a class="family" href="?idFamily=' . $line['idFamily'] . '">' . $line['name'] . '</a>');
}
