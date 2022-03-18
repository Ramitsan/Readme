--  заполняем данными таблицу users
INSERT INTO users SET login = 'Superman', email = 'vanya@mail.ru', password = 'secret', registration_date = '2022-03-15';

INSERT INTO users SET login = 'Alisa', email = 'alisa@mail.ru', password = 'alisa', registration_date = '2022-02-14';

INSERT INTO users SET login = 'Лариса', email = 'larisa@mail.ru', password = 'larisa', registration_date = '2022-03-14';


--  заполняем данными таблицу content_types
INSERT INTO content_types SET title = 'post-text', icon = 'text';

INSERT INTO content_types SET title = 'post-quote', icon = 'quote';

INSERT INTO content_types SET title = 'post-photo', icon = 'photo';

INSERT INTO content_types SET title = 'post-video', icon = 'video';

INSERT INTO content_types SET title = 'post-link', icon = 'link';


--  заполняем данными таблицу posts
INSERT INTO posts SET title = 'Цитата', quote = 'Мы в жизни любим только раз, а после ищем лишь похожих', quote_author = 'Пушкин', count_views = 25, date = '2022-03-05', user_id = (SELECT u.id FROM users u WHERE u.login = "Alisa"), content_type = (SELECT ct.id FROM content_types ct WHERE ct.title = "post-quote");

INSERT INTO posts SET title = 'Игра престолов', text_content = 'Не могу дождаться начала финального сезона своего любимого сериала! Не могу дождаться начала финального сезона своего любимого сериала! Не могу дождаться начала финального сезона своего любимого сериала! Не могу дождаться начала финального сезона своего любимого сериала! Не могу дождаться начала финального сезона своего любимого сериала! Не могу дождаться начала финального сезона своего любимого сериала! Не могу дождаться начала финального сезона своего любимого сериала! Не могу дождаться начала финального сезона своего любимого сериала! Не могу дождаться начала финального сезона своего любимого сериала! Не могу дождаться начала финального сезона своего любимого сериала! конец', count_views = 35, date = '2022-01-05', user_id = (SELECT u.id FROM users u WHERE u.login = "Alisa"), content_type = (SELECT ct.id FROM content_types ct WHERE ct.title = "post-text");

INSERT INTO posts SET title = 'Наконец обработал фотки!', image = 'rock-medium.jpg', count_views = 45, date = '2022-03-09', user_id = (SELECT u.id FROM users u WHERE u.login = "Alisa"), content_type = (SELECT ct.id FROM content_types ct WHERE ct.title = "post-photo");

INSERT INTO posts SET title = 'Моя мечта', video = 'https://www.youtube.com/watch?v=9TZXsZItgdw', count_views = 5, date = '2022-03-19', user_id = (SELECT u.id FROM users u WHERE u.login = "Alisa"), content_type = (SELECT ct.id FROM content_types ct WHERE ct.title = "post-video");

INSERT INTO posts SET title = 'Лучшие курсы', link = 'www.htmlacademy.ru', count_views = 15, date = '2022-03-19', user_id = (SELECT u.id FROM users u WHERE u.login = "Alisa"), content_type = (SELECT ct.id FROM content_types ct WHERE ct.title = "post-link");


--  заполняем данными таблицу comments
INSERT INTO comments SET text_content = 'Как верно сказано!', author = (SELECT u.id FROM users u WHERE u.login = "Alisa"), date = '2022-03-01', post = (SELECT p.id FROM posts p WHERE p.title = "Цитата");

INSERT INTO comments SET text_content = 'И я тоже :)', author = (SELECT u.id FROM users u WHERE u.login = "Alisa"), date = '2022-03-01', post = (SELECT p.id FROM posts p WHERE p.title = "Игра престолов");

INSERT INTO comments SET text_content = 'Отличное фото!', author = (SELECT u.id FROM users u WHERE u.login = "Alisa"), date = '2022-02-20', post = (SELECT p.id FROM posts p WHERE p.title = "Наконец обработал фотки!");

INSERT INTO comments SET text_content = 'Очень интересно', author = (SELECT u.id FROM users u WHERE u.login = "Alisa"), date = '2022-03-01', post = (SELECT p.id FROM posts p WHERE p.title = "Моя мечта");

INSERT INTO comments SET text_content = 'Хочу стать программистом! Научите!!!', author = (SELECT u.id FROM users u WHERE u.login = "Alisa"), date = '2022-03-01', post = (SELECT p.id FROM posts p WHERE p.title = "Лучшие курсы");









