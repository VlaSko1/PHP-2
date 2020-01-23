<?php


namespace app\models;


class Order extends Model {
    public $id;
    public $name;
    public $session_id;
    public $phone;
    public $status_id;

    public function getTableName()
    {
        return "orders";
    }


}