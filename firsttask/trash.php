<?
$id = $_GET['id'];
$mysqli=new mysqli('localhost', 'root', '', 'tasks');
$mysqli->query("DELETE FROM first_table WHERE id = '$id'");
echo "<meta http-equiv='Refresh' content='0; URL=/index.php'>";   
$mysqli->close();
?>