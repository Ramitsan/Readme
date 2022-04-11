<?php
require_once('settings.php');

$title = 'Readme: Популярное';
date_default_timezone_set("Europe/Moscow");
$is_auth = rand(0, 1);

$user_name = 'Алиса';


// получение типов контента
$sql_content_types = "SELECT * FROM content_types";
$content_types = sql_query_result($con, $sql_content_types);

// получение списка постов, объединённых с пользователями и отсортированный по популярности
$sql_posts = "SELECT *, p.title as title, u.login, u.avatar, c.title as content_type_title, c.icon FROM posts p 
              JOIN users u ON p.user_id = u.id 
              JOIN content_types c ON p.content_type = c.id 
              ORDER BY p.count_views DESC";
$posts = sql_query_result($con, $sql_posts);


$main_popular = include_template('main_popular.php', ['content_types' => $content_types, 'posts' => $posts]);

$layout = include_template('layout.php', ['main_popular' => $main_popular, 'is_auth' => $is_auth, 'user_name' => $user_name, 'title' => $title]);
print($layout);
