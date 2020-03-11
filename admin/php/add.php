<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/edit.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <title>Add</title>
</head>

<body>
  <?php
  $table = $_GET['table'];
  ?>
  <form action="handleAdd.php?table=<?php echo $table ?>" method="post" enctype="multipart/form-data">
    <?php
    if ($table == 'product') {
      require('../../php/lib/config.php');
      $command = 'SELECT * FROM family';
      $result = query($command);
      $familiesSelect = "<option value=''>--Select a Family --</option>";

      foreach ($result as $key => $line) {
        $familiesSelect .= '<option value=' . $line['idFamily'] . '>' . $line['name'] . '</option>';
      }

      echo ('<label for="name">Name</label>');
      echo ('<input type="text" name="name"></input><br>');
      echo ('<label for="description">Description</label>');
      echo ('<input type="text" name="description"></input><br>');
      echo ('<label for="price">Price</label>');
      echo ('<input type="number" name="price"></input><br>');
      echo ('<label for="photo">Photo</label>');
      echo ('<input type="file" name="photo"></input><br>');
      echo ('<select name="idFamily">
        ' . $familiesSelect . '
      </select><br>');
    } else if ($table == 'family') {
      echo ('<label for="name">Name</label>');
      echo ('<input type="text" name="name"></input>');
    }
    echo ('<input type="submit" class="submitBtn" value="Adicionar"></input>');
    ?>
  </form>
</body>

</html>
