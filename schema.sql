CREATE DATABASE IF NOT EXISTS readme
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

USE readme;

CREATE TABLE IF NOT EXISTS users (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user_registration_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  user_email VARCHAR(128) NOT NULL UNIQUE,
  user_login VARCHAR(128) NOT NULL UNIQUE,
  user_password VARCHAR(255) NOT NULL,
  user_avatar VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS posts (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  post_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  post_title VARCHAR(128) NOT NULL,
  post_text_content VARCHAR(255) NULL,
  post_quote VARCHAR(128) NULL,
  post_quote_author VARCHAR(128) NULL,
  post_image VARCHAR(128) NULL,
  post_video VARCHAR(128) NULL,
  post_link VARCHAR(128) NULL,
  post_count_views INT NOT NULL DEFAULT 0,
  post_user_id INT NOT NULL,
  post_content_type INT NOT NULL,
  post_hashtag INT,
  FOREIGN KEY(post_user_id) REFERENCES users(id),
  FOREIGN KEY(post_content_type) REFERENCES content_types(id),
  FOREIGN KEY(post_hashtag) REFERENCES hashtags -- ???
);

CREATE TABLE IF NOT EXISTS comments (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  comment_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  comment_text_content VARCHAR(128) NOT NULL,
  comment_author INT NOT NULL,
  comment_post INT NOT NULL,
  FOREIGN KEY(comment_author) REFERENCES users(id),
  FOREIGN KEY(comment_post) REFERENCES posts(id)
);

CREATE TABLE IF NOT EXISTS likes (
  like_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  like_author INT NOT NULL,
  like_post INT NOT NULL,
  FOREIGN KEY(like_author) REFERENCES users(id),
  FOREIGN KEY(like_post) REFERENCES posts(id)
);

CREATE TABLE IF NOT EXISTS subscriptions (
  subscription_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  subscription_sender INT NOT NULL,
  subscription_recipient INT NOT NULL,
  FOREIGN KEY(subscription_sender) REFERENCES users(id),
  FOREIGN KEY(subscription_recipient) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS messages (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  message_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  message_text VARCHAR(128) NOT NULL,
  message_sender INT NOT NULL,
  message_recipient INT NOT NULL,
  FOREIGN KEY(message_sender) REFERENCES users(id),
  FOREIGN KEY(message_recipient) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS hashtags (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  hashtag_title VARCHAR(128) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS content_types (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  content_type_title VARCHAR(128) NOT NULL UNIQUE,
  content_type_icon VARCHAR(128) NOT NULL UNIQUE
);
