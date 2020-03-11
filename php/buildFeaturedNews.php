<?
require('lib/config.php');

$command = 'SELECT idNew, title FROM News WHERE topicCode = 1 LIMIT 3;';
$result = query($command);

foreach ($result as $key => $line) {
  echo ('<li><a href="single-post.php?id=' . $line['idNew'] . '">' . $line['title'] . '</a></li>');
}
