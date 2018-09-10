<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 10.09.18
 * Time: 11:48
 */
function checkAuth(string $login, string $password): bool
{
    $users = require __DIR__ . '/usersDB.php';
    foreach ($users as $user) {
        if ($user['login'] === $login
            && $user['password'] === $password
        ) {
            return true;
        }
    }

    return false;
}

function getUserLogin(): ?string
{
    $loginFromCookie = $_COOKIE['login'] ?? '';
    $passwordFromCookie = $_COOKIE['password'] ?? '';

    if (checkAuth($loginFromCookie, $passwordFromCookie)) {
        return $loginFromCookie;
    }

    return null;
}