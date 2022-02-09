<?php
include 'C:/xampp/htdocs/dashboard/php-web/catalog/model/Catalog.php';
include 'C:/xampp/htdocs/dashboard/php-web/catalog/dao/CatalogDao.php';

/**
 * @author Sasha Hatkov
 * @todo переменовать класс файла +
 */

if (isset($_POST['send'])) {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $image = $_FILES['file']['name'];
    $date = $_POST['file_date'];

    $Catalog = new Catalog('', $image, $title, $price, $date);
    $image = $Catalog->getImage();
    $title = $Catalog->getTitle();
    $price = $Catalog->getPrice();
    $date = $Catalog->getDate();

    if ($_FILES && $_FILES["files"]["error"] == UPLOAD_ERR_OK) {
        $file_name = $_FILES["file"]["name"];
        $path_file = $_FILES["file"]["tmp_name"];
        $dir = "C:/xampp/htdocs/dashboard/php-web/resources/download/" . $file_name;
        move_uploaded_file($path_file, $dir);
    }

    $catalogDao = new CatalogDao();
    $catalogDao->save($image, $title, $price, $date);
    $url = 'http://localhost/dashboard/php-web/catalog/view/form_catalog.php';
    header('Location: ' . $url);
}

if (isset($_GET['delete'])) {
    $id_delete = $_GET['delete'];
    $catalogDao = new CatalogDao();
    $catalogDao->delete($id_delete);
    $url = 'http://localhost/dashboard/php-web/catalog/view/form_catalog.php';
    header('Location: ' . $url);
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $image = $_FILES['file']['name'];
    $date = $_POST['file_date'];

    if ($_FILES && $_FILES["files"]["error"] == UPLOAD_ERR_OK) {
        $path_file = $_FILES["file"]["tmp_name"];
        $dir = "C:/xampp/htdocs/dashboard/php-web/resources/download/" . $image;
        move_uploaded_file($path_file, $dir);
    }
    $catalogDao = new CatalogDao();
    $catalogDao->update($id, $image, $title, $price, $date);
    $url = 'http://localhost/dashboard/php-web/catalog/view/form_catalog.php';
    header('Location: ' . $url);
}



