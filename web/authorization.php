<!DOCTYPE html>
<html lang="en">
<head>
    <title>Authorization</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../resources/boostrap/bootstrap-4.5.3/css/bootstrap.min.css">
    <script src="../resources/boostrap/bootstrap-4.5.3/js/bootstrap.min.js"></script>
    <script src="../resources/boostrap/JS/jQuery/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="../resources/boostrap/css/fon.css">
</head>

<body>

<div class="row">
    <div class="container">
        <div class="header">
            <h1>My web application</h1>
            <p>A website created by me: Aleksander Hatkov.</p>
        </div>
        <div class="navbar">
            <!--            <a href="add.html" title="Добавить">Создать</a>-->
        </div>

        <div class="jumbotron">
            <h2>Авторизация</h2><br>
            <img src="../resources/image/ava.png" class="rounded"
                 alt="ava" width="200" height="170"><br>
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password"
                           name="password">
                </div>
                <div class="form-group form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember"> Remember me
                    </label>
                </div>
                <button type="submit" class="btn btn-primary" id="submit">Вход</button> &nbsp;&nbsp;&nbsp;&nbsp;
                <button type="reset" class="btn btn-danger">Очистить</button>
            </form>


            <script>
                $(function () {
                    $('#submit').click(function () {
                        let name = $("#name").val();
                        let password = $("#password").val();
                        //проверка name
                        if (name.length === 0) {
                            alert('Имя:\nполе обязательно для заполнения');
                            console.log("Имя: поле обязательно для заполнения");
                        } else if (name.length > 50) {
                            alert('Имя:\nполе превышает лимит символов для заполнения');
                            console.log("Имя: поле превышает лимит символов для заполнения " + name.length);
                            alert('Имя:\nполе =' + name);
                        } else {
                            console.log("name: " + name);
                        }

                        //проверка password
                        if (password.length === 0) {
                            alert('Пароль:\nполе обязательно для заполнения');
                            console.log("Пароль: поле обязательно для заполнения");
                            // console.log(id_password);
                        } else if (password.length > 50) {
                            alert('Пароль:\nполе превышает лимит символов для заполнения');
                            console.log("Пароль: поле превышает лимит символов для заполнения " + password.length);
                        } else {
                            console.log("password: " + password);
                        }

                        $.ajax({
                            url: "/web/authorization.php",
                            method: "POST",
                            data: {
                                'name': name,
                                'password': password,
                            },
                            dataType: "html",
                            success: function (data) {
                                if (data != null) {
                                    alert("данные отправлены" + name);
                                }
                            }
                        });
                    });

                    $("#registration").css('display', 'none');
                });
            </script>

        </div>
        <?php
        include "C:/xampp/htdocs/dashboard/php-web/dao/Globals.php";
        if (!empty($_POST)) {
            $get_name = $_POST['name'];
            $get_password = $_POST['password'];
            try {
                $conn = Globals::getPDOConnection('phpdb');
                $query = "SELECT * FROM user";
                $res = $conn->prepare($query);
                $res->execute();
                $num = $res->rowCount();
                $res = $res->fetchAll(PDO::FETCH_ASSOC);

            } catch (Exception $e) {
                echo "<br> Исключение: " . __FILE__ . " " . __LINE__ . " " . $e->getMessage() . "<br>";
            }

        for ($i = 0;$i < $num;$i++) {
            $name = $res[$i]['name'];
            $password = $res[$i]['password'];

        if ($get_name == $name && $get_password == $password) {
            ?>
            <script>
                location.href = "http://localhost:8080/dashboard/php-web/web/update.php";
            </script>
        <?php
        }
        }
        ?>
            <div id="form" style="color: #8a6d3b">
                <button type="button" class="btn btn-success" id="registration">Регестрация</button>
            </div>

            <script>
                $(function () {
                    $("#registration").css('display', 'block');
                    $('#registration').click(function () {
                        location.href = "http://localhost:8080/dashboard/php-web/web/add.html";
                    });
                });
            </script>

            <?php
        }
        ?>

        <div class="row">
            <div class="container mt-3">
                <div class="jumbotron">
                    <div class="footer">
                        <div class="media border p-3">
                            <img src="../resources/image/face.jpg" alt="John Doe" class="mr-3 mt-3 rounded-circle"
                                 style="width:60px;">
                            <div class="media-body">
                                <p style="font-size:30px">
                                    &#128512; &#128516; &#128525; &#128400;
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

