<?php
require_once 'config.php';
require_once 'settings.php';

/**
 * Устанавливает подключение к серверу
 * @param array $db_config - массив параметров подключения
 *
 * @return object|boolean Возвращает $con - объект, который представляет соединение с сервером MySQL, либо false, если соединение не удалось
 */
function db_connect(array $db_config) : object|boolean
{
    $con = mysqli_connect(
        $db_config['db_host'],
        $db_config['db_username'],
        $db_config['db_password'],
        $db_config['db_name']
    );
    mysqli_set_charset($con, "utf-8");

    return $con;
};

/**
 * Проверяет подключение к базе данных
 * @param object $con - объект, который представляет соединение с сервером MySQL
 *
 * @return boolean Возвращает false, если нет соединения, и true, если есть
 */
function check_connection(object $con) : boolean
{
    if (!$con) {
        $error = mysqli_connect_error();
        print("Ошибка подключения к базе данных " . $error);
        return false;
    }
    return true;
}

/**
 *  Получает данные из БД
 * @param object $db_connect - данные для подключения к БД
 * @param string $sql_query  - SQL-запрос
 *
 * @return array $sql_result_array - возвращает полученный массив
 */
function sql_query_result(object $db_connect, string $sql_query) : array
{
    $sql_result = mysqli_query($db_connect, $sql_query);
    //преобразуем результаты SQL-запроса в массив
    $sql_result_array = mysqli_fetch_all($sql_result, MYSQLI_ASSOC);

    return $sql_result_array;
};