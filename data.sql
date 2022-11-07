CREATE DATABASE IF NOT EXISTS inline_blog_db;
USE inline_blog_db;

CREATE TABLE `posts`
(
    `userId` int NOT NULL,
    `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `title` varchar(1000) NOT NULL,
    `body` varchar(1000) NOT NULL
) ENGINE InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `comments`
(
    `postID` int NOT NULL,
    `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` varchar(100) NOT NULL,
    `email` varchar(100) NOT NULL,
    `body` varchar(1000) NOT NULL
) ENGINE InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;