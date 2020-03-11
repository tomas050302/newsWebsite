<?php
require_once('../php/lib/config.php');
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$command = 'SELECT username, password FROM admins;';
$result = query($command);

if (isAdmin($username, $password, $result)) {
  $_SESSION['isLogged'] = true;
  echo 'User is now authenticated';
  header("Refresh:1; url=./index.html");
  exit;
} else {
  echo 'User is not authorized';
  header("Refresh:1; url=./login.html");
  exit;
}

function isAdmin($username, $password, $admins)
{
  foreach ($admins as $admin) {
    if ($username == $admin['username'] && $password == $admin['password']) {
      return true;
    }
  }
  return false;
}
