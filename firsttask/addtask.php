<?
$mysqli=new mysqli('localhost', 'root', '', 'tasks'); //Подключаем базу данных
$set_low = $_POST['priority']; // Создаем переменную, которая будет хранить информацию о нашем приоритете ['priority'] - имя Селекта
if ($set_low == 'Низкий'){ // Находим счетчки приоритета - нужен для удобной сортировки по приоритету
    $priority_int = 1;
} else if ($set_low == 'Средний'){
    $priority_int = 2;
} else if ($set_low == 'Высокий'){
    $priority_int = 3;
}
$set_date = date('d.m.y H:i'); //Создаем переменную для даты отправки запроса в БД
$set_value = $_POST['inputForTask']; // Создаем переменную для отправки значения инпута для запроса 
if($_POST['setButton']){ //При нажатии на кнопку...
    $mysqli->query("INSERT INTO first_table(`text`, `date`, `priority`,`priority_int`) VALUES('$set_value','$set_date', '$set_low', '$priority_int')");
    echo "<meta http-equiv='Refresh' content='0; URL=/index.php'>";   // После завершения выполнения запроса обновляем страницу и перемещаем ее на якорь (нашу основную html страницу)
}
$mysqli->close();  // Закрытие запроса
?>