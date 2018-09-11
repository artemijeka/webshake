<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 10.09.18
 * Time: 17:15
 */

$file = fopen(__DIR__ . '/text.txt', 'r');
for ($i = 0; $i < 4; $i++) {
    echo fgets($file);
    echo '<br>';
}
fclose($file);

/**
 * Программа, переписанная с использованием функции feof будет выглядеть следующим образом:
 */
$file = fopen(__DIR__ . '/file.txt', 'r');
while (!feof($file)) {
    echo fgets($file);
    echo '<br>';
}
fclose($file);

/**
 * для записи в файл строки используется функция fputs(). Первым аргументом указывается ресурс, а вторым — строка,
 * которую необходимо записать в файл. Давайте в качестве примера напишем программу, которая запишет в файл file2.txt
 * числа от 1 до 100.
 */
$file = fopen(__DIR__ . '/file2.txt', 'w');
for ($i = 1; $i < 101; $i++) {
    fputs($file, $i . PHP_EOL);
}
fclose($file);

/**
 * При этом если сейчас запустить программу снова, то старые данные в файле file2.txt перезапишутся новыми. Для того,
 * чтобы сохранить содержимое файла и дозаписать данные в конец, нужно использовать режим работы с файлом “a”
 * (от append – присоединять, добавлять).
 */
$file = fopen(__DIR__ . '/file3.txt', 'a');
fputs($file, 'abc' . PHP_EOL);
fclose($file);

$data = file_get_contents(__DIR__ . '/text.txt');
echo $data;

/**
 * Для того, чтобы записать в файл большой объем данных за раз — сразу несколько строк,
 * можно воспользоваться функцией file_put_contents.
 */
$data = 'abc' . PHP_EOL . 'def' . PHP_EOL;
file_put_contents(__DIR__ . '/file3.txt', $data);

/**
 * Если снова запустить этот код, файл перезапишется. Для того, чтобы дополнить файл у этой функции есть третий аргумент
 * — режим работы с файлом. Для дозаписи в конец файла следует использовать константу FILE_APPEND.
 */
$data = 'abc' . PHP_EOL . 'def' . PHP_EOL;
file_put_contents(__DIR__ . '/file3.txt', $data, FILE_APPEND);