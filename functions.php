<?php
require_once('helpers.php');

/**
 * Функция, которая обрезает текстовое содержимое, если оно превышает заданное число символов.
 * Если текст был обрезан, добавляет к нему ссылку «Читать далее».
 * @param string $str исходный текст, строка
 * @param integer $symbols_count_default число символов, до которых надо обрезать текст, по умолчанию: 300.
 *
 * @return string возвращает строку с разметкой
 */
function crop_text(string $str, int $symbols_count_default = 300) : string
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
    if ($symbols_count_current > $symbols_count_default) {
        return "<p>{$new_str}...</p>{$read_more_link}";
    } else {
        return "<p>{$new_str}</p>";
    }
}


/**
 * Функция считает разницу между текущей датой и датой публикации поста и
 * возвращает ее в относительном формате
 * @param string $date дата публикации поста
 * @return string относительный формат даты
 */
function get_relative_date(string $date) : string
{
    $date = strtotime($date);
    $current_date = time();
    $date_diff = $current_date - $date;

    $date_in_minutes = floor($date_diff / 60);
    $date_in_hours = floor($date_in_minutes / 60);
    $date_in_days = floor($date_in_hours / 24);
    $date_in_week = floor($date_in_days / 7);
    $date_in_month = floor($date_in_days / 30);
    $date_in_years = floor($date_in_days / 365);

    if ($date_in_minutes < 60) {
        $noun_form = get_noun_plural_form($date_in_minutes, 'минута', 'минуты', 'минут');
        return "{$date_in_minutes} {$noun_form} назад";
    } elseif ($date_in_hours < 24) {
        $noun_form = get_noun_plural_form($date_in_hours, 'час', 'часа', 'часов');
        return "{$date_in_hours} {$noun_form} назад";
    } elseif ($date_in_days < 7) {
        $noun_form = get_noun_plural_form($date_in_days, 'день', 'дня', 'дней');
        return "{$date_in_days} {$noun_form} назад";
    } elseif ($date_in_week < 5) {
        $noun_form = get_noun_plural_form($date_in_week, 'неделя', 'недели', 'недель');
        return "{$date_in_week} {$noun_form} назад";
    } elseif ($date_in_month < 12) {
        $noun_form = get_noun_plural_form($date_in_month, 'месяц', 'месяца', 'месяцев');
        return "{$date_in_month} {$noun_form} назад";
    } else {
        $noun_form = get_noun_plural_form($date_in_years, 'год', 'года', 'лет');
        return "{$date_in_years} {$noun_form} назад";
    }
}
