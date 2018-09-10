<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 10.09.18
 * Time: 11:50
 */

        require __DIR__ . '/auth.php';

        if (isset($_COOKIE['login']) && isset($_COOKIE['password'])) {
            if (checkAuth($_COOKIE['login'], $_COOKIE['password'])) {
                header('Location: ' . $_SERVER['REQUEST_URI'] . '/../index.php');
            }
        }

if (!empty($_POST)) {
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';

    if (checkAuth($login, $password)) {
        setcookie('login', $login, 0, '/');
        setcookie('password', $password, 0, '/');
        /**
         * так-же тут / после текущего адреса ($_SERVER['REQUEST_URI']),
         * потом выход наверх ../ и к файлу index.php
         */
        header('Location: ' . $_SERVER['REQUEST_URI'] . '/../index.php');
    } else {
        $error = 'Ошибка авторизации';
    }
}
?>
<html>
<head>
    <title>Форма авторизации</title>
</head>
<body>
<?php if (isset($error)): ?>
    <span style="color: red;">
    <?= $error ?>
</span>
<?php endif; ?>
<form action="<?= $_SERVER['REQUEST_URI']; ?>" method="post">
    <label for="login">Имя пользователя: </label><input type="text" name="login" id="login">
    <br>
    <label for="password">Пароль: </label><input type="password" name="password" id="password">
    <br>
    <input type="submit" value="Войти">
</form>
</body>
</html>