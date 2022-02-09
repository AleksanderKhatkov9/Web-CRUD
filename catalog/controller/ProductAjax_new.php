<?php
/***
 * @author  Sasha Hatkova
 *файл используются для пренятия данных от формы на контроллер
 * который принимает запросы и отпровлет в методы для записи данных в mysql
 */


echo "ProductAjax_new.php";

//if (isset($_POST["submit"])) {
    $page1 = $_POST['product'];
    var_dump($page1);
    echo $page1 . "<br>";
    $page2 = $_POST['price'];
    echo $page2 . "<br>";


//}