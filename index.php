<?php
require_once('settings.php');

$title = 'Readme: Популярное';
date_default_timezone_set("Europe/Moscow");
$is_auth = rand(0, 1);

$user_name = 'Алиса';

$posts = [
  [
    'title' => 'Цитата',
    'type' => 'post-quote',
    'content' => 'Мы в жизни любим только раз, а после ищем лишь похожих',
    'username' => 'Лариса',
    'avatar' => 'userpic-larisa-small.jpg'
  ],
  [
    'title' => 'Игра престолов',
    'type' => 'post-text',
    'content' => 'Не могу дождаться начала финального сезона своего любимого сериала!
        Не могу дождаться начала финального сезона своего любимого сериала!
        Не могу дождаться начала финального сезона своего любимого сериала!
        Не могу дождаться начала финального сезона своего любимого сериала!
        Не могу дождаться начала финального сезона своего любимого сериала!
        Не могу дождаться начала финального сезона своего любимого сериала!
        Не могу дождаться начала финального сезона своего любимого сериала!
        Не могу дождаться начала финального сезона своего любимого сериала!
        Не могу дождаться начала финального сезона своего любимого сериала!
        Не могу дождаться начала финального сезона своего любимого сериала!
        конец',

    'username' => 'Владик',
    'avatar' => 'userpic.jpg'
  ],
  [
    'title' => 'Наконец обработал фотки!',
    'type' => 'post-photo',
    'content' => 'rock-medium.jpg',
    'username' => 'Виктор',
    'avatar' => 'userpic-mark.jpg'
  ],
  [
    'title' => 'Моя мечта',
    'type' => 'post-video',
    'content' => 'https://www.youtube.com/watch?v=9TZXsZItgdw',
    'username' => 'Лариса',
    'avatar' => 'userpic-larisa-small.jpg'
  ],
  [
    'title' => 'Лучшие курсы',
    'type' => 'post-link',
    'content' => 'www.htmlacademy.ru',
    'username' => 'Владик',
    'avatar' => 'userpic.jpg'
  ]
];

$main_popular = include_template('main_popular.php', ['posts' => $posts]);

$layout = include_template('layout.php', ['main_popular' => $main_popular, 'is_auth' => $is_auth, 'user_name' => $user_name, 'title' => $title]);
print($layout);
