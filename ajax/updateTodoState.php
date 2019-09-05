<?php
require '../DB.php';

$id = $_POST['id'];
$done = $_POST['done'];

DB::query('UPDATE todos SET done = :done WHERE id = :id', array(':id' => $id, ':done' => $done));

?>
