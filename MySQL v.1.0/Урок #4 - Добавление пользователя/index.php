<?php 

/*
// Добавление пользователя

1. Создадим юзера вручную:

login: amin2
password: слево выбираем секцию MD5 - получится закешированный пароль
password: UNIX_TIMESTAMP 

снизу создание через код

INSERT INTO `mybase`.`users` (
`id` ,
`login` ,
`password` ,
`reg_date`
)
VALUES (
NULL , 'admin2', MD5( '123' ) , UNIX_TIMESTAMP( )
);

В разделе операции , мы можем заменить auto_increment и поставить единицу

*/

?>