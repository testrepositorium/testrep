<?
$id = $_GET['id'];
$text = $_POST['someArea'];
$mysqli=new mysqli('localhost', 'root', '', 'tasks');
$mysqli->query("UPDATE first_table SET text = '$text' WHERE id = '$id'"); // Меняем содержимое базы, заменив содержимое введенных данных в инпут
echo "<meta http-equiv='Refresh' content='0; URL=/index.php'>";   
$mysqli->close();
?>
