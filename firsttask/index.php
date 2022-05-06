<?
$mysqli=new mysqli('localhost', 'root', '', 'tasks'); //Посылаем запрос на сервер MySQL хост-имя_пользователя-пароль-база_данных
?> 
<head> 
    <script 
        src="https://code.jquery.com/jquery-3.6.0.min.js"; // Подключаем фрэймворк jquery для реализации некоторых функций
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="; // Получаем хэш нашего сценария 
        crossorigin="anonymous"> // Отсутствие обмена учетными данными
    </script>
    <script src="formjs.js" type="text/javascript"> // Интегрируем JS файл, Подключаем CSS файл
    </script> 
    <link href="formStyles.css" rel="stylesheet" type="text/css"> 
</head>

<body>

<div id="firstDiv"> 
    <form action="addtask.php" method="post"> 
        <ul>
            <li>Приоритет:</li>
            <li>Текст задачи:</li> 
        </ul>
        <select name="priority"> 
            <option name="set_low" value="Низкий">Низкий</option>
            <option name="set_middle" value="Средний">Средний</option>
            <option name="set_high" value="Высокий">Высокий</option>
        </select>
        <input type="text" name="inputForTask" placeholder="Введите текст..."> 
        <input type="submit" someProperty="nameForUnusualProperty" value="Добавить задачу" name="setButton">
    </form> 
</div>

<div id="secondDiv"> 
    <div>
        <label>Фильтр по приоритету:</label>
        <select class="filterpriority">
            <option name="any" value="Любой">Любой</option>
            <option name="low" value="Низкий">Низкий</option>
            <option name="middle" value="Средний">Средний</option>
            <option name="high" value="Высокий">Высокий</option>
        </select>
        <span id="firstId">Фильтр по статусу:</span> 
        <label for="someCheck1" class="filterText">Активные</label><input type="checkbox" name="someCheck1" checked class="someCheck1">
        <label for="someCheck2" class="filterText">Отмененные</label><input type="checkbox" name="someCheck2" checked  class="someCheck2">
        <label for="someCheck3" class="filterText">Завершенные</label><input type="checkbox" name="someCheck3" checked  class="someCheck3">
        <label id="labelFDate" for="firstButton">Сортировка по дате:</label> 
        <button type="button" name="firstButton" class="buttonForFilter">дата создания
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 384.923 384.923" style="enable-background:new 0 0 384.923 384.923;" xml:space="preserve">
            <g>
                <path id="Arrow_Upward" d="M321.337,122.567L201.046,3.479c-4.776-4.728-12.391-4.547-17.179,0l-120.291,119.1
                    c-4.74,4.704-4.74,12.319,0,17.011c4.752,4.704,12.439,4.704,17.191,0l99.551-98.552v331.856c0,6.641,5.438,12.03,12.151,12.03
                    s12.151-5.39,12.151-12.03V41.025l99.551,98.552c4.74,4.704,12.439,4.704,17.179,0C326.089,134.886,326.089,127.27,321.337,122.567
                    z"/>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            </svg>
            </button>
        <label>Сортировка по приоритету:</label>
        <button type="button" name="secondButton">приоритет 
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 384.923 384.923" style="enable-background:new 0 0 384.923 384.923;" xml:space="preserve">
            <g>
                <path id="Arrow_Upward" d="M321.337,122.567L201.046,3.479c-4.776-4.728-12.391-4.547-17.179,0l-120.291,119.1
                    c-4.74,4.704-4.74,12.319,0,17.011c4.752,4.704,12.439,4.704,17.191,0l99.551-98.552v331.856c0,6.641,5.438,12.03,12.151,12.03
                    s12.151-5.39,12.151-12.03V41.025l99.551,98.552c4.74,4.704,12.439,4.704,17.179,0C326.089,134.886,326.089,127.27,321.337,122.567
                    z"/>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            </svg>
            </button><br>
        <span class="someInput">Поиск задачи по тексту:</span>
        <input type="text" placeholder="Начните вводить текст задачи..." name="someInput">
    </div>
</div>
<div id="thirdDiv">
    <div id="tasksList">
        <?
        $query = 'SELECT * FROM first_table ORDER BY id DESC'; 
        $result = mysqli_query($mysqli, $query); // Запрос к базе данных(подключенная база, запрос)
        while($row = mysqli_fetch_array($result)){  // Присваиваем значение строки из базы данных соответсвующим переменным
            $text = $row['text'];
            $status = $row['status'];
            $date = $row['date'];
            $priority = $row['priority'];
            $id = $row['id'];
        ?>
        <div id="Task" class="<?if($status == '1'){echo 'done';} else if ($status == '2'){echo 'canceled';} else {echo 'active';}?>"> 
            <div class="taskLevel">
                <p><?if($priority == 'Низкий'){echo '<font color="red">';} else if ($priority == 'Средний'){echo '<font color="yellow">';} else {echo '<font color="green">';} echo $priority.'</font>';?></p>
            </div>
            <div class="taskBlock">
                <div class="taskBlockButtons"> 
                    <?if($status != 2){?> 
                    <a href="cancel.php?id=<?echo $id;?>"><div class="taskBlockButtonFirst">
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
 viewBox="0 0 371.23 371.23" style="enable-background:new 0 0 371.23 371.23;" xml:space="preserve">
<polygon points="371.23,21.213 350.018,0 185.615,164.402 21.213,0 0,21.213 164.402,185.615 0,350.018 21.213,371.23 
185.615,206.828 350.018,371.23 371.23,350.018 206.828,185.615 "/>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>

                    </div></a>
                    <?}if($status != 1){?> 
                    <a href="low_priority.php?id=<?echo $id;?>"><div class="taskBlockButtonSecond">
<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

<g id="directional" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
    <g id="arrow-down" fill="#000000">
        <polygon id="Shape" points="6 7 12 13 18 7 20 9 12 17 4 9"></polygon>
    </g>
</g>
</svg>
                    </div></a><?}?>
                </div>
                <div class="taskBlockText1 <?if($status == 1){echo 'withoutKrestik';}elseif($status == 2){echo 'withoutGalochka';};?>" blockid="<?echo $id;?>">
                    <span class="someClass<?echo $id;?> anotherClass"><?echo $text;?></span>
                    <form action="edit.php?id=<?echo $id;?>"  method="POST">
                        <input type="text" value="<?echo $text;?>" class="taskBlockTextEdit<?echo $id;?> normalName" name="someArea">
                    </form>
                </div>  
                <div class="taskBlockText2"><span><?echo $date;?></span>
                </div>
            </div>
            <div privet="<?echo $id;?>" class="taskDelete">
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
 viewBox="0 0 473 473" style="enable-background:new 0 0 473 473;" xml:space="preserve">
<g>
<path d="M324.285,215.015V128h20V38h-98.384V0H132.669v38H34.285v90h20v305h161.523c23.578,24.635,56.766,40,93.477,40
    c71.368,0,129.43-58.062,129.43-129.43C438.715,277.276,388.612,222.474,324.285,215.015z M294.285,215.015
    c-18.052,2.093-34.982,7.911-50,16.669V128h50V215.015z M162.669,30h53.232v8h-53.232V30z M64.285,68h250v30h-250V68z M84.285,128
    h50v275h-50V128z M164.285,403V128h50v127.768c-21.356,23.089-34.429,53.946-34.429,87.802c0,21.411,5.231,41.622,14.475,59.43
    H164.285z M309.285,443c-54.826,0-99.429-44.604-99.429-99.43s44.604-99.429,99.429-99.429s99.43,44.604,99.43,99.429
    S364.111,443,309.285,443z"/>
<polygon points="342.248,289.395 309.285,322.358 276.323,289.395 255.11,310.608 288.073,343.571 255.11,376.533 276.323,397.746 
    309.285,364.783 342.248,397.746 363.461,376.533 330.498,343.571 363.461,310.608 	"/>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>

            </div>
        </div>
        <?}?> 
    </div>
</div>

<div id="modalWindow">
    <div id="window">
        <div id="close">
            <span class="line1"></span>
            <span class="line2"></span>
        </div>
        <p style="text-align:center; width: 100%; margin-top: 100px;">Вы уверены, что хотите удалить эту задачу?</p>
        <div class="buttonsForModal">
            <a><button>Да</button></a>
            <button>Нет</button>
        </div>
    </div>
</div>
<div id="floatWindow">
    <div class="closeWindow">
        <span class="line1"></span>
        <span class="line2"></span>
    </div>
    <div class="alertText">
        <p>Поле с текстом задачи не заполнено</p>
    </div>
</div>
</body>
<?
$mysqli->close();
?>