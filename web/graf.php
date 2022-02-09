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
        <a href="add.html" title="Добавить">Добавить</a>
        <a href="update.php" title="Информация">Вывод информации</a>
    </div>


    <div class="row">
        <div class="container">
            <div class="jumbotron">

                <form action="../controller/DiagrammController.php" method="POST">
                    <h2>Валюты</h2>
                    <br>
                    <label for="fname">Валюта</label>
                    <select class="glyphicon glyphicon-circle-arrow-down">
                        <option value="">EUR</option>
                        <option value="">DOLLAR</option>
                        <option value="">RUB</option>
                    </select><br><br>
                    <label for="fname">Графики</label>
                    <select class="glyphicon glyphicon-circle-arrow-down" name="agent_id">
                        <option value="<?php echo $graf1 = 'bar'; ?>">Bar</option>
                        <option value="<?php echo $graf2 = 'line'; ?>">Line</option>
                        <option value="<?php echo $graf3 = 'doughnut'; ?>">Doughnut</option>
                    </select><br><br>
                    <label for="fname">Дата от</label>
                    <input type="date" name="calendar"><br/><br/>
                    <label for="fname">Дата до</label>
                    <input type="date" name="calendar"><br/><br/>
                    <button type="submit" class="btn btn-success" name="submit" id="submit">Отправить</button>
                    &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="click" class="btn btn-danger" name="click" id="click">Отмена</button>
                </form>
                <br><br><br>

                <?php

                ?>

                <div class="text">
                    <h2>
                        10 лучших JavaScript библиотек для визуализации данных на графиках и диаграммах
                    </h2>

                    <p class="col-form-label">
                        Объемы данных, с которыми нужно работать, постоянно увеличиваются.
                        И чем больше информации, тем сложнее ее обрабатывать.
                        Вот почему сейчас стала особенно популярна тема визуализации данных — в виде графиков, диаграмм,
                        дашбордов, желательно интерактивных. Визуальное представление данных позволяет нам, людям,
                        тратить меньше времени и сил на их просмотр, анализ и осмысление, а также на принятие
                        правильных, информированных решений на основе этого.
                    </p>
                    <p>
                        Вряд ли кто-то станет отрицать, что в современном HTML5 вебе JavaScript — самая универсальная и
                        простая технология для визуализации данных. Так что, если вы занимаетесь фронтенд-разработкой,
                        то вы, скорее всего, либо уже имели дело с созданием JS чартов, либо столкнетесь с этим в
                        (скором) будущем.
                    </p>
                </div>
                <div class="image">
                    <img src="https://habrastorage.org/webt/ob/nj/79/obnj79drephojpxybt16szulo1k.jpeg" class="rounded"
                         alt="Cinque Terre" width="200" height="150">
                </div>
                <div class="video">
                    <iframe width="420" height="345" src="https://www.youtube.be/embed/tgbNymZ7vqY">
                    </iframe>

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


</div>
</div>


</body>
</html>