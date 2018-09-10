<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 07.09.18
 * Time: 13:42
 */

$result = require __DIR__ . '/calc.php';
?>
<html>
<head>
    <title>Калькулятор</title>
</head>
<body>
    <b>Результат вычислений:</b>
    <br>
    <?= $result ?>
</body>
</html>