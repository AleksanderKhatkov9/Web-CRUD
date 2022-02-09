<!DOCTYPE html>
<html lang="en">
<head>
    <title>Authorization</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../resources/bootstrap/bootstrap-4.5.3/css/bootstrap.min.css">
    <script src="../resources/bootstrap/bootstrap-4.5.3/js/bootstrap.min.js"></script>
    <script src="../resources/bootstrap/JS/jQuery/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="../resources/bootstrap/css/fon.css">
</head>

<style>
    input:valid {
        border-color: green;
    }
    input:invalid {
        border-color: red;
    }
</style>


<body>
<div class="row">
    <div class="container">
        <div class="header">
            <h1>Product catalog</h1>
        </div>
        <div class="navbar">
        </div>

        <div class="jumbotron">
            <h2 class style="color: #1abc9c">Авторизация</h2><br>
            <img src="../resources/image/ava.png" class="rounded"
                 alt="ava" width="200" height="170"><br><br>

            <form action="" method="post">
                <div class="form-" col-sm-10">
                <label for="name" style="color: #1abc9c; font-size: 20px;">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" size="50%">
        </div>
        <div class="form-" col-sm-10" >
        <label for="pwd" style="color: #1abc9c; font-size: 20px;">Password:</label>
        <input type="password" class="form-control" id="password" placeholder="Enter password"
               name="password" size="50%"><br>
    </div>

    <button type="" class="btn btn-primary" id="submit">Вход</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button type="reset" class="btn btn-danger">Очистить</button>&nbsp;

    <div class="form-" col-sm-10">
    &nbsp;&nbsp;
    <button type="button" class="btn btn-success" id="registration">Регестрация</button>
</div>

</form>


<script>
    $(function () {
        $('#submit').click(function () {

            let name = $("#name").val();
            let password = $("#password").val();

            if (name.length === 0) {
                alert('Имя:\nполе обязательно для заполнения');
            }

            if (name.length > 50) {
                alert('Имя:\nполе превышает лимит символов для заполнения');
                console.log("Имя: поле превышает лимит символов для заполнения " + name.length);
                alert('Имя:\nполе =' + name);
            }

            if (password.length === 0) {
                alert('Пароль:\nполе обязательно для заполнения');
            }
            if (password.length > 50) {
                alert('Пароль:\nполе превышает лимит символов для заполнения');
            }

            $.ajax({
                url: "/web/aut.php",
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

        $query = "SELECT user.name, user.password, user.email, ruls.rules_cod From user
        JOIN user_has_ruls ON user.id = user_has_ruls.user_id
        JOIN ruls ON user_has_ruls.user_id = ruls.id";

        $res = $conn->prepare($query);
        $res->execute();
        $num = $res->rowCount();
        $res = $res->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "<br> Исключение: " . __FILE__ . " " . __LINE__ . " " . $e->getMessage() . "<br>";
    }

for ($i = 0; $i < $num; $i++) {
    $name = $res[$i]['name'];
    $password = $res[$i]['password'];
    $rules = $res[$i]['rules_cod'];


if ($get_name == $name && $get_password == $password) {
    ?>
    <script>
        let rules = "<?php echo $rules ?>";

        if(rules == 98){
            location.href = "http://localhost/dashboard/php-web/web/update.php";
        }else {
            location.href = "http://localhost/dashboard/php-web/catalog/view/form_catalog.php";
        }
    </script>
<?php
}
}
?>
    <script>
        $(function () {
            $("#registration").css('display', 'block');
            $('#registration').click(function () {
                location.href = "http://localhost/dashboard/php-web/web/add.html";
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
                    <img src="../resources/image/ava.png" alt="John Doe" class="mr-3 mt-3 rounded-circle"
                         style="width:60px;">
                    <div class="media-body">
                        <h4>Sasha Hatkov <small><i> The web aplication product catalog</i></small></h4>
                        <p>The web application used is used to store product catalog data</p>
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

