<?php


namespace app\models\repositories;


use app\models\entities\Order;
use app\models\Repository;

class OrderRepository extends Repository
{
    public function getEntityClass() {
        return Order::class;
    }

    public function getTableName()
    {
        return "orders";
    }


}