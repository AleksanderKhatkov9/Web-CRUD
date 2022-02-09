<?php

/**
 * @autor Sasha Hatkov
 * этот класс релизован при помощи патерна mvc
 * класс Ajax.php отвечает за принятие прихоящих запросов от формы
 * @todo переписать на pdo +
 * @todo переминовать файл  +
 */

include 'C:/xampp/htdocs/dashboard/php-web/dao/DaoUser.php';
include 'C:/xampp/htdocs/dashboard/php-web/entity/User.php';

$id = null;
$name = $_POST["name"];
$password = $_POST["password"];
$email = $_POST["email"];

$connection = new DaoUser();
if (isset($_POST['add'])) {
    echo "Yes :ADD <br>";
    echo
        "Ваша id:<b>" . $id . "<br></b>" .
        "Ваше имя: <b>" . $name . "<br></b>" .
        "Ваш пароль:<b> " . $password . "<br></b>" .
        "Ваш email: <b> " . $email . "<br></b>";

    $user = new User($id,$name, $password, $email);

    echo "NAME: <b> " . $user->getName() . "<br></b>" .
        "PASSWORD: <b> " . $user->getPassword() . "<br></b>" .
        "EMAIL: <b> " . $user->getEmail() . "<br></b>";
    $connection->save($user);

    echo "Yes :ADD <br>";
    $url = 'http://localhost/dashboard/php-web/web/update.php';
    header('Location: ' . $url);
    echo "<br>";
} else {
    echo "No: ADD <br>";
}

if (isset($_POST['edit'])) {
    $id = $_POST['id'];

    echo "ID : " . $id . "<br>";
    echo "Name : " . $name . "<br>";
    echo "Password : " . $password . "<br>";
    echo "Email : " . $email . "<br>";

    $connection->update($id, $name, $password, $email);
    $url = 'http://localhost/dashboard/php-web/web/update.php';
    header('Location: ' . $url);
} else {
    echo "No: Edit <br>";
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $connection->delete($id);
    $new_url = 'http://localhost/dashboard/php-web/web/update.php';
    header('Location: ' . $new_url);
} else {
    echo "No: Delete <br>";
}
