<?php
function printLine($array)
{
  foreach ($array as $key => $line) {
    echo '<pre>';
    print_r($line);
    echo '</pre>';
  }
}

function query($command)
{
  require('config.php');
  require($dir_site . '/php/lib/connection.php');

  $result = $connection->query($command);

  return $result;
}

function numRows($query)
{
  return mysqli_num_rows($query);
}

function isPhoto($file)
{
  $acceptedTypes = array('image/jpeg', 'image/jpg', 'image/png');

  return in_array($file['type'], $acceptedTypes);
}

function decodeBinaryCombination($n)
{
  $array = array();
  for ($i = 1; $i <= $n; $i *= 2) {
    if ($i & $n) {
      array_push($array, ($i & $n));
      $n -= $i;
    }
  }
  return $array;
  //TODO: Ver se isto funciona
}
