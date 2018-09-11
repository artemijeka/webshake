<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 11.09.18
 * Time: 18:46
 *
 * https://webshake.ru/php-training-course/25
 */
/**
 * V Позвольте загружать только файлы размером меньше 8Мб. Сделайте это с помощью сравнения
 * с $_FILES['attachment']['size'].
 *
 * V Изучите директиву upload_max_filesize в файле php.ini. Установите её значение, равное 2M. Перезапустите веб-сервер.
 *
 * V Попробуйте теперь загрузить файл, размером в 5Мб. Теперь обработайте соответствующую ошибку с помощью проверки
 * значения $_FILES['attachment']['error'].
 *
 * V Разрешите загружать картинки с шириной не более 1280px и высотой не более 720px.
 */

if (!empty($_FILES)) {
    var_dump($_FILES);
}


if (!empty($_FILES['attachment'])) {
    $file = $_FILES['attachment'];
    $fileName = $file['name'];
    $fileWidth = getimagesize($file['tmp_name'])['0'];
    $fileHeight = getimagesize($file['tmp_name'])['1'];
    $newFilePath = __DIR__ . '/uploads/' . $file['name'];

    $allowedExtensions = ['jpg', 'png', 'gif', 'JPG'];
    $extension = pathinfo($fileName, PATHINFO_EXTENSION);

        $fileSize = $_FILES['attachment']['size'];
        if ($fileSize > 8000000) { // ############################################ 1
            $error = 'Загрузка файлов более чем 8Мб запрещена!';
        } elseif (!in_array($extension, $allowedExtensions)) {
        $error = 'Загрузка файлов с таким расширением запрещена!';
    } elseif ($file['error'] !== UPLOAD_ERR_OK) {
        $error = 'Ошибка при загрузке файла.';
        } elseif ($file['error'] === UPLOAD_ERR_INI_SIZE) { // ################### 3
            $error = 'Размер принятого файла превысил максимально допустимый размер, который задан директивой 
            upload_max_filesize конфигурационного файла php.ini.';
        } elseif ($file['error'] === UPLOAD_ERR_NO_FILE) {
        $error = 'Файл не был загружен!';
    } elseif ($file['error'] === UPLOAD_ERR_CANT_WRITE) {
        $error = 'Не удалось записать файл на диск. Добавлено в PHP 5.1.0.';
    } elseif (file_exists($newFilePath)) {
        $error = 'Файл с таким именем уже существует';
    } elseif (!move_uploaded_file($file['tmp_name'], $newFilePath)) {
        $error = 'Ошибка при загрузке файла';
        } elseif ($fileWidth > 1280 && $fileHeight > 720) { // #################### 4
            $error = 'Загрузите картинку в пределах ширины не более 1280px и высотой не более 720px! Пожалуйста)';
        } else {
        $result = 'Файл загружен в http://myproject.loc/uploads/' . $fileName;
    }
}
?>
<html>
<head>
    <title>Загрузка файла</title>
</head>
<body>
<?php if (!empty($error)): ?>
    <?= $error ?>
<?php elseif (!empty($result)): ?>
    <?= $result ?>
<?php endif; ?>
<br>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="attachment">
    <input type="submit">
</form>
</body>
</html>