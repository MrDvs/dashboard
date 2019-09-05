<?php
require '../DB.php';

$name = $_POST['todo-name'];
$priority = $_POST['priority'];

DB::query('INSERT INTO todos (title, priority, done) VALUES (:title, :priority, :done)',array(':title' => $name,':priority' => $priority, ':done' => 0));

$id = DB::query('SELECT id FROM todos ORDER BY id DESC LIMIT 1');

echo $id[0]['id'];

?>
