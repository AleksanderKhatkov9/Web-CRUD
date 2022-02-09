<?php


class Catalog
{

    private $id;
    private $image;
    private $title;
    private $price;
    private $date;

    /**
     * Catalog constructor.
     * @param $id
     * @param $image
     * @param $title
     * @param $price
     * @param $date
     */
    public function __construct($id, $image, $title, $price, $date)
    {
        $this->id = $id;
        $this->image = $image;
        $this->title = $title;
        $this->price = $price;
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }


}