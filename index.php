<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <!-- Title -->
  <title>The News Paper - News &amp; Lifestyle Magazine Template</title>

  <!-- Favicon -->
  <link rel="icon" href="img/core-img/favicon.ico">

  <!-- Core Stylesheet -->
  <link rel="stylesheet" href="style.css">

</head>

<body>
  <!-- ##### Header Area Start ##### -->
  <header class="header-area">

    <!-- Top Header Area -->
    <div class="top-header-area">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="top-header-content d-flex align-items-center justify-content-between">
              <!-- Logo -->
              <div class="logo">
                <a href="index.html"><img src="img/core-img/logo.png" alt=""></a>
              </div>

              <!-- Login Search Area -->
              <div class="login-search-area d-flex align-items-center">
                <!-- Search Form -->
                <div class="search-form">
                  <form action="#" method="post">
                    <input type="search" name="search" class="form-control" placeholder="Search">
                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Navbar Area -->
    <div class="newspaper-main-menu" id="stickyMenu">
      <div class="classy-nav-container breakpoint-off">
        <div class="container">
          <!-- Menu -->
          <nav class="classy-navbar justify-content-between" id="newspaperNav">

            <!-- Logo -->
            <div class="logo">
              <a href="index.html"><img src="img/core-img/logo.png" alt=""></a>
            </div>

            <!-- Navbar Toggler -->
            <div class="classy-navbar-toggler">
              <span class="navbarToggler"><span></span><span></span><span></span></span>
            </div>

            <!-- Menu -->
            <div class="classy-menu">

              <!-- close btn -->
              <div class="classycloseIcon">
                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
              </div>

              <!-- Nav Start -->
              <div class="classynav">
                <ul>
                  <?php
                  require('./php/lib/config.php');

                  $command = 'SELECT * FROM Topic';
                  $result = query($command);

                  $active = isset($_GET['topicCode']) ? $_GET['topicCode'] : 0;

                  if ($active == 0) {
                    echo ('<li class="active"><a href="index.php  ">Home</a></li>');
                  } else {
                    echo ('<li><a href="index.php ">Home</a></li>');
                  }

                  foreach ($result as $key => $line) {
                    if ($line['topicCode'] == $active) {
                      echo ('<li class="active"><a href="index.php?topicCode=' . $line['topicCode'] . '">' . $line['name'] . '</a></li>');
                    } else {
                      echo ('<li><a href="index.php?topicCode=' . $line['topicCode'] . '">' . $line['name'] . '</a></li>');
                    }
                  }
                  ?>
                </ul>
              </div>
              <!-- Nav End -->
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ##### Header Area End ##### -->

  <!-- ##### Hero Area Start ##### -->
  <div class="hero-area">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-lg-8">
          <!-- Breaking News Widget -->
          <div class="breaking-news-area d-flex align-items-center">
            <div class="news-title">
              <p>Breaking News</p>
            </div>
            <div id="breakingNewsTicker" class="ticker">
              <ul>
                <?php include('php/buildFeaturedNews.php'); ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ##### Hero Area End ##### -->

  <!-- ##### Featured Post Area Start ##### -->
  <div class="featured-post-area">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-8">
          <div class="row">
            <?php require('./php/buildNewSection.php') ?>
          </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
          <!-- Single Featured Post -->
          <div class="single-blog-post small-featured-post d-flex">
            <div class="post-thumb">
              <a href="#"><img src="img/bg-img/19.jpg" alt=""></a>
            </div>
            <div class="post-data">
              <a href="#" class="post-catagory">Finance</a>
              <div class="post-meta">
                <a href="#" class="post-title">
                  <h6>Pellentesque mattis arcu massa, nec fringilla turpis eleifend id.</h6>
                </a>
              </div>
            </div>
          </div>

          <!-- Single Featured Post -->
          <div class="single-blog-post small-featured-post d-flex">
            <div class="post-thumb">
              <a href="#"><img src="img/bg-img/20.jpg" alt=""></a>
            </div>
            <div class="post-data">
              <a href="#" class="post-catagory">Politics</a>
              <div class="post-meta">
                <a href="#" class="post-title">
                  <h6>Sed a elit euismod augue semper congue sit amet ac sapien.</h6>
                </a>
              </div>
            </div>
          </div>

          <!-- Single Featured Post -->
          <div class="single-blog-post small-featured-post d-flex">
            <div class="post-thumb">
              <a href="#"><img src="img/bg-img/21.jpg" alt=""></a>
            </div>
            <div class="post-data">
              <a href="#" class="post-catagory">Health</a>
              <div class="post-meta">
                <a href="#" class="post-title">
                  <h6>Pellentesque mattis arcu massa, nec fringilla turpis eleifend id.</h6>
                </a>
              </div>
            </div>
          </div>

          <!-- Single Featured Post -->
          <div class="single-blog-post small-featured-post d-flex">
            <div class="post-thumb">
              <a href="#"><img src="img/bg-img/22.jpg" alt=""></a>
            </div>
            <div class="post-data">
              <a href="#" class="post-catagory">Finance</a>
              <div class="post-meta">
                <a href="#" class="post-title">
                  <h6>Augue semper congue sit amet ac sapien. Fusce consequat.</h6>
                </a>
              </div>
            </div>
          </div>

          <!-- Single Featured Post -->
          <div class="single-blog-post small-featured-post d-flex">
            <div class="post-thumb">
              <a href="#"><img src="img/bg-img/23.jpg" alt=""></a>
            </div>
            <div class="post-data">
              <a href="#" class="post-catagory">Travel</a>
              <div class="post-meta">
                <a href="#" class="post-title">
                  <h6>Pellentesque mattis arcu massa, nec fringilla turpis eleifend id.</h6>
                </a>
              </div>
            </div>
          </div>

          <!-- Single Featured Post -->
          <div class="single-blog-post small-featured-post d-flex">
            <div class="post-thumb">
              <a href="#"><img src="img/bg-img/24.jpg" alt=""></a>
            </div>
            <div class="post-data">
              <a href="#" class="post-catagory">Politics</a>
              <div class="post-meta">
                <a href="#" class="post-title">
                  <h6>Augue semper congue sit amet ac sapien. Fusce consequat.</h6>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ##### Featured Post Area End ##### -->

  <!-- ##### Popular News Area Start ##### -->
  <div class="popular-news-area section-padding-80-50">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-8">
          <div class="section-heading">
            <h6>Popular News</h6>
          </div>

          <div class="row">

            <!-- Single Post -->
            <div class="col-12 col-md-6">
              <div class="single-blog-post style-3">
                <div class="post-thumb">
                  <a href="#"><img src="img/bg-img/12.jpg" alt=""></a>
                </div>
                <div class="post-data">
                  <a href="#" class="post-catagory">Finance</a>
                  <a href="#" class="post-title">
                    <h6>Dolor sit amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales placer. Sed
                      varius leo ac...</h6>
                  </a>
                  <div class="post-meta d-flex align-items-center">
                  </div>
                </div>
              </div>
            </div>

            <!-- Single Post -->
            <div class="col-12 col-md-6">
              <div class="single-blog-post style-3">
                <div class="post-thumb">
                  <a href="#"><img src="img/bg-img/13.jpg" alt=""></a>
                </div>
                <div class="post-data">
                  <a href="#" class="post-catagory">Finance</a>
                  <a href="#" class="post-title">
                    <h6>Dolor sit amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales placer. Sed
                      varius leo ac...</h6>
                  </a>
                  <div class="post-meta d-flex align-items-center">
                  </div>
                </div>
              </div>
            </div>

            <!-- Single Post -->
            <div class="col-12 col-md-6">
              <div class="single-blog-post style-3">
                <div class="post-thumb">
                  <a href="#"><img src="img/bg-img/14.jpg" alt=""></a>
                </div>
                <div class="post-data">
                  <a href="#" class="post-catagory">Finance</a>
                  <a href="#" class="post-title">
                    <h6>Dolor sit amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales placer. Sed
                      varius leo ac...</h6>
                  </a>
                  <div class="post-meta d-flex align-items-center">
                  </div>
                </div>
              </div>
            </div>

            <!-- Single Post -->
            <div class="col-12 col-md-6">
              <div class="single-blog-post style-3">
                <div class="post-thumb">
                  <a href="#"><img src="img/bg-img/15.jpg" alt=""></a>
                </div>
                <div class="post-data">
                  <a href="#" class="post-catagory">Finance</a>
                  <a href="#" class="post-title">
                    <h6>Dolor sit amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales placer. Sed
                      varius leo ac...</h6>
                  </a>
                  <div class="post-meta d-flex align-items-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 col-lg-4">
          <div class="section-heading">
            <h6>Info</h6>
          </div>
          <!-- Popular News Widget -->
          <div class="popular-news-widget mb-30">
            <h3>4 Most Popular News</h3>

            <!-- Single Popular Blog -->
            <div class="single-popular-post">
              <a href="#">
                <h6><span>1.</span> Amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales.</h6>
              </a>
              <p>April 14, 2018</p>
            </div>

            <!-- Single Popular Blog -->
            <div class="single-popular-post">
              <a href="#">
                <h6><span>2.</span> Consectetur adipiscing elit. Nam eu metus sit amet odio sodales placer.</h6>
              </a>
              <p>April 14, 2018</p>
            </div>

            <!-- Single Popular Blog -->
            <div class="single-popular-post">
              <a href="#">
                <h6><span>3.</span> Adipiscing elit. Nam eu metus sit amet odio sodales placer. Sed varius leo.</h6>
              </a>
              <p>April 14, 2018</p>
            </div>

            <!-- Single Popular Blog -->
            <div class="single-popular-post">
              <a href="#">
                <h6><span>4.</span> Eu metus sit amet odio sodales placer. Sed varius leo ac...</h6>
              </a>
              <p>April 14, 2018</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ##### Popular News Area End ##### -->

  <!-- ##### Footer Area Start ##### -->
  <footer class="footer-area">

    <!-- Main Footer Area -->
    <div class="main-footer-area">
      <div class="container">
        <div class="row">

          <!-- Footer Widget Area -->
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="footer-widget-area mt-80">
              <!-- Footer Logo -->
              <div class="footer-logo">
                <a href="index.html"><img src="img/core-img/logo.png" alt=""></a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Bottom Footer Area -->
      <div class="bottom-footer-area">
        <div class="container h-100">
          <div class="row h-100 align-items-center">
            <div class="col-12">
              <!-- Copywrite -->
              <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                <script>
                  document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made
                with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
            </div>
          </div>
        </div>
      </div>
  </footer>
  <!-- ##### Footer Area Start ##### -->

  <!-- ##### All Javascript Files ##### -->
  <!-- jQuery-2.2.4 js -->
  <script src="js/jquery/jquery-2.2.4.min.js"></script>
  <!-- Popper js -->
  <script src="js/bootstrap/popper.min.js"></script>
  <!-- Bootstrap js -->
  <script src="js/bootstrap/bootstrap.min.js"></script>
  <!-- All Plugins js -->
  <script src="js/plugins/plugins.js"></script>
  <!-- Active js -->
  <script src="js/active.js"></script>
</body>

</html>
