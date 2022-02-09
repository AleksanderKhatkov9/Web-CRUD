<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Php web</title>
    <link rel="stylesheet" type="text/css" href="../resources/boostrap/bootstrap-4.5.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../resources/boostrap/css/fon.css">
    <link rel="stylesheet" type="text/css" href="../resources/boostrap/css/mystyle.css">
    <script src="../resources/boostrap/bootstrap-4.5.3/js/bootstrap.min.js"></script>
    <script src="../resources/boostrap/JS/jQuery/jquery.js"></script>
    <script src="../resources/boostrap/JS/charts/Chart.js"></script>
</head>


<body>
<div class="container">
    <div class="header">
        <h1>My web application</h1>
        <p>A website created by me.</p>
    </div>

    <div class="navbar">
        <a href="../web/add.html" title="Добавить">Добавить</a>
        <a href="../web/update.php" title="Информация">Вывод информации</a>
        <a href="../web/graf.php" title="Назад">График</a>
        <a href="../web/index.html" title="Назад">Меню</a>
    </div>

    <div class="row">
        <div class="container">
            <div class="jumbotron">

                <div class="image">
                    <img src="https://habrastorage.org/webt/ob/nj/79/obnj79drephojpxybt16szulo1k.jpeg" class="rounded"
                         alt="Cinque Terre" width="200" height="150"><br><br>

                    <?php
                    include 'C:\xampp\htdocs\dashboard\php-web\controller\Diagramm.php';

                    if (isset($_POST['submit'])) {
                        $post = $_POST['agent_id'];
                        $type = $post;
                        $mass1 = array('B1', 'B2', 'B3', 'B4', 'B5');
                        $mass2 = array(5, 8784, 7, 8999, 8, 8787, 5, 8767, 10, 6865);
                        $diagram = new Diagramm();
                        $diagram->paramData($mass1, $mass2, $type);

                    } else {
                        echo "No: График <br>";
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="container mt-3">
            <div class="footer">
                <div class="media border p-3">
                    <img src="../resources/image/face.jpg" alt="John Doe" class="mr-3 mt-3 rounded-circle"
                         style="width:60px;">
                    <div class="media-body">
                        <h4>John Doe <small><i>Posted on February 19, 2016</i></small></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>


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

