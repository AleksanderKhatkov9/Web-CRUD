<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit</title>
    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
    <!--    <script src="https://ajax.googleapis.com/ajax/ libs/jquery/3.5.1/jquery.min.js"></script>-->

    <link rel="stylesheet" type="text/css" href="../resources/bootstrap/bootstrap-4.5.3/css/bootstrap.min.css">
    <script src="../resources/bootstrap/bootstrap-4.5.3/js/bootstrap.min.js"></script>
    <script src="../resources/bootstrap/JS/jQuery/jquery.js"></script>

    <style>
        #link {
            cursor: pointer;
            color: blue;
            text-decoration: underline;
        }
    </style>
    <script>
        function showForm() {
            document.getElementById("id").hidden = true;
        }
    </script>


</head>
<body>

<?php
include 'C:/xampp/htdocs/dashboard/php-web/dao/DaoUser.php';
?>

<?php
$id = $_GET['edit'];
$var = new DaoUser();
$param = $var->getId($id);
?>

<?php foreach ($param as $value) { ?>
    <?php $name = $value['name'] ?>
    <?php $password = $value['password'] ?>
    <?php $email = $value['email'] ?>
<?php } ?>


<div class="container">
    <div class="jumbotron">
        <br><br><br>
        <form action="../controller/Ajax.php" method="POST" onclick="showForm()">
            <table class="table">
                <h3 class="text-info"> Edit
                    <tr>
                        <td class="text-primary"></td>
                        <td><input type="hidden" readonly="readonly" id="id" name="id" value="<?php echo $id ?>"
                                   size="0"/></td>
                    </tr>


                    <tr>
                        <td class="text-primary">Имя</td>
                        <td><input type="text" id="name" name="name" value="<?php echo $name ?>" size="30"/></td>
                    </tr>
                    <tr>
                        <td class="text-primary">Пароль</td>
                        <td><input type="password" id="password" name="password" value="<?php echo $password ?>"
                                   size="30"/>
                    </tr>
                    <tr>
                        <td class="text-primary">Почта</td>
                        <td><input type="email" id="email" name="email" value="<?php echo $email ?>" size="30"/>
                    </tr>
            </table>
            <button type="submit" class="btn btn-success" name="edit" id="edit">Отправить</button>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <button type="reset" class="btn btn-danger" name="update" id="del">Отмена</button>
        </form>
    </div>
</div>
</body>
</html>