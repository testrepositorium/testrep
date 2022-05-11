let firstSelect = document.getElementById('priority');
const mainInput = document.getElementById('firstInput');
const mainButton = document.getElementById('buttonInTheFirstForm');
const fieldForTasks = document.querySelector('.tasksList');
// let buttonForDateFilter = document.getElementsByClassName('buttonForFilter');
// let someKrestik = document.getElementsByClassName('thirdSvg');
// let someGalochka = document.getElementsByClassName('fourthSvg');
// let fieldOFButtons = document.getElementsByClassName('statusButtons');

let firstCheck = document.getElementById('firstCheckBox');
let secondCheck = document.getElementById('secondCheckBox');
let thirdCheck = document.getElementById('thirdCheckBox');
let fourthCheck = document.getElementById('fourthCheckBox');

let allTasks;
let colorOfPriority;
// !localStorage.allTasks ? allTasks = [] : allTasks = JSON.parse(localStorage.getItem('allTasks'));

getFromServer();

function Task(description, priority, currentDate, numberOfPriority, descOfStatus) {
    this.description = description;
    this.priority = priority;
    this.status = 1;
    this.date = currentDate;
    this.numberOfPriority = numberOfPriority;
    this.descOfStatus = descOfStatus;
}

let someFunction = (allTasks, value) => {
    if (allTasks.priority == 'Низкий'){
        colorOfPriority = 'red';
    } else if (allTasks.priority == 'Средний'){
        colorOfPriority = 'yellow';
    } else {
        colorOfPriority = 'green';
    }
    return `
        <div class="Task">
            <div class="priorityOfTask">
                <span><font color="${colorOfPriority}">${allTasks.priority}</font></span>
            </div>
            <div class="mainFieled">
                <div class=upField>
                    <div class="taskInformation" id=taskInformationNumber${value}>
                        <div class="fieldOfInforamtion" id="fieldNumber${value}" onclick="showInput(${value}, '${allTasks.description}')">
                            <span>${allTasks.description}</span>
                        </div>
                    </div>
                    <div class="statusButtons status${allTasks.status}" id="statusButtons${value}" >
                        <div class="firstStatusButton" id="firststatusButton${value}" onclick="krestik(${value})">
                            <object type="image/svg+xml" data="krestik.svg" width="25"></object>
                        </div>
                        <div class="secondStatusButton" id="secondStatusButton${value}" onclick="galochka(${value})">
                            <object type="image/svg+xml" data="galochka.svg" width="25"></object>
                        </div>
                    </div>
                </div>
                <div class="downFiled">
                    <div class="filedOfDate">
                        <span>${allTasks.date}</span>
                    </div>
                    <div class="placeForChanges" id=placeForChanges${value}>
                        <span>${allTasks.descOfStatus}</span>
                    </div>
                </div>
            </div>
            <div class="deleteButton" onclick="deleteFunction(${value})">
                <object class="fifthSvg" type="image/svg+xml" data="musorka.svg" width="40"></object>
            </div>
        </div>
    `
}

let addNewTask = (dateFilter, allParametrs) => {
    fieldForTasks.innerHTML = "";
    if (allTasks.length > 0) {
        if (dateFilter == 'down'){
            allTasks.forEach((item, value) => {
                if(item.status == allParametrs[0] || item.priority == allParametrs[1] || item.priority == allParametrs[2] || item.priority == allParametrs[3]){
                    fieldForTasks.innerHTML = someFunction(item, value) + fieldForTasks.innerHTML;
                }
            })
        } else if (dateFilter == 'up'){
            allTasks.forEach((item, value) => {
                if(item.priority == allParametrs[1] || item.priority == allParametrs[2] || item.priority == allParametrs[3]){
                    fieldForTasks.innerHTML = fieldForTasks.innerHTML + someFunction(item, value);
                }
            })
        }
    }
}

let dateFilter = 'down';
let allParametrs = ['Завершенная', 'Низкий', 'Средний', 'Высокий'];

function sortByDate() {                 // СОРТИРОВКА ПО ДАТЕ
    if (dateFilter == 'down') {
        dateFilter = 'up';
        addNewTask(dateFilter, allParametrs);
        document.getElementsByClassName('buttonForFilter')[0].value = 'По возрастанию';
    } else if (dateFilter == 'up') {
        dateFilter = 'down';
        addNewTask(dateFilter, allParametrs);
        document.getElementsByClassName('buttonForFilter')[0].value = 'По убыванию';
    }
}
// addNewTask(dateFilter, allParametrs);

// let addToStorage = () => {
//     localStorage.setItem('allTasks', JSON.stringify(allTasks));
// }

let numberOfPriority;
mainButton.addEventListener('click', () => {
    let dateOfCreation = makeDate();
    let timeOfCreation = makeTime();
    dateOfCreation = dateOfCreation + ' ' + timeOfCreation;
    switch(firstSelect.value) {
        case 'Низкий':
            numberOfPriority = 0;
            break;
        case 'Средний':
            numberOfPriority = 1;
            break;
        default:
            numberOfPriority = 2;
            break;
    }
    let descOfStatus = '';
    currentTask = new Task(mainInput.value, firstSelect.value, dateOfCreation, numberOfPriority, descOfStatus);
    allTasks.push(currentTask);
    // addToStorage(currentTask);
    // addNewTask(dateFilter,allParametrs);
    addToServer(currentTask);
    mainInput.value = '';
});

function makeDate () {
    let currentDate = new Date();
    let yyyy =  currentDate.getFullYear();
    let mm = currentDate.getMonth() + 1;
    let dd = currentDate.getDate();
    if (dd < 10) {
        dd = '0' + dd;
    }
    if (mm < 10) {
        mm = '0' + mm;
    }
    currentDate = '' + dd + '/' + mm + '/' + yyyy;
    return currentDate;
}

function makeTime() {
    let currentDate = new Date();
    let hh = currentDate.getHours();
    let minuties = currentDate.getMinutes(); 
    if (hh < 10) {
        hh = '0' + hh;
    }
    if (minuties < 10) {
        minuties = '0' + minuties;
    }
    currentDate =  '' + hh + ':' + minuties;
    return currentDate;
}

function krestik(index) {
    document.getElementById(`firststatusButton${index}`).style.display = "none";
    document.getElementById(`secondStatusButton${index}`).style.display = "none";
    let statusInformation =     
    `
    <span>Завершена ${makeDate()} в ${makeTime()}</span>
    `;
    document.getElementById(`placeForChanges${index}`).innerHTML = statusInformation;
    allTasks[index].descOfStatus = statusInformation;
    allTasks[index].status = 2;
    //addToStorage();
    changeOnServer(allTasks[index]);
    //addNewTask(dateFilter, allParametrs);
}

function galochka(index) {
    document.getElementById(`firststatusButton${index}`).style.display = "none";
    document.getElementById(`secondStatusButton${index}`).style.display = "none";
    let statusInformation = 
    `
    <span>Отменена ${makeDate()} в ${makeTime()}</span>
    `;
    document.getElementById(`placeForChanges${index}`).innerHTML = statusInformation;
    allTasks[index].descOfStatus = statusInformation;
    allTasks[index].status = 3;
    //addToStorage();
    changeOnServer(allTasks[index]);
    //addNewTask(dateFilter, allParametrs);
}

function ckeckOfCkeckBoxes() {
    allParametrs = ['','','',''];
    if (firstCheck.checked){
        allParametrs[0] = '2';
    }
    if (secondCheck.checked) {
        allParametrs[1] = 'Низкий';
    }
    if (thirdCheck.checked) {
        allParametrs[2] = 'Средний';
    }
    if (fourthCheck.checked) {
        allParametrs[3] = 'Высокий';
    }
    addNewTask(dateFilter, allParametrs);
}

function showInput(index, text) {
    document.getElementById(`taskInformationNumber${index}`).innerHTML = 
    `
    <div class="newElement1">
        <input type="text" class="newFieldsForInf" id="newFieldOfInformation${index}" value="${text}">
    </div>
    <div class="newElement2">
        <button type="button" onclick="change(${index})">Ок</button> 
    </div>
    `;
}

function change(index){
    allTasks[index].description = document.getElementById(`newFieldOfInformation${index}`).value;
    //addToStorage();
    //addNewTask (dateFilter, allParametrs);
    changeOnServer(allTasks[index]);
}

function deleteFunction(index){
    let deleteObject = allTasks[index];
    allTasks.splice(index, 1);
    //addToStorage();
    //addNewTask (dateFilter, allParametrs);
    deleteOnServer(deleteObject);
}

// КОНЕКШН К СЕРВЕРУ

function getFromServer(){
    fetch('http://127.0.0.1:3000/items') 
        .then((response) => response.json())
        .then((json) => {
            allTasks = json;
            addNewTask(dateFilter, allParametrs);
        })
        .catch((error) => console.error(error));
    console.log('Привет');
}

function addToServer(Task) {
    fetch('http://127.0.0.1:3000/items', {
        method: "POST",
        headers: {
            "Content-Type": "application/json;charser=utf-8",
        },
        body: JSON.stringify(Task),
    });
    getFromServer();
    addNewTask(dateFilter, allParametrs);
    console.log(Task);
};

function deleteOnServer(deleteObject) {
    fetch(`http://127.0.0.1:3000/items/${deleteObject.id}`, {
        method: "DELETE",
        headers: {
            "Content-Type": "application/json;charset=utf-8",
        },
    });
    getFromServer();
    // sleep(2000);
    addNewTask(dateFilter, allParametrs);
};

function changeOnServer(changeObject) {
    fetch(`http://127.0.0.1:3000/items/${changeObject.id}`,{
        method: "PUT",
        headers: {
            "Content-type": "application/json;charset=utf-8",
        },
        body: JSON.stringify(changeObject),
    });
    getFromServer();
    // sleep(2000);
    addNewTask(dateFilter, allParametrs);
};