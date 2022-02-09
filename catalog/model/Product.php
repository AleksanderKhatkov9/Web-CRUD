<?php


class Product
{
    private $id;
    private $product;
    private $price;
    private $image;

    /**
     * Product constructor.
     * @param $id
     * @param $product
     * @param $price
     * @param $image
     */
    public function __construct($id, $product, $price, $image)
    {
        $this->id = $id;
        $this->product = $product;
        $this->price = $price;
        $this->image = $image;
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
    public function getProduct()
    {
        return $this->product;
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
    public function getImage()
    {
        return $this->image;
    }
}