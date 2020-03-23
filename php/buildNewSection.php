<?php
require('./php/lib/config.php');
require($dir_site . 'php/lib/utils.php');

$command = 'SELECT * FROM News';
$result = query($command);
$topic = isset($_GET['topicCode']) ? $_GET['topicCode'] : 0;

if ($topic == 0) {
  foreach ($result as $key => $line) {
    if ($key < 1) {
      echo ('<div class="col-12 col-lg-7">
              <div class="single-blog-post featured-post">
                <div class="post-thumb">
                    <a href="#"><img src="images/' . $line['dir_img'] . '" alt=""></a>
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
} else {
  foreach ($result as $key => $line) {
    $topicsArray = decodeBinaryCombination($line['topicCode']);

    if (in_array($topic, $topicsArray)) {
      echo ('<div class="col-12 col-lg-7">
              <div class="single-blog-post featured-post">
                <div class="post-thumb">
                    <a href="#"><img src="images/' . $line['dir_img'] . '" alt=""></a>
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
}
