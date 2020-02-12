<?php

namespace app\models\repositories;
use app\engine\App;
use app\models\Repository;
use app\models\entities\Basket;

class BasketRepository extends Repository
{
    public function getBasket($session) {
        $sql = "SELECT p.id id_prod, p.image, b.id id_basket, p.name, p.description, p.price, b.count_product FROM basket b, products p 
                WHERE b.product_id=p.id AND session_id = :session";
        return App::call()->db->queryAll($sql, ['session' => $session]);
    }


    public function getEntityClass() {
        return Basket::class;
    }

    public function getTableName()
    {
        return "basket";
    }


}