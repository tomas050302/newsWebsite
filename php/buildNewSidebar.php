<?php
require('./php/lib/config.php');
require_once($dir_site . 'php/lib/utils.php');

$command = 'SELECT * FROM News;';
$result = query($command);
$topic = isset($_GET['topicCode']) ? $_GET['topicCode'] : 0;

if ($topic == 0) {
  foreach ($result as $key => $line) {
    echo ('<div class="single-blog-post small-featured-post d-flex">
            <div class="post-thumb">
              <a href="#"><img src="images/' . $line['dir_img'] . '" alt=""></a>
            </div>
            <div class="post-data">
              <a href="#" class="post-catagory">' . echoTopicsOfNew($line) . '</a>
              <div class="post-meta">
                <a href="#" class="post-title">
                  <h6>' . $line['title'] . '</h6>
                </a>
              </div>
            </div>
          </div>');
  }
} else {
  foreach ($result as $key => $line) {
    $topicsArray = decodeBinaryCombination($line['topicCode']);

    if (in_array($topic, $topicsArray)) {
      echo ('<div class="single-blog-post small-featured-post d-flex">
                <div class="post-thumb">
                  <a href="#"><img src="images/' . $line['dir_img'] . '" alt=""></a>
                </div>
                <div class="post-data">
                  <a href="#" class="post-catagory">' . echoTopicsOfNew($line) . '</a>
                  <div class="post-meta">
                    <a href="#" class="post-title">
                      <h6>' . $line['title'] . '</h6>
                    </a>
                  </div>
                </div>
              </div>');
    }
  }
}
