<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 10.09.18
 * Time: 15:09
 */

    setcookie('login', '', -1, '/');
    setcookie('password', '', -1, '/');
    /**
     * У меня папка этого задания называется 23 в локальном сервере webshake, то есть webshake/23
     * по этому я сначала ставлю / после logout.php а потом поднимаюсь до дирректории повыше ../ и перехожу в index.php
     */
    header("Location: " . $_SERVER['REQUEST_URI'] . "/../index.php");