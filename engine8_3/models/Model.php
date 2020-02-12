<?php


namespace app\models;


use app\interfaces\IModel;

abstract class Model
{
    public function __set($names, $value) {
        if (!property_exists($this, $names)) return;
        $this->$names = $value;
        $this->props[$names] = true;

    }
    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
    }
    public function __isset($name)
    {
        return isset($this->$name);

    }
}