$(document).ready(function(){
    $(function(){
    $('.normalName, #modalWindow, #floatWindow').hide(); 
    var a=1;
    $('.buttonForFilter').click(function(){   // Кнопка "дата создания"
        clearBorder(); // Вызываем функцию, которая убирает все обводки
        $(this).css({'border':'1px solid black'}); // Делаем обводку при выборе
        $.ajax({
           url: "filter.php?ftype=1", // Обращаемся к файлу фильтрации
           type: "POST", // POST запрос
           data: ({age: a }), // отправляем значение a (будет равно age)
           success: function(data){
           $('#tasksList').html(data);
           if(a==1){
               $('.buttonForFilter').addClass('turned'); // Добавляем класс для переворота картинки
               a=0;
           } else {
               $('.buttonForFilter').removeClass('turned');
               a=1;
           }
           editing();
           }
        });
    });
    $('.filterpriority').change(function(){ // Select фильтр по приоритету
        var value = $(this).val();
        clearBorder();
        $.ajax({
            url: "filter.php?ftype=2",
            type: "POST",
            data: ({selected: value}),
            success: function(data){
                $('#tasksList').html(data);
                editing();
            }
        });
    });
    $('input[name=someCheck1], input[name=someCheck2], input[name=someCheck3]').click(function(){ // чекбоксы
        clearBorder();
        var checkvalue;
        /*
        1 = активные, отмененные, завершенные
        2 = отмененные, завершенные,
        4 = активные, отмененные
        5 = активные, завршенные
        6 = отмененные
        7 = активные 
        3 = завершенные
        */
        if ($('input[name=someCheck1]').is(':checked') && $('input[name=someCheck2]').is(':checked') && $('input[name=someCheck3]').is(':checked')){
            checkvalue = 1;
        } else if ($('input[name=someCheck2]').is(':checked') && $('input[name=someCheck3]').is(':checked')){
            checkvalue = 2;
        } else if ($('input[name=someCheck1]').is(':checked') && $('input[name=someCheck2]').is(':checked')){
            checkvalue = 4;
        } else if ($('input[name=someCheck1]').is(':checked') && $('input[name=someCheck3]').is(':checked')){
            checkvalue = 5;
        } else if ($('input[name=someCheck2]').is(':checked')){
            checkvalue = 6;
        } else if ($('input[name=someCheck1]').is(':checked')){
            checkvalue = 7;
        } else if ($('input[name=someCheck3]').is(':checked')){
            checkvalue = 3;
        }
        $.ajax({
         url: "filter.php?ftype=3",
         type: "POST",
         data: ({check: checkvalue}),
         success: function(data){
             $('#tasksList').html(data);
             editing();
        }
        });
    });
    var b=1;
    $('button[name=secondButton]').click(function(){ // Кнопка сортировка по приоритету
        clearBorder();
        $(this).css({'border':'1px solid black'});
        $.ajax({
            url: 'filter.php?ftype=4',
            type: 'POST',
            data: ({priority:b}),
            success: function(data){
                $('#tasksList').html(data);
                if(b==1){
                    $('button[name=secondButton]').addClass('turned');
                    b=0;
                } else {
                    $('button[name=secondButton]').removeClass('turned');
                    b=1;
                }
                editing();
            }
        });
    });
    $("input[name=someInput]").keyup(function(){ // Поиск
        clearBorder();
        var someValue = $(this).val();
        $.ajax({
            url:"filter.php?ftype=5",
            type:'POST',
            data:({search:someValue}),
            success: function(data){
                $('#tasksList').html(data); 
                editing();
            }
        });
    });
    $('.taskDelete').click(function(){
        $('#modalWindow').show(300);
        var pri = $(this).attr('privet');
        $('.buttonsForModal a').attr('href','trash.php?id='+pri);
    });
    $('#close, .buttonsForModal button:last-child').click(function(){
        $('#modalWindow').hide(300);
    });
    $('input[someProperty=nameForUnusualProperty]').click(function(){
        if($('input[name=inputForTask]').val()==''){
            $('#floatWindow').show(200);
            return false;
        } 
    });
    $('.closeWindow').click(function(){
        $('#floatWindow').hide(300);
    });
    function editing(){
        $('.normalName').hide();
        $('.taskBlockText1').click(function(){
            $('.normalName').hide(); // Скрыть все редактируемые инпуты 
            $('.anotherClass').show(); // Показать все нередактируемые инпуты
            var id = $(this).attr('blockid');
            $('.someClass'+id).hide();
            $('.taskBlockTextEdit'+id).show();
        });
    }
    function clearBorder(){
        $('.buttonForFilter,button[name=secondButton]').css({'border':'none'});
    }
    editing();
});
});