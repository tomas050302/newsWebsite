<?php
require('./php/lib/config.php');

$command = 'SELECT * FROM News';
$result = query($command);
$topic = isset($_GET['topicCode']) ? $_GET['topicCode'] : 0;

if ($topic == 0) {
  foreach ($result as $key => $line) {
    echo ('<div class="col-12 col-lg-7">
            <div class="single-blog-post featured-post">
              <div class="post-thumb">
                  <a href="#"><img src="img/' . $line['dir_img'] . '" alt=""></a>
                </div>
                <div class="post-data">
                  <a href="#" class="post-catagory">' . echoTopicsOfNew($line) . '</a>
                  <a href="#" class="post-title">
                    <h6>' . $line['title'] . '</h6>
                  </a>
                  <div class="post-meta">
                    <p class="post-author">By <a href="#">' . $line['author'] . '</a></p>
                    <p class="post-excerp">' . $line['body'] . '</p>
                  </div>
                </div>
              </div>
          </div>');
  }
}

function echoTopicsOfNew($new)
{
  $topicCode = $new['topicCode'];

  $arrayOfTopics = decodeBinaryCombination(31);


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
