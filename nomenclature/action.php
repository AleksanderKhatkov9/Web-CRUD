<?php
/*Не используется в проекте */
try {
    include_once("D:\home\atlant\config\Globals.php");

    $connect = Globals::getPDOConnection('glossary');

    if ($_POST['action'] == 'edit') {
        $data = [

            ':str_doc' => $_POST['str_doc'],
            ':nomencl_doc' => $_POST['nomencl_doc'],
            ':storages' => $_POST['storages'],
            ':shelf_life' => $_POST['shelf_life'],
            ':notes_item_number' => $_POST['notes_item_number'],
            ':notes' => $_POST['notes'],
            ':st_type' => $_POST['st_type'],
            ':st_be' => $_POST['st_be'],
            ':st_ce' => $_POST['st_ce'],
            ':st_num' => $_POST['st_num'],
            ':st_year' => $_POST['st_year'],
            ':doc_carrier' => $_POST['doc_carrier'],
            ':id' => $_POST['id']
        ];


        $query = "
 UPDATE nomenclature 
 SET str_doc = :str_doc, 
 nomencl_doc = :nomencl_doc, 
 storages = :storages,
  shelf_life = :shelf_life,
 notes_item_number = :notes_item_number,
  notes = :notes,
   st_type = :st_type,
    st_be = :st_be,
     st_ce = :st_ce,
      st_num = :st_num,
        st_year = :st_year,
         doc_carrier= :doc_carrier
          WHERE id = :id";

        $statement = $connect->prepare($query);


        $statement->execute($data);
        echo json_encode($_POST);
    }

    if ($_POST['action'] == 'delete') {
        $query = "
 DELETE FROM nomenclature WHERE id = '" . $_POST["id"] . "'";
        $statement = $connect->prepare($query);
        $statement->execute();
        echo json_encode($_POST);
    }
} catch (Exception $e) {
    echo __FILE__ . " " . __LINE__ . " " . $e;
}