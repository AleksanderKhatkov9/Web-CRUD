<?php


interface DaoCatalog
{

    public function connectPDO();

    public function save($image, $title, $price, $date);

    public function getAll();

    public function delete($id);

    public function getId($id);

    public function update($id, $image, $title, $price, $date);

    public function link1($start_from, $limit);

    public function link2();

    public function find($search);


}