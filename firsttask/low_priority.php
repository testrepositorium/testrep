<?
$id = $_GET['id'];
$mysqli=new mysqli('localhost', 'root', '', 'tasks');
$mysqli->query("UPDATE first_table SET status = 2  WHERE id = '$id'"); // Отменяем задачу, меняем у нее статус
echo "<meta http-equiv='Refresh' content='0; URL=/index.php'>";   
$mysqli->close();
?>