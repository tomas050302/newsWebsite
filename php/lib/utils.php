<?php
function echoTopicsOfNew($new)
{
  $arrayOfTopics = decodeBinaryCombination($new['topicCode']);

  $command = 'SELECT * FROM Topic';
  $result = query($command);

  $string = '';
  foreach ($result as $key => $topic) {
    if (in_array($topic['topicCode'], $arrayOfTopics)) {
      $string .= $topic['name'] . ' | ';
    }
  }
  return substr($string, 0, strlen($string) - 2);
}
