<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 11.09.18
 * Time: 16:43
 */

/**
 * V Напишите программу, которая выводит свой собственный код.
 * Сделайте так, чтобы в этой программе не было упоминания имени самого скрипта (если программа лежит в файле
 * homework.php, то упоминания homework.php не должно быть в исходнике).
 *
 * V Выведите список всех файлов в текущей директории скрипта.
 *
 * V Создайте теперь в директории со скриптом несколько папок.
 * Сделайте так, чтобы в списке, выводимом программой, остались только папки.
 */


//        $listFiles = array_diff(scandir(__DIR__), array('..', '.'));
//        foreach ($listFiles as $fileName) {
//            if (is_file($fileName)) {
//                continue;
//            }
//            echo $fileName;
//            echo '<br>';
//        }

//$listFiles = array_diff(scandir(__DIR__), array('..', '.'));
//foreach ($listFiles as $fileName) {
//    echo $fileName;
//    echo '<br>';
//}

//    $file = fopen($_SERVER['SCRIPT_FILENAME'], 'rb');
//    while (!feof($file)) {
//        echo fgets($file);
//        echo '<br>';
//    }
//    fclose($file);