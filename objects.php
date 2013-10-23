<?php
$session = new c_session();
$input = new c_input();
$ajax = new c_ajax();
// DB sollte global erstellt werden da dann für alle Klassen über "global $db" zur Verfügung steht
$db = new ezSQL_mysql('root', '', 'lb', 'localhost'); //user, password, database name, host
?>