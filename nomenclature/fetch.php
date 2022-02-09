<?php


try {
    include_once("C:/xampp/htdocs/dashboard/php-web/dao/Globals.php");

    try {
        $conn = Globals::getPDOConnection('phpdb');
        echo "Connect" . "<br>";
    } catch (Exception $e) {
        echo "Error" . $e;
    }

//    if (isset($_POST['role']) == 1) {
    $role = $_POST['role'];
    echo $role;
//
//    echo $role;
    $role = 1;
    if ($role == 1) {


        $column = [null, "id", "str_doc", "nomencl_doc", "storages", "shelf_life", "notes_item_number", "notes", "st_type", "st_be", "st_ce", "st_num", "st_year", "doc_carrier"]; //поля таблицы БД
        $query = "SELECT * FROM nomenclature";

        /* добавить если требуется OR definition LIKE "%'.$_POST["search"]["value"].'%"*/
//     if (isset($_POST["search"]["value"])) {
//         $query .= '
//     WHERE str_doc LIKE "%' . $_POST["search"]["value"] . '%" OR nomencl_doc LIKE "%' . $_POST["search"]["value"] . '%"
//  OR st_num LIKE "%' . $_POST["search"]["value"] . '%"';
//     }
//
//     if (isset($_POST["order"])) {
//         $query .= 'ORDER BY ' . $column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
//     } else {
//         $query .= 'ORDER BY id DESC ';
//     }
//     $query1 = '';
//
//     if ($_POST["length"] != -1) {
//         $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
//     }
//    $query1 = "Update nomenclature set id = id-1 where id>num";

        $statement = $conn->prepare($query);
        $statement->execute();
        $number_filter_row = $statement->rowCount();
        $statement = $conn->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $data = array();

        /*созщдаем пустой массив и заполняем его данными*/
        foreach ($result as $row) {
            $sub_array = array();
            $sub_array[] = null; //пустые данные выводится в html
            $sub_array[] = $row['id']; // id из бд
            $sub_array[] = $row['str_doc'];
            $sub_array[] = $row['nomencl_doc'];
            $sub_array[] = $row['storages'];
            $sub_array[] = $row['shelf_life'];
            $sub_array[] = $row['notes_item_number'];
            $sub_array[] = $row['notes'];
            $sub_array[] = $row['st_type'];
            $sub_array[] = $row['st_be'];
            $sub_array[] = $row['st_ce'];
            $sub_array[] = $row['st_num'];
            $sub_array[] = $row['st_year'];;
            $sub_array[] = $row['doc_carrier'];
            $sub_array[] = '<button type="button"  name="update" id="update_' . $row["id"] . '" class="btn btn-warning btn-xs update getId" >Update</button> ';
            $sub_array[] = '<button type="button"  name="delete" id="delete_' . $row["id"] . '" class="btn btn-danger btn-xs delete">Delete</button>';
            $data[] = $sub_array;
        }

    } else {
        $column = [null, "id", "str_doc", "nomencl_doc", "storages", "shelf_life", "notes_item_number", "notes", "st_type", "st_be", "st_ce", "st_num", "st_year", "doc_carrier"]; //поля таблицы БД
        $query = "SELECT * FROM nomenclature";

        $statement = $conn->prepare($query);
        $statement->execute();
        $number_filter_row = $statement->rowCount();
        $statement = $conn->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $data = array();

        /*созщдаем пустой массив и заполняем его данными*/
        foreach ($result as $row) {
            $sub_array = array();
            $sub_array[] = null; //пустые данные выводится в html
            $sub_array[] = $row['id']; // id из бд
            $sub_array[] = $row['str_doc'];
            $sub_array[] = $row['nomencl_doc'];
            $sub_array[] = $row['storages'];
            $sub_array[] = $row['shelf_life'];
            $sub_array[] = $row['notes_item_number'];
            $sub_array[] = $row['notes'];
            $sub_array[] = $row['st_type'];
            $sub_array[] = $row['st_be'];
            $sub_array[] = $row['st_ce'];
            $sub_array[] = $row['st_num'];
            $sub_array[] = $row['st_year'];
            $sub_array[] = $row['doc_carrier'];
            $sub_array[] = null;
            $sub_array[] = null;
            $data[] = $sub_array;
        }
    }
} catch (Exception $e) {
    echo 'Поймано исключение: ', $e->getMessage(), "\n";
    echo __FILE__ . " " . __LINE__ . " " . $e;
}


function count_all_data($conn)
{
    $query = "SELECT * FROM nomenclature";
    $statement = $conn->prepare($query);
    $statement->execute();
    return $statement->rowCount();
}

//echo intval($_POST['']);

//echo $_POST['draw'];
//$output = [
//    'draw' => isset($_POST['draw']),
//    'recordsTotal' => count_all_data($conn),
//    'recordsFiltered' => $number_filter_row,
//    'data' => $data
//];

//echo json_encode($output);


$output = array(
    "draw" => intval($_POST["draw"]),
    "data" => $data
);
//echo json_encode($output);





