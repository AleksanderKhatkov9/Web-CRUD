<head>
    <meta charset="utf-8">
    <title>Отправка файла на сервер</title>

    <link rel="stylesheet" type="text/css" href="../resources/boostrap/bootstrap-4.5.3/css/bootstrap.min.css">
    <script src="../resources/boostrap/bootstrap-4.5.3/js/bootstrap.min.js"></script>
    <script src="../resources/boostrap/JS/jQuery/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="../resources/boostrap/css/fon.css">

</head>
<body>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="files" id="files">
    <button type="submit" class="btn btn-success" name="submit" id="submit">Отправить</button>
</form>


<?php
if (isset($_POST['submit'])) {
    if ($_FILES && $_FILES["files"]["error"] == UPLOAD_ERR_OK) {
        $file_name = $_FILES["files"]["name"];
        $path_file = $_FILES["files"]["tmp_name"];
        $dir = "C:/xampp/htdocs/dashboard/php-web/resources/download/" . $file_name;
        move_uploaded_file($path_file, $dir);
        $path = "../../php-web/resources/download/" . $file_name;
    }
}

//$res = substr($file_name, strripos($file_name, '.') + 1) . "<br>";
//echo substr($str,strripos($str,'/')); // docx
//$file_pdf = basename($dir, 'doc');
//echo $file_pdf."pdf";
//if ($res == 'pdf') { //Error
//    $file_doc = basename($dir, 'doc');
//    $path = "../../php-web/resources/download/" . $file_name."doc";
//} else {
//    $file_doc = basename($dir, 'doc');
//    $path = "../../php-web/resources/download/" . $file_doc."pdf";
//    echo "No<br>";
//}
//$var2 = rename($var1, "pdf");
//$var3 = $info = new SplFileInfo($dir);
//print_r($var3);
?>


<iframe name="pdf" id="pdf" style="text-align: center; width: 100%; height: 100%;" src="<?= $path; ?>"></iframe>
</body>
