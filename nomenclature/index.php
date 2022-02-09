<?php
/**
 * @author Hatkov Sasha <sashaaa@ad.atlant.by>
 * Этот файл используется для ввывода информации на странице (главный файл)
 * link : http://localhost/atlant/nomenclature/index.php
 * @todo разработать похожий функционал для данной формы nomenclature +
 */
?>
<html>
<title>Документы номенклатуры </title>
<link rel="stylesheet" href="../nomenclature/style/bootstrap.min.css">
<link rel="stylesheet" href="../nomenclature/style/jquery.dataTables.min.css">
<link rel="stylesheet" href="../nomenclature/style/buttons.dataTables.min.css">
<link rel="stylesheet" href="../nomenclature/style/dataTables.bootstrap.min.css">
<script src="../nomenclature/style/jquery-3.5.1.js"></script>
<script src="../nomenclature/style/jquery.dataTables.min.js"></script>
<script src="../nomenclature/style/dataTables.buttons.min.js"></script>
<script src="../nomenclature/style/jszip.min.js"></script>
<script src="../nomenclature/style/pdfmake.min.js"></script>
<script src="../nomenclature/style/vfs_fonts.js"></script>
<script src="../nomenclature/style/buttons.html5.min.js"></script>
<script src="../nomenclature/style/buttons.print.min.js"></script>
<!--<script src="../nomenclature/style/tabledit.min.js"></script>-->


<style>
    .modal-dialog modal-lg {
        width: 50%;
        display: block;
        position: fixed;
        z-index: 99;
        left: 50%;
        transform: translateX(-50%);
        top: 10%;
    }

    .modal-content {
        width: 50%;
        display: block;
        position: fixed;
        z-index: 99;
        left: 50%;
        transform: translateX(-50%);
        top: 10%;
    }
</style>


<?php

include_once("C:/xampp/htdocs/dashboard/php-web/dao/Globals.php");
try {
    $conn = Globals::getPDOConnection('phpdb');
} catch (Exception $e) {
    echo "Error" . $e;
}

//
//include_once("C:/xampp/htdocs/dashboard/php-web/logger/Logger.php");
//Logger::configure("C:/xampp/htdocs/dashboard/php-web/log4php/config.xml");
//Logger::getLogger($name)->log($data);

//include_once("D:\home\atlant\lib\log4php\src\main\php\Logger.php");
//Logger::configure("D:\home\atlant\lib\log4php\config.xml");
//$loger = Logger::getLogger("");
//$loger->info("index.php");

//
//try {
//    include_once("GetInfo.php");
//    include_once("Getupdate.php");
//
//    $a = new GetInfo();
//    $run = $a->info();
//    $role = $run['role'];
//    $fio = $run['fio'];
//    $dept = $run['dept'];
//    $task = $run['task'];
//    $tn = $run['tn'];
//
//} catch (Exception $e) {
//    echo __FILE__ . " " . __LINE__ . " " . $e;
//}


$fio = "Хатьков Александр Александрович";
$tn = '039924';
$task = '16819';
?>
<body>
<div class="container-fluid" style="text-align: center; background-color:azure;">

    <h3 align="center" style=" color: #31639c">
        16819 Документы номенклатуры дел ЗАО «АТЛАНТ»</h3>
    <br/>

    <div class="panel panel-default" style="">
        <div class="role" hidden="false"><?= $role ?></div>
        <div class="hea" hidden="false" align="right"><?= $tn ?></div>
        <div class="task" hidden="false" align="right"><?= $task ?></div>
        <!--div align="right" style="margin: 10px"><!-?= $fio ?>
        </div-->
        <?
        if ($fio != null) {
            ?>
            <div align="right" style="margin: 20px; color:#309a2f; tab-size: 16px">
                <label style="color:#ff9800 ">User:</label>
                <?= $fio ?></div>
            <?
        }
        ?>
        <button type="button" id="btn" class="btn btn-success" data-target="#myModal" data-toggle="modal"
                style="margin: 10px">добавить
        </button>
        <!-- Modal HTML -->
        <div id="myModal" class="modal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <h4 class="modal-title" align="center" style="font-size: 18px; margin: 10px; color: #8a8a94">
                        Добавить документ</h4>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" id="str_doc" class="form-control"
                                   placeholder="Вид и название документов по стандарту:">
                        </div>
                        <div class="form-group">
                            <input type="text" id="nomencl_doc" class="form-control"
                                   placeholder="Вид и название документов по номенклатуре дел:">
                        </div>
                        <div class="form-group">
                            <input type="text" id="storages" class="form-control" placeholder="Место хранения:">
                        </div>
                        <div class="form-group">
                            <input type="text" id="shelf_life" class="form-control" placeholder="Срок хранения:">
                        </div>
                        <div class="form-group">
                            <input type="text" id="notes_item_number" class="form-control"
                                   placeholder="Номер пункта по перечню:">
                        </div>
                        <div class="form-group"
                             style="font-family: 'Times New Roman', Times, serif;  font-size: 16px; text-align: left">
                            <label style="color: #8a8a94; font-size: 16px; margin-right: 20px;  ">Примечание:</label>
                            <input type="text" id="notes" class="form-control" placeholder="Примечание:" value="-">
                        </div>

                        <div class="form-group"
                             style="font-family: 'Times New Roman', Times, serif;  font-size: 16px; text-align: left">
                            <label style="color: #8a8a94; font-size: 16px; margin-right: 20px;  ">Вид стандарта:</label>
                            <select name="documents" id="st_type" class="form-select form-select-lg mb-3"
                                    aria-label=".form-select-lg example"
                                    style="color: #8a8a94; width: 100%; height: 30px">
                                <option value="СТО">СТО</option>
                                <option value="П">П</option>
                                <option value="ОП">ОП</option>
                                <option value="И">И</option>
                                <option value="М">М</option>
                                <option value="ПМ">ПМ</option>
                                <option value="СТО АТЛАНТ">СТО АТЛАНТ</option>
                                <option value="П АТЛАНТ">П АТЛАНТ</option>
                            </select>
                        </div>

                        <div class="form-group"
                             style="font-family: 'Times New Roman', Times, serif;  font-size: 16px; text-align: left">
                            <label style="color: #8a8a94; font-size: 16px; margin-right: 20px;  ">БЕ:</label>
                            <select name="documents" id="st_be" class="form-select form-select-lg mb-3"
                                    aria-label=".form-select-lg example"
                                    style="color: #8a8a94; width: 100%; height: 30px">
                                <option value="01">01</option>
                                <option value="02">02</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="text" id="st_ce" class="form-control" placeholder="СЕ:">
                        </div>
                        <div class="form-group">
                            <input type="text" id="st_num" class="form-control" placeholder="№:">
                        </div>

                        <div class="form-group"
                             style="font-family: 'Times New Roman', Times, serif;  font-size: 16px; text-align: left">
                            <label style="color: #8a8a94; font-size: 16px; margin-right: 20px;  ">Год:</label>
                            <select name="documents" id="st_year" class="form-select form-select-lg mb-3"
                                    aria-label=".form-select-lg example"
                                    style="color: #8a8a94; width: 100%; height: 30px">
                                <option value=2015>2015</option>
                                <option value=2016>2016</option>
                                <option value=2017>2017</option>
                                <option value=2018>2018</option>
                                <option value=2019>2019</option>
                                <option value=2020>2020</option>
                                <option value=2021>2021</option>
                                <option value=2022>2022</option>
                                <option value=2023>2023</option>
                                <option value=2024>2024</option>
                                <option value=2025>2025</option>
                            </select>
                        </div>


                        <div class="form-group"
                             style="font-family: 'Times New Roman', Times, serif;  font-size: 16px; text-align: left">
                            <label style="color: #8a8a94; font-size: 16px; margin-right: 20px;  ">Носитель
                                документа:</label>
                            <select name="documents" id="doc_carrier" class="form-select form-select-lg mb-3"
                                    aria-label=".form-select-lg example"
                                    style="color: #8a8a94; width: 100%; height:30px">
                                <option value="Электронный">Электронный</option>
                                <option value="Бумажный">Бумажный</option>
                                <option value="Электронный+бумажный">Электронный+бумажный</option>
                            </select>
                        </div>
                    </div>
                    <button type="button" id="save" class="btn btn-success" style="margin: 10px">сохранить</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="button" id="close" class="btn btn-danger" data-dismiss="modal" style="margin: 10px">
                        Отмена
                    </button>
                </div>
            </div>
        </div>


        <div class="modal-content" id="modal-content" style=" width:50%; display: none">
            <h4 class="modal-title" align="center" style="font-size: 18px; margin: 10px; color: #8a8a94">
                Изменить документ</h4>
            <div class="modal-body">
                <div class="form-group" style="display: none">
                    <input type="text" name="user_id" id="user_id">
                </div>
                <div class="form-group">
                    <input type="text" id="up_str_doc" class="form-control">
                </div>

                <div class="form-group">
                    <input type="text" id="up_nomencl_doc" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" id="up_storages" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" id="up_shelf_life" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" id="up_notes_item_number" class="form-control">
                </div>

                <div class="form-group">
                    <input type="text" id="up_notes" class="form-control">
                </div>

                <div class="form-group">
                    <input type="text" id="up_st_type" class="form-control">
                </div>

                <div class="form-group">
                    <input type="text" id="up_st_be" class="form-control">
                </div>


                <div class="form-group">
                    <input type="text" id="up_st_ce" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" id="up_st_num" class="form-control">
                </div>


                <div class="form-group">
                    <input type="text" id="up_st_year" class="form-control">
                </div>


                <div class="form-group">
                    <input type="text" id="up_doc_carrier" class="form-control">
                </div>


            </div>
            <button type="button" id="update_save" class="btn btn-success" style="margin: 10px">сохранить</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="button" id="update_close" class="btn btn-danger" data-dismiss="modal" style="margin: 10px">
                Отмена
            </button>
        </div>


        <div class="panel-body" style="text-align: left">

            <div class="typ_text"
                 style="font-family: 'Times New Roman', Times, serif;  font-size: 18px; text-align:right text-align:justify; color: #795548">
                <p>
                    * Номера пунктов согласно Перечню документов Национального архивного фонда Республики Беларусь,
                    образующихся в процессе деятельности Министерства промышленности
                    Республики Беларусь и организаций, входящих в систему Министерства промышленности Республики
                    Беларусь,
                    утвержденному приказом Министерства промышленности Республики Беларусь от 08.02.2016 № 43</p>
                <p>** Номера пунктов согласно Перечню типовых документов Национального архивного фонда Республики
                    Беларусь,
                    утвержденному постановлением Министерства юстиции Республики Беларусь от 24.05.2012 № 140
                </p>
            </div>
            <div class="table-responsive">
                <div class="message-database" id="message" style="font-size: 16px; color:#4caf50; display: none;">
                    <label>
                        Запись добавлена
                    </label>
                    <button type="button" id="enter" class="btn btn-success" style="margin: 10px">подтвердить</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>


                <div class="message-database" id="update_message"
                     style="font-size: 16px; color:#4caf50; display: none;">
                    <label>Запись изменена</label>
                    <button type="button" id="update_enter" class="btn btn-primary" style="margin: 10px">подтвердить
                    </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>

                <div class="back-database" id="back-form" style="font-size: 16px; color:#4caf50; text-align: right;">
                    <button type="button" id="back" class="btn btn-danger" style="margin: 10px">назад на главную
                        страницу
                    </button>
                </div>


                <table id="sample_data" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Id</th>
                        <th>Вид и название документов по стандарту</th>
                        <th>Вид и название документов по номенклатуре дел</th>
                        <th>Место хранения</th>
                        <th>Срок хранения</th>
                        <th>Номер пункта по перечню</th>
                        <th>Примечание</th>
                        <th>Вид</th>
                        <th>БЕ</th>
                        <th>СЕ</th>
                        <th>№</th>
                        <th>Год</th>
                        <th>Носитель документа</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<br/>
<br/>
</body>
</html>


<script type="text/javascript">
    $(document).ready(function () {
        $("#back").click(function () {
            window.location = 'http://localhost:8080/dashboard/php-web/web/index.php';
        });
    });
</script>


<script>
    $(document).ready(function () {
        // const role_id = $('.role').text();
        let role_id = 1;
        let i = 1;
        let dataTable = $('#sample_data').DataTable({
            language: {
                search: "поиск:",
                info: "просмотр записи с _START_ по _END_ из _TOTAL_ записей",
                infoEmpty: "",
                infoFiltered: "",
                infoPostFix: "",
                paginate: {
                    previous: "предыдущая",
                    next: "следующая",
                },
                aria: {}
            },
            "processing": true,
            "serverSide": false,
            "order": [],
            "ajax": {
                url: "/php-web/nomenclature/fetch.php",
                type: "POST",
                data: {
                    'role': role_id,
                },
                "dataSrc": "data"
            },

            dom: 'Blfrtip',
            buttons: [
                'excel', 'pdf', 'print'
            ],
            columns: [
                {
                    name: 'number',
                    "render": function (data, type, row, meta) {
                        // console.log(data);
                        return '<span>' + (i++) + '</span>';
                    }
                },

                {name: 'id'},
                {name: "str_doc"},
                {name: "nomencl_doc"},
                {name: "storages"},
                {name: "shelf_life"},
                {name: "notes_item_number"},
                {name: "notes"},
                {name: "st_type"},
                {name: "st_be"},
                {name: "st_ce"},
                {name: "st_num"},
                {name: "st_year"},
                {name: "doc_carrier"},
                {name: null},
                {name: null}
            ],


            "aoColumnsDefs": [
                {"mData": null},
                {"mData": "Id"},
                {"mData": "Вид и название документов по стандарту"},
                {"mData": "Вид и название документов по номенклатуре дел"},
                {"mData": "Место хранения"},
                {"mData": "Срок хранения"},
                {"mData": "Номер пункта по перечню"},
                {"mData": "Примечание"},
                {"mData": "Вид"},
                {"mData": "БЕ"},
                {"mData": "СЕ"},
                {"mData": "№"},
                {"mData": "Год"},
                {"mData": "Носитель документа"},
                {"mData": "Ред"},
                {"mData": "Удаление"}

            ],

            "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": 0,
            }],

        });

        // dataTable.on('order.dt search.dt', function () {
        //     dataTable.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
        //         cell.innerHTML = i + 1;
        //     });
        // }).draw();


        dataTable.column(1).visible(false);

        let task = $('.task').text();
        // let roles = $('.role').text();
        let roles = 1;
        antiification(task, roles);

        function antiification(task, roles) {
            let tab_role = '1';
            let id_task = "16819";
            task = 16819;


            if ((task === id_task) && (roles === tab_role)) {
                console.log(task);

                $('#sample_data').on('draw.dt', function () {

                    //     $('#sample_data').Tabledit({
                    //         url: '/atlant/adds/tasks/nomenclature/action.php',
                    //         dataType: 'json',
                    //         hideIdentifier: true,
                    //         columns: {
                    //             identifier: [1, 'id'],
                    //             editable: [[2, 'str_doc'], [3, 'nomencl_doc'], [4, 'storages'], [5, 'shelf_life'], [6, 'notes_item_number'],
                    //                 [7, 'notes'], [8, 'st_type'], [9, 'st_be'], [10, 'st_ce'], [11, 'st_num'], [12, 'st_year'], [13, 'doc_carrier']]
                    //         },
                    //         restoreButton: false,
                    //         onSuccess: function (data, textStatus, jqXHR) {
                    //             if (data.action === 'delete') {
                    //                 $('#' + data.id).remove();
                    //                 console.log(data);
                    //                 $('#sample_data').DataTable().ajax.reload();
                    //             }
                    //         }
                    //     });
                    // });
                    //
                    $('#sample_data').draw();

                    // update
                    $(document).on('click', '.update', function () {
                        let id = $(this).attr("id");
                        let user = id.slice(7);
                        $("#modal-content").css('display', 'block');
                        $("#update_save").click(function () {
                            let user_id = user;
                            let str_doc = $("#up_str_doc").val();
                            let nomencl_doc = $("#up_nomencl_doc").val();
                            let storages = $("#up_storages").val();
                            let shelf_life = $("#up_shelf_life").val();
                            let notes_item_number = $("#up_notes_item_number").val();
                            let notes = $("#up_notes").val();
                            let st_type = $("#up_st_type").val();
                            let st_be = $("#up_st_be").val();
                            let st_ce = $("#up_st_ce").val();
                            let st_num = $("#up_st_num").val();
                            let st_year = $("#up_st_year").val();
                            let doc_carrier = $("#up_doc_carrier").val();

                            $.ajax({
                                url: "/nomenclature/update.php",
                                method: "POST",
                                data: {
                                    'user_id': user_id,
                                    'str_doc': str_doc,
                                    'nomencl_doc': nomencl_doc,
                                    'storages': storages,
                                    'shelf_life': shelf_life,
                                    'notes_item_number': notes_item_number,
                                    'notes': notes,
                                    'st_type': st_type,
                                    'st_be': st_be,
                                    'st_ce': st_ce,
                                    'st_num': st_num,
                                    'st_year': st_year,
                                    'doc_carrier': doc_carrier
                                },
                                dataType: "json",
                                success: function (data) {

                                    if (data != null) {
                                        $("#update_message").css('display', '');
                                        $("#update_enter").click(function () {
                                            location.reload();
                                        });
                                    }
                                    let str_doc = $("#up_str_doc").val();
                                    let nomencl_doc = $("#up_nomencl_doc").val();
                                    let storages = $("#up_storages").val();
                                    let shelf_life = $("#up_shelf_life").val();
                                    let notes_item_number = $("#up_notes_item_number").val();
                                    let notes = $("#up_notes").val();
                                    let st_type = $("#up_st_type").val();
                                    let st_be = $("#up_st_be").val();
                                    let st_ce = $("#up_st_ce").val();
                                    let st_num = $("#up_st_num").val();
                                    let st_year = $("#up_st_year").val();
                                    let doc_carrier = $("#up_doc_carrier").val();
                                }
                            });

                            $("#modal-content").css('display', 'none');
                        });

                        $("#update_close").click(function () {
                            $("#modal-content").css('display', 'none');
                        });
                    });

                    //delete
                    $(document).on('click', '.delete', function () {

                        let id = $(this).attr("id");
                        let user_id = id.slice(7);
                        $.ajax({
                            url: "/nomenclature/delete.php",
                            method: "POST",
                            data: {user_id: user_id},
                            success: function (data) {
                                $('#' + data.id).remove();
                                dataTable.ajax.reload();
                            }

                        });
                    });


                    $(document).on('click', '.getId', function () {
                        let id = $(this).attr("id");
                        let get_id = id.slice(7);
                        // alert(get_id);
                        $.ajax({
                            url: "/nomenclature/GetUpdate.php",
                            method: "POST",
                            data: {
                                method: "getUpdate",
                                get_id: get_id,
                            },
                            // dataType: "json",
                            success: function (data) {
                                let object = JSON.parse(data);
                                $('#up_str_doc').val(object['str_doc']);
                                $('#up_nomencl_doc').val(object['nomencl_doc']);
                                $('#up_storages').val(object['storages']);
                                $("#up_shelf_life").val(object['shelf_life']);
                                $("#up_notes_item_number").val(object['notes_item_number']);
                                $("#up_notes").val(object['notes']);
                                $("#up_st_type").val(object['st_type']);
                                $("#up_st_be").val(object['st_be']);
                                $("#up_st_ce").val(object['st_ce']);
                                $("#up_st_num").val(object['st_num']);
                                $("#up_st_year").val(object['st_year']);
                                $("#up_doc_carrier").val(object['doc_carrier']);
                            }
                        });
                    });


                    $("#modal-content").css('display', 'none');
                });

                console.log(1);
                $("#btn").css('display', 'block');
            } else {
                console.log(0);
                $("#btn").css('display', 'none');
            }
        }//function antiification(task, roles)


        $("#btn").click(function () {
            $("#myModal").css('display', 'block');
        });
        $("#close").click(function () {
            $("#myModal").css('display', 'none');
        });

        $("#save").click(function () {
            let str_doc = $("#str_doc").val();
            let nomencl_doc = $("#nomencl_doc").val();
            let storages = $("#storages").val();
            let shelf_life = $("#shelf_life").val();
            let notes_item_number = $("#notes_item_number").val();
            let notes = $("#notes").val();
            let st_type = $("#st_type").val();
            let st_be = $("#st_be").val();
            let st_ce = $("#st_ce").val();
            let st_num = $("#st_num").val();
            let st_year = $("#st_year").val();
            let doc_carrier = $("#doc_carrier").val();

            $.ajax({
                url: '/nomenclature/edit.php',
                method: 'POST',
                dataType: 'html',
                data: {
                    'str_doc': str_doc,
                    'nomencl_doc': nomencl_doc,
                    'storages': storages,
                    'shelf_life': shelf_life,
                    'notes_item_number': notes_item_number,
                    'notes': notes,
                    'st_type': st_type,
                    'st_be': st_be,
                    'st_ce': st_ce,
                    'st_num': st_num,
                    'st_year': st_year,
                    'doc_carrier': doc_carrier
                },
                success: function (data) {
                    // alert("запись добавлена");
                    if (data != null) {
                        $("#message").css('display', '');
                        $("#enter").click(function () {
                            location.reload();
                        });
                    }
                    $("#str_doc").val("");
                    $("#nomencl_doc").val("");
                    $("#storages").val("");
                    $("#shelf_life").val("");
                    $("#notes_item_number").val("");
                    $("#notes").val("");
                    $("#st_type").val("");
                    $("#st_be").val("");
                    $("#st_num").val();
                    $("#st_year").val();
                    $("#doc_carrier").val();
                }
            });
            $("#myModal").css('display', 'none');
        });

    });
</script>
