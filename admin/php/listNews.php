<?php
require('../../php/lib/config.php');
require('../../php/lib/utils.php');

$command = 'SELECT * FROM News;';
$result = query($command);

foreach ($result as $key => $line) {
  echo ('<div class="newContainer">');
  echo ('<h1>Id: ' . $line['idNew'] . '</h1>');
  echo ('<img src="../../images/' . $line['dir_img'] . '"/>');
  echo ('<h2>Title: ' . $line['title'] . '</h2>');
  echo ('<p>Body: ' . $line['body'] . '</p>');
  echo ('<h3>By: ' . $line['author'] . '</h3>');
  echo ('<h2>Topics: ' . echoTopicsOfNew($line) . '</h2>');
  echo ('</div>');
}
