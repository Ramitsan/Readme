<?php
require_once('settings.php');
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
    'type' => 'post-photo',
    'content' => 'coast-medium.jpg',
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
/**
 * Функция, которая обрезает текстовое содержимое, если оно превышает заданное число символов.
 * Если текст был обрезан, добавляет к нему ссылку «Читать далее».
 * @param $str исходный текст, строка
 * @param $symbols_count_default число символов, до которых надо обрезать текст, по умолчанию: 300.
 *
 * @return string возвращает строку с разметкой
 */
function crop_text($str, $symbols_count_default = 300)
{
  $words_arr = explode(" ", $str);
  $new_words_arr = [];
  $symbols_count_current = 0;
  $read_more_link = '<a class="post-text__more-link" href="#">Читать далее</a>';

  foreach ($words_arr as $word) {
    $symbols_count_current += mb_strlen($word);
    if ($symbols_count_current <= $symbols_count_default) {
      array_push($new_words_arr, $word);
    } else {
      break;
    }
  }
  $new_str = implode(" ", $new_words_arr);
  if ($symbols_count_current > $symbols_count_default) return "<p>{$new_str}...</p>{$read_more_link}";
  else return "<p>{$new_str}</p>";
}


$main_popular = include_template('main.php', ['posts' => $posts]);

$layout = include_template('layout.php', ['main_popular' => $main_popular, 'is_auth' => $is_auth, 'user_name' => $user_name, 'title' => $title]);
print($layout);
