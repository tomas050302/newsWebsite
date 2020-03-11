<?php
if (isset($_GET['table'])) {
  $table = $_GET['table'];
  $primaryKey = $table == 'family' ? 'idFamily' : 'idProduct';
  $id = $_GET['id'];
  require_once '../../php/lib/config.php';

  $command = 'DELETE FROM ' . $table . ' WHERE ' . $primaryKey . '=' . $id . ';';

  if (query($command)) {
    echo 'Successfully deleted!';
  } else {
    echo ('Error!');
  }

  header("Refresh:1; url=../pages/manage.php?table=" . $table);
}
