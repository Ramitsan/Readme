<?php
require_once('helpers.php');

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


