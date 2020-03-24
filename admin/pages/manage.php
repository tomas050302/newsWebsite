<?php
require('../lib/auth.inc.php');
$table = $_GET['table'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/manage.css">
  <title>Manage <?php echo $table ?></title>
</head>

<body>
  <table>
    <?php
    require('../../php/lib/config.php');

    if ($table == 'Topic') {
      echo ('
        <th><a href="?order=topicCode&table=Topics">Topic Code</a></th>
        <th><a href="?order=name&table=Topics">Name</a></th>
      ');
    } elseif ($table == 'News') {
      echo ('
        <th><a href="?order=idNew&table=News">Id New</a></th>
        <th class="big"><a href="?order=title&table=News">Title</a></th>
        <th class="huge"><a href="?order=body&table=News">Body</a></th>
        <th class="big"><a href="?order=author&table=News">Author</a></th>
        <th><a href="?order=dir_img&table=News">Image</a></th>
        <th><a href="?order=topicCode&table=News">topicCode</a></th>
      ');
    }
    echo ('<th class="half" colspan="2">Actions</th>');

    require($dir_site . 'admin/php/buildDataTable.php');
    ?>

  </table>
</body>

</html>
