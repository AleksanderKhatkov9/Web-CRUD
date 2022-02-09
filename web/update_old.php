<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    <link rel="stylesheet" type="text/css" href="../resources/boostrap/bootstrap-4.5.3/css/bootstrap.min.css">
    <script src="../resources/boostrap/bootstrap-4.5.3/js/bootstrap.min.js"></script>
    <script src="../resources/boostrap/JS/jQuery/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="../resources/boostrap/css/fon.css">
</head>

<body>
<?php
include "C:/xampp/htdocs/dashboard/php-web/dao/Globals.php";
?>

<div class="container">
    <div class="header">
        <h1>My web application</h1>
        <p>A website created by me: Aleksander Hatkov.</p>
    </div>

    <div class="navbar">
        <a href="update.php" title="Информация">Вывод информации</a>
        <a href="graf.php" title="График">Вывод графика</a>
    </div>

    <!--    <div class="form-group">-->
    <!--    <form method="post" action="">-->
    <!--        <label for="" style="font-size: 20px">Панель управления</label>-->
    <!--        <select name="for_panel">-->
    <!--            <option value="98">редактирование</option>-->
    <!--            <option value="14">просмотер</option>-->
    <!--            <input class="" type="submit" value="Вход">-->
    <!--        </select>-->
    <!--    </form>-->
    <!--    </div>-->


    <div class="form-group">
        <form method="post" action="">
            <label for="exampleFormControlSelect1">Админ панель</label>
            <select name="form-control" class="form-control">
                <option value="98">Admin</option>
                <option value="14">User</option>
                <input class="" type="submit" value="Вход" size="50">
            </select>
        </form>
    </div>
    <?php
    if (!empty($_POST['form-control'])) {
    $panel = $_POST['form-control'];

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    $limit = 3;
    $start_from = ($page - 1) * $limit;
    $conn = Globals::getPDOConnection('phpdb');
    $query = "SELECT * FROM phpdb.user  LIMIT $start_from, $limit";
    try {
        $res = $conn->prepare($query);
        $res->execute();
        $num = $res->rowCount();
        $res = $res->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "<br> Исключение: " . __FILE__ . " " . __LINE__ . " " . $e->getMessage() . "<br>";
    }

    if ($panel == 98){

    ?>

    <div class="row">
        <div class="container">
            <div class="jumbotron">
                <table class="table">
                    <h2 class="align-content-center">Информация</h2>
                    <tr>
                        <th>ID</th>
                        <th>Имя</th>
                        <th>Пароль</th>
                        <th>Почта</th>
                        <th>Действия</th>
                    </tr>

                    <?php foreach ($res as $value) { ?>
                        <tr>
                            <td><?php echo $value['id'] ?></td>
                            <td><?php echo $value['name'] ?></td>
                            <td><?php echo $value['password'] ?></td>
                            <td><?php echo $value['email'] ?></td>

                            <td>
                                <a href="edit.php?edit=<?php echo $value['id']; ?>">Update</a>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="../controller/UserAdd.php?delete=<?php echo $value['id']; ?>">Delete</a>

                            </td>
                        </tr>
                    <?php } ?>
                </table>

                <?php

                $limit = 3;
                $start_from = ($page - 1) * $limit;
                $conn = Globals::getPDOConnection('phpdb');
                $query = "SELECT COUNT(id) FROM phpdb.user";
                try {
                    $res = $conn->prepare($query);
                    $res->execute();
                    $num = $res->rowCount();
                    $res = $res->fetchAll(PDO::FETCH_ASSOC);
                } catch (Exception $e) {
                    echo "<br> Исключение: " . __FILE__ . " " . __LINE__ . " " . $e->getMessage() . "<br>";
                }
                $total_records = $res[0];
                foreach ($total_records as $value) {
                    $count = $value;
                }
                $total_pages = ceil($count / $limit);
                $pagLink = "<ul class='pagination'>";
                for ($i = 1; $i <= $total_pages; $i++) {
                    $pagLink .= "<li class='page-item'><a class='page-link' href='http://localhost:8080/dashboard/php-web/web/update.php?page=" . $i . "'>" . $i . "</a></li>";
                }
                echo $pagLink . "</ul>";


                }else{
                ?>
                <div class="row">
                    <div class="container">
                        <div class="jumbotron">

                            <table class="table">
                                <h2 class="align-content-center">Информация</h2>
                                <tr>
                                    <th>ID</th>
                                    <th>Имя</th>
                                    <th>Пароль</th>
                                    <th>Почта</th>
                                </tr>

                                <?php foreach ($res as $value) { ?>
                                    <tr>
                                        <td><?php echo $value['id'] ?></td>
                                        <td><?php echo $value['name'] ?></td>
                                        <td><?php echo $value['password'] ?></td>
                                        <td><?php echo $value['email'] ?></td>

                                    </tr>
                                <?php } ?>
                            </table>

                            <?php
                            try {
                                $limit = 3;
                                $start_from = ($page - 1) * $limit;
                                $conn = Globals::getPDOConnection('phpdb');
                                $query = "SELECT COUNT(id) FROM phpdb.user";
                                $res = $conn->prepare($query);
                                $res->execute();
                                $num = $res->rowCount();
                                $res = $res->fetchAll(PDO::FETCH_ASSOC);
                            } catch (Exception $e) {
                                echo "<br> Исключение: " . __FILE__ . " " . __LINE__ . " " . $e->getMessage() . "<br>";
                            }
                            $total_records = $res[0];
                            foreach ($total_records as $value) {
                                $count = $value;
                            }
                            $total_pages = ceil($count / $limit);

                            $pagLink = "<ul class='pagination'>";
                            for ($i = 1; $i <= $total_pages; $i++) {
                                $pagLink .= "<li class='page-item'><a class='page-link' href='http://localhost:8080/dashboard/php-web/web/update.php?page=" . $i . "'>" . $i . "</a></li>";
                            }
                            echo $pagLink . "</ul>";


                            }
                            }
                            ?>

                        </div>
                    </div>

                    <div class="container mt-3">
                        <div class="footer">
                            <div class="media border p-3">
                                <div class="media-body">
                                    <p style="font-size:30px">
                                        &#128512; &#128516; &#128525; &#128400;
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

</body>
</html>