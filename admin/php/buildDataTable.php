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
    echo ('
      <tr>
        <td class="centered"><span>' . $line['idNew'] . '</span></td>
        <td><span>' . $line['title'] . '</span></td>
        <td><span>' . $line['body'] . '</span></td>
        <td class="centered"><span>' . $line['author'] . '</span></td>
        <td class="centered"><img src="../../images/' . $line['dir_img'] . '"/></td>
        <td class="centered"><span>' . $line['topicCode'] . '</span></td>
        <td class="centered"><a href="../php/edit.php?table=' . $table . '&id=' . $line['idNew'] . '" class="delete"><i class="fas fa-edit"></i></a></td>
        <td class="centered"><a href="../php/deleteFromTable.php?table=' . $table . '&id=' . $line['idNew'] . '" onclick="return confirm(\'Are you sure you want to delete this record?\');"><i class="fas fa-trash"></i></a></td>
      </tr>
    ');
  } else if ($table == 'Topic') {
    echo ('<tr>
    <td class="centered"><span>' . $line['topicCode'] . '</span></td>
    <td class="centered"><span>' . $line['name'] . '</span></td>
    <td class="centered"><a href="../php/edit.php?table=' . $table . '&id=' . $line['topicCode'] . '" class="delete"><i class="fas fa-edit"></i></a></td>
    <td class="centered"><a href="../php/deleteFromTable.php?table=' . $table . '&id=' . $line['topicCode'] . '" onclick="return confirm(\'Are you sure you want to delete this record?\');"><i class="fas fa-trash"></i></a></td>
    </tr>
    ');
  }
}
if ($table == 'News') {
  echo ('<tr class="add" ><td colspan="8" ><a href="../php/add.php?table=News"><i class="fas fa-plus-circle"></i></a></td></tr>');
} else if ($table == 'Topic') {
  echo ('<tr><td class="add" colspan="4"><a href="../php/add.php?table=Topic"><i class="fas fa-plus-circle"></i></a></td></tr>');
}
