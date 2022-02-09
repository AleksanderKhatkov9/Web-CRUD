<?php
include_once("D:\home\atlant\config\Globals.php");

try {
    $connect = Globals::getPDOConnection('glossary');

    $str_doc = $_POST['str_doc'];
    $nomencl_doc = $_POST['nomencl_doc'];
    $storages = $_POST['storages'];
    $shelf_life = $_POST['shelf_life'];
    $notes_item_number = $_POST['notes_item_number'];
    $notes = $_POST['notes'];
    $st_type = $_POST['st_type'];
    $st_be = $_POST['st_be'];
    $st_ce = $_POST['st_ce'];
    $st_num = $_POST['st_num'];
    $st_year = $_POST['st_year'];
    $doc_carrier = $_POST['doc_carrier'];


    $sql = "INSERT INTO nomenclature (str_doc,nomencl_doc,storages, shelf_life,notes_item_number,notes,st_type,st_be,st_ce,st_num,st_year, doc_carrier) 
        VALUES (:str_doc, :nomencl_doc, :storages, :shelf_life, :notes_item_number, :notes,:st_type, :st_be, :st_ce, :st_num,:st_year, :doc_carrier)";

    $query = $connect->prepare($sql);
    $query->bindParam(':str_doc', $str_doc);
    $query->bindParam(':nomencl_doc', $nomencl_doc);
    $query->bindParam(':storages', $storages);
    $query->bindParam(':shelf_life', $shelf_life);
    $query->bindParam(':notes_item_number', $notes_item_number);
    $query->bindParam(':notes', $notes);
    $query->bindParam(':st_type', $st_type);
    $query->bindParam(':st_be', $st_be);
    $query->bindParam(':st_ce', $st_ce);
    $query->bindParam(':st_num', $st_num);
    $query->bindParam(':st_year', $st_year);
    $query->bindParam(':doc_carrier', $doc_carrier);
    $query->execute();
} catch (Exception $e) {
    echo 'Поймано исключение: ', $e->getMessage(), "\n";
    echo __FILE__ . " " . __LINE__ . " " . $e;
}