<?php
require_once '../../php/lib/config.php';

# Script to use FontAwsome Icons
echo ('<script src="https://kit.fontawesome.com/729ca500a9.js" crossorigin="anonymous"></script>');

$orderBy = isset($_GET['order']) ? ' ORDER BY ' . $_GET['order'] : '';
$table = $_GET['table'];

$command = 'SELECT * FROM ' . $table . $orderBy . ';';
$result = query($command);

foreach ($result as $key => $line) {
  if ($table == 'News') {
    $command = 'SELECT name FROM ' . $table . ' WHERE idFamily = ' . $line['idFamily'] . ';';
    $familyResult = query($command);

    $family = mysqli_fetch_array($familyResult)[0];

    echo ('
      <tr>
        <td class="centered"><span>' . $line['idProduct'] . '</span></td>
        <td><span>' . $line['name'] . '</span></td>
        <td><span>' . $line['description'] . '</span></td>
        <td class="centered"><span>' . $line['price'] . '</span></td>
        <td class="centered"><img src="../../images/' . $line['dir_img'] . '"/></td>
        <td class="centered"><span>' . $family . '</span></td>
        <td class="centered"><span>' . $line['state'] . '</span></td>
        <td class="centered"><a href="../php/edit.php?table=' . $table . '&id=' . $line['idProduct'] . '" class="delete"><i class="fas fa-edit"></i></a></td>
        <td class="centered"><a href="../php/deleteFromTable.php?table=' . $table . '&id=' . $line['idProduct'] . '" onclick="return confirm(\'Are you sure you want to delete this record?\');"><i class="fas fa-trash"></i></a></td>
      </tr>
    ');
  } else if ($table == 'Topics') {
    echo ('<tr>
    <td class="centered"><span>' . $line['idFamily'] . '</span></td>
    <td class="centered"><span>' . $line['name'] . '</span></td>
    <td class="centered"><a href="../php/edit.php?table=' . $table . '&id=' . $line['idFamily'] . '" class="delete"><i class="fas fa-edit"></i></a></td>
    <td class="centered"><a href="../php/deleteFromTable.php?table=' . $table . '&id=' . $line['idFamily'] . '" onclick="return confirm(\'Are you sure you want to delete this record?\');"><i class="fas fa-trash"></i></a></td>
    </tr>
    ');
  }
}
if ($table == 'News') {
  echo ('<tr class="add" ><td colspan="9" ><a href="../php/add.php?table=product">Add</a></td></tr>');
} else if ($table == 'Topics') {
  echo ('<tr><td class="add" colspan="4"><a href="../php/add.php?table=family">Add</a></td></tr>');
}
