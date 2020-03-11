<?php require('../lib/auth.inc.php');
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



    if ($table == 'family') {
      echo ('
        <th><a href="?order=idFamily&table=family">Id Family</a></th>
        <th><a href="?order=name&table=family">Name</a></th>
      ');
    } else {
      echo ('
        <th><a href="?order=idProduct&table=product">Id Product</a></th>
        <th><a href="?order=name&table=product">Name</a></th>
        <th><a href="?order=description&table=product">Description</a></th>
        <th><a href="?order=price&table=product">Price</a></th>
        <th><a href="?order=dir_img&table=product">Image</a></th>
        <th><a href="?order=idFamily&table=product">Family</a></th>
        <th><a href="?order=state&table=product">State</a></th>
      ');
    }
    echo ('<th colspan="2">Actions</th>');

    require($dir_site . 'admin/php/buildDataTable.php');
    ?>

  </table>
</body>

</html>
