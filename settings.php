<?php
require_once('helpers.php');
require_once('functions.php');
require_once('db_functions.php');

$quantity_hours_in_day = 24;

// создаем переменную подключения, общую на весь проект
$con = db_connect($db_config);
