<?php
require_once('connect.php');
$jsonPosts = file_get_contents('https://jsonplaceholder.typicode.com/posts');
$postsArray = json_decode($jsonPosts, true);
$jsonComments = file_get_contents('https://jsonplaceholder.typicode.com/comments');
$commentsArray = json_decode($jsonComments, true);

$countPosts = 0;
$countCommetns = 0;

foreach ($postsArray as $value) {
    // добавление данных в таблицу posts
    $addPosts = "INSERT INTO `posts` SET `userId` = ?, `id` = ?, `title` = ?, `body` = ?";
    $insertData = $pdo->prepare($addPosts);
    $insertData->execute(array($value['userId'], $value['id'], $value['title'], $value['body']));
    $countPosts++;
}

foreach ($commentsArray as $value) {
    // добавление данных в таблицу comments
    $addComments = "INSERT INTO `comments` SET `postId` = ?, `id` = ?, `name` = ?, `email` = ?, `body` = ?";
    $insertData = $pdo->prepare($addComments);
    $insertData->execute(array($value['postId'], $value['id'], $value['name'], $value['email'], $value['body']));
    $countCommetns++;
}

echo "<script>console.log('Загружено ".$countPosts." записей и ".$countCommetns." комментариев');</script>";