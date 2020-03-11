<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/edit.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <title>Edit</title>
</head>

<body>
  <form action="handleUpdate.php" method="post" enctype="multipart/form-data">
    <?php
    require('../../php/lib/config.php');

    $table = $_GET['table'];
    $primaryKey = $table == 'product' ? 'idProduct' : 'idFamily';

    $id = $_GET['id'];

    $command = 'SELECT * FROM ' . $table . ' WHERE ' . $primaryKey . '=' . $id . ';';
    $result = mysqli_fetch_array(query($command));

    if ($table == 'family') {
      echo ('
        <h1>Family</h1>
        <h2>Id: ' . $result['idFamily'] . '</h2>
          <input type="hidden" name="idFamily" value=' . $result['idFamily'] . '></input>
          <input type="hidden" name="table" value= ' . $table . '></input>
          <label for="name">Name</label>
          <input type="text" name="name" value=' . $result['name'] . '></input>
        ');
    } else if ($table == 'product') {
      echo ('
        <h1>Product</h1>
        <h2>Id: ' . $result['idProduct'] . '</h2>
        <input type="hidden" name="idProduct" value=' . $result['idProduct'] . '></input>
        <input type="hidden" name="table" value= ' . $table . '></input>
        <label for="name">Name</label>
        <input type="text" name="name" value="' . $result['name'] . '"></input>
        <label for="description">Description</label>
        <input type="text" name="description" value="' . $result['description'] . '"></input>
        <label for="price">Price</label>
        <input type="number" name="price" value=' . $result['price'] . '></input>
        <label for="image">Image</label>
        <input type="file" name="photo" value="' . $result['dir_img'] . '"></input>
        <select name="idFamily">
      ');
      $command = 'SELECT * FROM family';
      $familyResult = query($command);
      $familiesSelect = '<option value="">--Select a Family--</option>';

      foreach ($familyResult as $key => $line) {
        if ($line['idFamily'] == $result['idFamily']) {
          $familiesSelect .= '<option value="' . $line['idFamily'] . '" selected="selected">' . $line['name'] . '</option>';
        } else {
          $familiesSelect .= '<option value="' . $line['idFamily'] . '">' . $line['name'] . '</option>';
        }
      }
      echo ($familiesSelect . '</select><br>');
    }

    echo ('<input type="submit" class="submitBtn" value="Salvar"></input>')
    ?>
  </form>
</body>

</html>
