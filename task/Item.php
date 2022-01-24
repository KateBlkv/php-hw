<?php

class Item
{
    public $id; // не может быть отрицательным или 0
    private $title; // максимум 10 символов
    private $price; // не может быть отрицательным или 0
    private $material; // минимум 3 символа

    // свойства title и id являются обязательными,

    // добавить все необходимые геттеры и сеттеры
    public function setId(int $id)
    {
        if ($id <= 0) {
            throw new InvalidArgumentException(
                'ID должен быть больше 0');
        }
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setTitle(string $title)
    {
        if (strlen($title) > 10) {
            throw new InvalidArgumentException(
                'Заголовок должен быть не больше 10 символов');
        }
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setPrice(int $price)
    {
        if ($price <= 0) {
            throw new InvalidArgumentException(
                'ID должен быть больше 0');
        }
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setMaterial(string $material)
    {
        if (strlen($material) < 3) {
            throw new InvalidArgumentException(
                'Должно быть не больше 3 символов');
        }
        $this->material = $material;
    }

    public function getMaterial()
    {
        return $this->material;
    }
}

/*public function setLogin(string $login){
    if (strlen($login) < 5) {
        throw new InvalidArgumentException(
            'Размер не должен быть меньше 5');
    }
    $this->login = $login;
}

public function getLogin(){
    return $this->login;
}*/
