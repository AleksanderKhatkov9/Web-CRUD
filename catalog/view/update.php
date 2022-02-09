<?php
include 'C:/xampp/htdocs/dashboard/php-web/catalog/dao/CatalogDao.php';
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
    <!--    <link rel="stylesheet" type="text/css" href="http://localhost/dashboard/php-web/catalog/styles/font.css">-->
    <!--    <script src="https://ajax.googleapis.com/ajax/ libs/jquery/3.5.1/jquery.min.js"></script>-->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/dashboard/php-web/catalog/styles/font.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="../resources/boostrap/JS/jQuery/jquery.js"></script>


</head>


<body>

<?php
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $catalogDao = new CatalogDao();
    $param = $catalogDao->getId($id);
    foreach ($param as $value) {
        $image = $value['image'];
        $title = $value['title'];
        $price = $value['price'];
        $date = $value['date'];
    }
}

?>

<div class="modal-dialog">
    <div class="modal-content">
        <form action="http://localhost:63342/php-web/catalog/controller/Ajax.php" method="POST"
              enctype="multipart/form-data">
            <div class="modal-header">
                <h4 class="modal-title">Edit Catalog</h4>
                <button type="button" class="close" name="close" id="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="id"
                           id="edit_id" value="<?php echo $id; ?>" required>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label>Name file</label>
                        <input type="file" class="form-control" name="file" id="file" value="<?php echo $image ?>"
                               required>
                    </div>
                    <div class="form-group">
                        <label>Name catalog</label>
                        <input type="text" class="form-control" name="title" id="title" value="<?php echo $title; ?>"
                               required>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" name="price" id="price" value="<?php echo $price ?>"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Date_file</label>
                        <input type="date" class="form-control" name="file_date" id="file_date"
                               value="<?php echo $date ?>" required>
                    </div>


                </div>


                <div class="modal-footer">
                    <input type="submit" class="btn btn-info" name="update" id="update" value="Save">
                    <input type="reset" class="btn btn-danger" data-dismiss="modal" name="close_f" id="close_f"
                           value="Cancel">
                </div>
        </form>
    </div>
</div>

<script>

    $(document).ready(function () {
        $("#close").click(function () {
            window.location = 'http://localhost/dashboard/php-web/catalog/view/form_catalog.php';
        });

        $("#close_f").click(function () {
            window.location = 'http://localhost/dashboard/php-web/catalog/view/form_catalog.php';
        });


    });

</script>


</body>
</html>


