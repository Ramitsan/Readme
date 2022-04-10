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
$sql_posts = "SELECT * FROM posts p JOIN users u ON p.user_id = u.id ORDER BY p.count_views DESC";
$posts = sql_query_result($con, $sql_posts);

// $posts = [
//   [
//     'title' => 'Цитата',
//     'type' => 'post-quote',
//     'content' => 'Мы в жизни любим только раз, а после ищем лишь похожих',
//     'username' => 'Лариса',
//     'avatar' => 'userpic-larisa-small.jpg',
//     'date' => generate_random_date(0)
//   ],
//   [
//     'title' => 'Игра престолов',
//     'type' => 'post-text',
//     'content' => 'Не могу дождаться начала финального сезона своего любимого сериала!
//         Не могу дождаться начала финального сезона своего любимого сериала!
//         Не могу дождаться начала финального сезона своего любимого сериала!
//         Не могу дождаться начала финального сезона своего любимого сериала!
//         Не могу дождаться начала финального сезона своего любимого сериала!
//         Не могу дождаться начала финального сезона своего любимого сериала!
//         Не могу дождаться начала финального сезона своего любимого сериала!
//         Не могу дождаться начала финального сезона своего любимого сериала!
//         Не могу дождаться начала финального сезона своего любимого сериала!
//         Не могу дождаться начала финального сезона своего любимого сериала!
//         конец',

//     'username' => 'Владик',
//     'avatar' => 'userpic.jpg',
//     'date' => generate_random_date(1)
//   ],
//   [
//     'title' => 'Наконец обработал фотки!',
//     'type' => 'post-photo',
//     'content' => 'rock-medium.jpg',
//     'username' => 'Виктор',
//     'avatar' => 'userpic-mark.jpg',
//     'date' => generate_random_date(2)
//   ],
//   [
//     'title' => 'Моя мечта',
//     'type' => 'post-video',
//     'content' => 'https://www.youtube.com/watch?v=9TZXsZItgdw',
//     'username' => 'Лариса',
//     'avatar' => 'userpic-larisa-small.jpg',
//     'date' => generate_random_date(3)
//   ],
//   [
//     'title' => 'Лучшие курсы',
//     'type' => 'post-link',
//     'content' => 'www.htmlacademy.ru',
//     'username' => 'Владик',
//     'avatar' => 'userpic.jpg',
//     'date' => generate_random_date(4)
//   ]
// ];

$main_popular = include_template('main_popular.php', ['posts' => $posts]);

$layout = include_template('layout.php', ['main_popular' => $main_popular, 'is_auth' => $is_auth, 'user_name' => $user_name, 'title' => $title]);
print($layout);
