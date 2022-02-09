<?php
/***
 * @author Sasha Hatkov
 */
include 'C:/xampp/htdocs/dashboard/php-web/catalog/dao/CatalogDao.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Catalog product</title>
    <link rel="stylesheet" type="text/css" href="../../resources/bootstrap/css/fon.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/ libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../resources/bootstrap/bootstrap-4.5.3/css/bootstrap.min.css">

    <script src="../../resources/bootstrap/bootstrap-4.5.3/js/bootstrap.min.js"></script>
    <script src="../../resources/bootstrap/JS/jQuery/jquery.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/dashboard/php-web/catalog/styles/font.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="../../resources/bootstrap/JS/jQuery/jquery.js"></script>


    <style>
        body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            font-size: 13px;
        }
        .table-responsive {
            margin: 30px 0;
        }
        .table-wrapper {
            background: #fff;
            padding: 20px 25px;
            border-radius: 3px;
            min-width: 1000px;
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
        .table-title {
            padding-bottom: 15px;
            background: #435d7d;
            color: #fff;
            padding: 16px 30px;
            min-width: 100%;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }
        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }
        .table-title .btn-group {
            float: right;
        }
        .table-title .btn {
            color: #fff;
            float: right;
            font-size: 13px;
            border: none;
            min-width: 50px;
            border-radius: 2px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }
        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }
        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }
        table.table tr th, table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }
        table.table tr th:first-child {
            width: 60px;
        }
        table.table tr th:last-child {
            width: 100px;
        }
        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }
        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }
        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }
        table.table td:last-child i {
            opacity: 0.9;
            font-size: 22px;
            margin: 0 5px;
        }
        table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
            outline: none !important;
        }
        table.table td a:hover {
            color: #2196F3;
        }
        table.table td a.edit {
            color: #FFC107;
        }
        table.table td a.delete {
            color: #F44336;
        }
        table.table td i {
            font-size: 19px;
        }
        table.table .avatar {
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }
        .pagination {
            float: right;
            margin: 0 0 5px;
        }
        .pagination li a {
            border: none;
            font-size: 13px;
            min-width: 30px;
            min-height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 2px !important;
            text-align: center;
            padding: 0 6px;
        }
        .pagination li a:hover {
            color: #666;
        }
        .pagination li.active a, .pagination li.active a.page-link {
            background: #03A9F4;
        }
        .pagination li.active a:hover {
            background: #0397d6;
        }
        .pagination li.disabled i {
            color: #ccc;
        }
        .pagination li i {
            font-size: 16px;
            padding-top: 6px
        }
        .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
        }
        /* Custom checkbox */
        .custom-checkbox {
            position: relative;
        }
        .custom-checkbox input[type="checkbox"] {
            opacity: 0;
            position: absolute;
            margin: 5px 0 0 3px;
            z-index: 9;
        }
        .custom-checkbox label:before{
            width: 18px;
            height: 18px;
        }
        .custom-checkbox label:before {
            content: '';
            margin-right: 10px;
            display: inline-block;
            vertical-align: text-top;
            background: white;
            border: 1px solid #bbb;
            border-radius: 2px;
            box-sizing: border-box;
            z-index: 2;
        }
        .custom-checkbox input[type="checkbox"]:checked + label:after {
            content: '';
            position: absolute;
            left: 6px;
            top: 3px;
            width: 6px;
            height: 11px;
            border: solid #000;
            border-width: 0 3px 3px 0;
            transform: inherit;
            z-index: 3;
            transform: rotateZ(45deg);
        }
        .custom-checkbox input[type="checkbox"]:checked + label:before {
            border-color: #03A9F4;
            background: #03A9F4;
        }
        .custom-checkbox input[type="checkbox"]:checked + label:after {
            border-color: #fff;
        }
        .custom-checkbox input[type="checkbox"]:disabled + label:before {
            color: #b8b8b8;
            cursor: auto;
            box-shadow: none;
            background: #ddd;
        }
        /* Modal styles */
        .modal .modal-dialog {
            max-width: 400px;
        }
        .modal .modal-header, .modal .modal-body, .modal .modal-footer {
            padding: 20px 30px;
        }
        .modal .modal-content {
            border-radius: 3px;
            font-size: 14px;
        }
        .modal .modal-footer {
            background: #ecf0f1;
            border-radius: 0 0 3px 3px;
        }
        .modal .modal-title {
            display: inline-block;
        }
        .modal .form-control {
            border-radius: 2px;
            box-shadow: none;
            border-color: #dddddd;
        }
        .modal textarea.form-control {
            resize: vertical;
        }
        .modal .btn {
            border-radius: 2px;
            min-width: 100px;
        }
        .modal form label {
            font-weight: normal;
        }
    </style>




</head>


<body>
<div class="container">
    <div class="header">
        <h1>My web application</h1>
        <p>A website created by me: Aleksander Hatkov.</p>
    </div>

    <div class="navbar">
        <a href="http://localhost/dashboard/php-web/web/add.html" title="Back to menu ">Back</a>
    </div>


    <div class="row">
        <div class="container">
            <div class="jumbotron">
                <div class="container-xl">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h2>Catalog <b>Poroduct</b></h2>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i
                                                    class="material-icons">&#xE147;</i>
                                            <span>Add New Employee</span></a>

                                        <form name="search" method="post"
                                              action="http://localhost/dashboard/php-web/catalog/view/form_catalog.php">
                                            <input type="search" name="search" id="search" placeholder="Поиск">
                                            <button type="submit">Найти</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>N</th>
                                    <!--                                     <th>ID</th>-->
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <?php
                                    $post_search = null;
                                    if (isset($_POST['search'])) {
                                        $search = $_POST['search'];
                                        $post_search = $search;
                                    }
                                    $count = 1;
                                    if (isset($_GET['page'])) {
                                        $page = $_GET['page'];
                                    } else {
                                        $page = 1;
                                    }
                                    $limit = 5;
                                    $start_from = ($page - 1) * $limit;

                                    $dao = new CatalogDao();
                                    $result = $dao->link1($start_from, $limit);

                                    if ($post_search == "") {
                                        $dao = new CatalogDao();
                                        $result = $dao->link1($start_from, $limit);
                                    } else {
                                        $dao = new CatalogDao();
                                        $result = $dao->find($search);

                                    }
                                    $path = "../../resources/download/";
                                    ?>
                                    <?php foreach ($result as $value) { ?>
                                <tr>

                                    <td><?php echo $count++; ?></td>
                                    <td><img src="<?php echo $path . $value['image']; ?>" style="width: 40%"></td>
                                    <td><?php echo $value['title'] ?></td>
                                    <td><?php echo $value['price'] ?></td>
                                    <!--                                    <td>--><?php //echo $value['date'] ?><!--</td>-->

                                    <td><?php
                                        $date = $value['date'];
                                        $arr=explode('-',$date);
                                        $d1 = $arr[1];$d2 = $arr[2];$d3 = $arr[0];
                                        echo $d1.".".$d2.".".$d3;
                                        ?></td>



                                    <td>
                                        <a href="update.php?edit=<?php echo $value['id']; ?> " class="edit"
                                           data-toggle=""><i class="material-icons" data-toggle="" title="">&#xE254;</i></a>
                                        <a href="../controller/Ajax.php?delete=<?php echo $value['id']; ?>"
                                           class="delete"><i class="material-icons" data-toggle="tooltip"
                                                             title="Delete">&#xE872;</i></a>
                                    </td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>

                            <?php
                            $daoCatalog = new CatalogDao();
                            $result = $daoCatalog->link2();
                            $total_records = $result[0];

                            foreach ($total_records as $value) {
                                $count = $value;
                            }
                            $total_pages = ceil($count / $limit);
                            //$pagLink = "<ul class='pagination'>";
                            for ($i = 1;
                            $i <= $total_pages;$i++) {
                            //$pagLink .= "<li class='page-item'><a class='page-link' href='http://localhost/dashboard/php-web/catalog/view/form_catalog.php?page=" . $i . "'>" . $i . "</a></li>";
                            //                            }
                            //                            echo $pagLink . "</ul>";
                            ?>


                            <div class="clearfix">
                                <!--                                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>-->
                                <ul class="pagination">

                                    <!--                                    <li class="page-item disabled"><a href="#page-link">Previous</a></li>-->
                                    <li class="page-item"><a
                                                href="http://localhost/dashboard/php-web/catalog/view/form_catalog.php?page=<?php echo $i; ?>"
                                                class="page-link"><?php echo $i; ?></a></li>
                                    <?php } ?>

                                    <!--                                     <li class="page-item disabled"><a href="#">Previous</a></li>-->
                                    <!--                                    <li class="page-item"><a href="#" class="page-link">1</a></li>-->
                                    <!--                                    <li class="page-item"><a href="#" class="page-link">2</a></li>-->
                                    <!--                                    <li class="page-item active"><a href="#" class="page-link">3</a></li>-->
                                    <!--                                    <li class="page-item"><a href="#" class="page-link">4</a></li>-->
                                    <!--                                    <li class="page-item"><a href="#" class="page-link">5</a></li>-->
                                    <!--                                    <li class="page-item"><a href="#" class="page-link">Next</a></li>-->
                                </ul>
                            </div>
                        </div>

                        <!--?php
                        $daoCatalog = new CatalogDao();
                        $result = $daoCatalog->link2();
                        $total_records = $result[0];
                        foreach ($total_records as $value) {
                            $count = $value;
                        }
                        $total_pages = ceil($count / $limit);
                        $pagLink = "<ul class='pagination'>";
                        for ($i = 1; $i <= $total_pages; $i++) {
                           $pagLink .= "<li class='page-item'><a class='page-link' href='http://localhost/dashboard/php-web/catalog/view/form_catalog.php?page=" . $i . "'>" . $i . "</a></li>";
                        }
                        echo $pagLink . "</ul>";
                        ?-->

                    </div>
                </div>


                <!-- ADD Modal HTML -->
                <div id="addEmployeeModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <form action="http://localhost:63342/php-web/catalog/controller/Ajax.php"
                                  method="POST" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Catalog</h4>
                                </div>

                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Name file</label>
                                        <input type="file" class="form-control" name="file" id="file" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Name catalog</label>
                                        <input type="text" class="form-control" name="title" id="title" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" class="form-control" name="price" id="price" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Date_file</label>
                                        <input type="date" class="form-control" name="file_date" id="file_date"
                                               required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-success" name="send" id="send" value="Add">
                                    <input type="reset" class="btn btn-danger" data-dismiss="modal" value="Cancel">
                                </div>
                            </form>
                        </div>


                    </div>
                </div>


                <?php
                //                    if (isset($_POST['search'])) {
                //                        $search = $_POST['search'];
                ////                    echo $search."<br>";
                //
                //                        $dao = new CatalogDao();
                //                        $result = $dao->find($search);
                //
                //                        foreach ($result as $value) {
                //                            echo $value['image']."<br>";
                //                            echo $value['title']."<br>";
                ////                            echo "<td>".$value['price']."</td>";
                ////                            echo "<td>".$value['date']."</td>";
                //                        }
                //                    }
                ?>


            </div>
        </div>
        <div class="container mt-3">
            <div class="footer">
                <div class="media border p-3">
                    <img src="../../resources/image/ava.png" alt="John Doe" class="mr-3 mt-3 rounded-circle"
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
</body>
</html>



