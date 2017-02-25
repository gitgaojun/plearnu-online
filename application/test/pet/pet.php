<?php

/**
 * Class Pet
 * 计算宠物数量
 */
class Pet
{

    static private $_count=0;

    public $name;

    public function __construct($name)
    {
        $this->name=$name;
        ++self::$_count;
    }

    public function eat()
    {
        echo $this->name . ' is eating';
    }

    public function sleep()
    {
        echo $this->name . ' is sleeping';
    }

    static public function getCount()
    {
        echo self::$_count;
    }

    public function __destruct()
    {
        --self::$_count;
    }

}

class Cat extends Pet
{

    public function __construct($name)
    {
        parent::__construct($name);
    }

    public function climb()
    {
        echo $this->name . ' is climbing';
    }

}


class Dog extends Pet
{

    public function __construct($name)
    {
        parent::__construct($name);
    }

    public function fetch()
    {
        echo $this->name . ' is fetching';
    }
}

$catCC = new Cat('cc');

$DogDD = new Dog('DD');

$dogDDs = new Dog('DDs');
$dogDDsa = new Dog('DDsa');

unset($dogDDs);

Pet::getCount();

