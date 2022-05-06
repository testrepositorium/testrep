<?
$mysqli=new mysqli('localhost', 'root', '', 'tasks');
$ftype = $_GET['ftype'];
if($ftype==1){
    if($_POST['age']==1)$query = 'SELECT * FROM first_table ORDER BY id ASC';
    else $query = 'SELECT * FROM first_table ORDER BY id DESC'; 
} else if ($ftype ==2){
    $selected = $_POST['selected'];
    if($selected == 'Любой')$query = "SELECT * FROM first_table";
    else $query = "SELECT * FROM first_table WHERE priority = '$selected'"; 
} else if ($ftype ==3){
    $check = $_POST['check'];
    if($check == 1)$query = "SELECT * FROM first_table";
    else if($check == 2)$query = "SELECT * FROM first_table WHERE (status = 1 OR status = 2)";
    else if($check == 3)$query = "SELECT * FROM first_table WHERE status = 1";
    else if($check == 4)$query = "SELECT * FROM first_table WHERE (status = 0 OR status = 2)";
    else if($check == 5)$query = "SELECT * FROM first_table WHERE (status = 0 OR status = 1)";
    else if($check == 6)$query = "SELECT * FROM first_table WHERE status = 2";
    else if($check == 7)$query = "SELECT * FROM first_table WHERE status = 0";
    else $query = "SELECT * FROM first_table WHERE status = 100";
} else if($ftype == 4){
    $priority = $_POST['priority'];
    if($priority == 1)$query = "SELECT * FROM first_table ORDER BY priority_int ASC";
    else $query = "SELECT * FROM first_table ORDER BY priority_int DESC";
} else if ($ftype ==5){
    $search = $_POST['search'];
    $search = mb_eregi_replace("[^a-zа-яё0-9 ]", '', $search);
    $search = trim($search);
    $query = "SELECT * FROM first_table WHERE `text` LIKE '%{$search}%'";
} 
$result = mysqli_query($mysqli, $query);
while($row = mysqli_fetch_array($result)){
    $id=$row['id'];
    $text = $row['text'];
    $status = $row['status'];
    $date = $row['date'];
    $priority = $row['priority'];
    echo'<div id="Task" class="'; if($status == '1'){echo 'done';} else if ($status == '2'){echo 'canceled';} else {echo 'active';} echo'">
            <div class="taskLevel">
                <p>'; if($priority == 'Низкий'){echo '<font color="red">';} else if ($priority == 'Средний'){echo '<font color="yellow">';} else {echo '<font color="green">';} echo $priority.'</font>'; echo'</p>
            </div>
            <div class="taskBlock">
                <div class="taskBlockButtons">
                <a href="cancel.php?id='.$id.'"><div class="taskBlockButtonFirst">
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
                    <a href="low_priority.php?id='.$id.'"><div class="taskBlockButtonSecond">
<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

<g id="directional" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
    <g id="arrow-down" fill="#000000">
        <polygon id="Shape" points="6 7 12 13 18 7 20 9 12 17 4 9"></polygon>
    </g>
</g>
</svg>
                    </div></a>
                </div>
                <div class="taskBlockText1" blockid="'.$id.'">
                    <span class="someClass'.$id.' anotherClass">'.$text.'</span>
                    <form action="edit.php?id='.$id.'"  method="POST">
                        <input type="text" value="'.$text.'" class="taskBlockTextEdit'.$id.' normalName" name="someArea">
                    </form>
                </div>  
                <div class="taskBlockText2"><span>'.$date.'</span></div>
            </div>
            <a href="trash.php?id='.$id.'"><div class="taskDelete">
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
    309.285,364.783 342.248,397.746 363.461,376.533 330.498,343.571 363.461,310.608   "/>
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

            </div></a>
        </div>';
}
$mysqli -> close();
?>