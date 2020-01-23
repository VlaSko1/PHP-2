<?php


namespace app\models;


class Basket extends Model {
    public $id;
    public $good_id;
    public $session_id;
    public $user_id;
    public $quantity;

    public function getTableName()
    {
        return "basket";
    }


}
