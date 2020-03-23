<?
require('lib/config.php');

$command = 'SELECT idNew, title, topicCode FROM News;';
$result = query($command);

$i = 0;
foreach ($result as $key => $line) {
  $arrayOfTopics = decodeBinaryCombination($line['topicCode']);

  if (in_array(1, $arrayOfTopics) && $i < 3) {
    echo ('<li><a href="single-post.php?id=' . $line['idNew'] . '">' . $line['title'] . '</a></li>');
    $i++;
  }
}
