<?php
$mysqli = new mysqli("localhost","root","","mysqli");

// Check connection
if ($mysqli->connect_errno) {
  echo "Kết nối mysqli lỗi " . $mysqli->connect_error;
  exit();
}

?>