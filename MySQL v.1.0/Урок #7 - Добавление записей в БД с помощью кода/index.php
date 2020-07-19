<?php

// Добавление записей в БД с помощью кода

    $mysqli = new mysqli("localhost","root","","mybase");
    $mysqli->query("SET NAMES 'utf8'");

    // добавить запись в табл юзер в бд ->query("вставить в `users` (что именно будем закидывать)",);
    $success = $mysqli->query("INSERT INTO `users` (`login`, `password`, `reg_date`) 
    VALUES('123456', '".md5("123")."', '".time()."' )");
    echo $success;

    // Циклом закинем много пользователей

    for($i = 0; $i < 10; $i++){
        $mysqli->query("INSERT INTO `users` (`login`, `password`, `reg_date`) 
        VALUES('$i', '".md5("$i")."', '".time()."')");
    }

    // Изменим значение в табличке
    $mysqli->query("UPDATE `mybase`.`users` SET `reg_date` = '456' WHERE `users`.`id` = 2");

    $mysqli->query("UPDATE `mybase`.`users` SET `reg_date` = '999999' WHERE `users`.`id` = 4");

    $mysqli->query("UPDATE `users` SET `reg_date` = '333' WHERE `login` = '1' OR (`id` > 4 AND `id` < 6) ");    

    // можем удалять из таблички значения
    $mysqli->query("DELETE FROM `users` WHERE `id` = 6");
    // или удалить все:
    $mysqli->query("DELETE FROM `users`");
    // по выборке
    $mysqli->query("DELETE FROM `users` WHERE `id` > 2 AND `id` < 6");


    $mysqli->close();

    echo "works";

?>