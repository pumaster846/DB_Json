<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INLINE</title>
</head>

<body>
    <form method="GET">
        <fieldset>
            <legend>Поиск записей</legend>
            <input type="text" name="text">
            <input type="submit" id="btnSubmit" value="Найти">
        </fieldset>
    </form>
    <?php
        require_once('php/connect.php');

        if(isset($_GET['text'])) {
            $text = $_GET['text'];
            if (strlen($text) >= 3) {
                $sql = "SELECT `posts`.`title`, `comments`.`body` FROM `posts` INNER JOIN `comments` ON `posts`.`id` = `comments`.`postID` WHERE `comments`.`body` LIKE '%".$text."%'";
                $data = $pdo->query($sql);
                $result = $data->fetchAll();
                foreach ($result as $value): ?>
                    <div class="body">
                        <div class="column">Заголовок: <span style="color: red"><?= $value['title'] ?></span></div>
                        <div class="column" style="margin-bottom: 12px;">Текст: <span style="background-color: pink;"><?= $value['body'] ?></span></div>
                    </div>
                <? endforeach;
            } else {
                echo "Минимальная строка запроса - 3 символа.";
            }
        }
    ?>
</body>

</html>