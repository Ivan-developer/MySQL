<?php

// Выборка записей из БД

    // Создадим функцию для вывода из БД

    function printResult($result_set){
        while(($row = $result_set -> fetch_assoc()) != false){
            print_r($row);
            echo "<br />------";
            echo $row[login];
            echo "<br />------";

        }
        echo "All ia: ".$result_set->num_rows."<br />--------------";
    }

    $mysqli = new mysqli("localhost","root","","mybase");
    $mysqli->query("SET NAMES 'utf8'");

    // создадим пару новых логинов

    for($i = 0; $i < 10; $i++){
        $mysqli->query("INSERT INTO `users` (`login`, `password`, `reg_date`)
        VALUES ('User_$i', '".md5($i)."', '".time()."')");
    }

    // выборка * означает что все выбираем
    $result_set = $mysqli->query("SELECT * FROM `users`");

    printResult($result_set);

    echo "<br /> ===========================================================";

    // выведем не все как сверху, а выведем только id
    $result_set = $mysqli->query("SELECT `id` FROM `users`");
    printResult($result_set);
    
    echo "<br /> ===========================================================";

    // выведем не все как сверху, а выведем только id и login
    $result_set = $mysqli->query("SELECT `id`, `login` FROM `users`");
    printResult($result_set);

    echo "<br /> ===========================================================";

    // выведем не все как сверху, а выведем только id больше 3
    $result_set = $mysqli->query("SELECT `id` FROM `users` WHERE `id` > 32");
    printResult($result_set);

    echo "<br /> ===========================================================";

    // ВСЕ ЧТО ВЫВОДИМ МОЖЕМ ЕЩЕ И СОРТИРОВАТЬ способом ORDER BY, обычно по id сортируются , ASC это по возрастанию, DESC по убыванию
    $result_set = $mysqli->query("SELECT * FROM `users`  WHERE `id` 
    ORDER BY `id` ASC");
    printResult($result_set);

    // WHERE `login` LIKE '%ser%' - находит подобие как '%ser%'
    $result_set = $mysqli->query("SELECT * FROM `users`  WHERE `login` 
    LIKE '%ser%'");
    printResult($result_set);

    // функция count
    $result_set = $mysqli->query("SELECT count(`id`) FROM `users`");
    printResult($result_set);

    $mysqli->close();
?>