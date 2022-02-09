<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
    <!--    <script src="https://ajax.googleapis.com/ajax/ libs/jquery/3.5.1/jquery.min.js"></script>-->
    <link rel="stylesheet" type="text/css" href="../resources/bootstrap/bootstrap-4.5.3/css/bootstrap.min.css">
    <script src="../resources/bootstrap/bootstrap-4.5.3/js/bootstrap.min.js"></script>
    <script src="../resources/bootstrap/JS/jQuery/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="../resources/bootstrap/css/fon.css">


</head>

<body>
<?php
include 'C:\xampp\htdocs\dashboard\php-web\dao\DaoUser.php';
?>

<div class="container">

    <div class="header">
        <h1>My web application</h1>
        <p>A website created by me: Aleksander Hatkov.</p>
    </div>

    <div class="navbar">
        <a href="add.html" title="Добавить">Create</a>
        <a href="../catalog/view/form_catalog.php" title="Catalog">Catalog</a>
    </div>


    <?php
    $var = new DaoUser();
    $param = $var->getAll();
    ?>


    <div class="row">
        <div class="container">
            <div class="jumbotron">

                <table class="table">
                    <h2 class="align-content-center">Admin panel</h2>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>


                    <?php foreach ($param as $value) { ?>
                        <tr>
                            <td><?php echo $value['id'] ?></td>
                            <td><?php echo $value['name'] ?></td>
                            <td><?php echo $value['password'] ?></td>
                            <td><?php echo $value['email'] ?></td>

                            <td>
                                <a href="edit.php?edit=<?php echo $value['id']; ?>">Edit</a>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="../controller/Ajax.php?delete=<?php echo $value['id']; ?>">Delete</a>

                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>

        <div class="container mt-3">
            <div class="footer">
                <div class="media border p-3">
                    <img src="../resources/image/ava.png" alt="John Doe" class="mr-3 mt-3 rounded-circle"
                         style="width:60px;">
                    <div class="media-body">

                        <h4>John Doe <small><i>Posted on February 19, 2016</i></small></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>


                        <p style="font-size:30px">
                            &#128512; &#128516; &#128525; &#128400;

                            <!--                    <h4>John Doe <small><i>Posted on February 19, 2016</i></small></h4>-->
                            <!--                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut-->
                            <!--                        labore et dolore magna aliqua.</p>-->
                            <!--                    <p style="font-size:30px">-->
                            &#128512; &#128516; &#128525; &#128400;
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>