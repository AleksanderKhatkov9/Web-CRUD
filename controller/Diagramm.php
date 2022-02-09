<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Php web</title>

    <link rel="stylesheet" type="text/css" href="../resources/boostrap/bootstrap-4.5.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../resources/boostrap/css/fon.css">
    <script src="../resources/boostrap/bootstrap-4.5.3/js/bootstrap.min.js"></script>
    <script src="../resources/boostrap/JS/jQuery/jquery.js"></script>
    <script src="../resources/boostrap/JS/charts/Chart.js"></script>
    <script src="../resources/boostrap/JS/js/ajax.js"></script>
</head>
<body>

<?php

global $data_Post;

class Diagramm
{

    function paramData($data1, $data2, $type)
    {

        $json1 = json_encode($data1);
        $json2 = json_encode($data2);


        for ($i = 1; $i < 2; $i++) {
            $id = $i;
            $data = $type;
            ?>

            <script type="text/javascript">
                $(function () {
                    var ctx = document.getElementById('<?php echo $id; ?>').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: '<?php echo $data; ?>',
                        data: {
                            labels:
                            <?php echo $json1; ?>,
                            datasets: [{
                                label: 'График', data:
                                <?php echo $json2; ?>,

                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor:
                                    ['rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                });
            </script>

            <div id="graf1" style="width:800px;height:800px">
                <canvas id="<?php echo $id; ?>"></canvas>
            </div>

            <?php
        }
    }
}

?>

</body>
</html>

