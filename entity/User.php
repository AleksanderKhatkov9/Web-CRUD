<?php


class User
{
    private $id;
    private $name;
    private $password;
    private $email;


    /**
     * User constructor.
     * @param $id
     * @param $name
     * @param $password
     * @param $email
     */
//    public function __construct($id, $name, $password, $email)
//    {
//        $this->id = $id;
//        $this->name = $name;
//        $this->password = $password;
//        $this->email = $email;
//    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

}