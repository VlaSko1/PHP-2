<?php


namespace app\models\repositories;

use app\engine\App;
use app\models\entities\Order;
use app\models\Repository;

class OrderRepository extends Repository
{
    public function getOrders($id = 0) {
        if ($id === 0) {
            $sql = "SELECT o.id, o.name, o.phone, o.email, s.status FROM orders as o, status_order as s WHERE o.status_id = s.id ORDER BY o.id DESC";
            return App::call()->db->queryAll($sql);
        } else {
            $sql = "SELECT o.id, o.name, o.phone, o.email, s.status FROM orders as o, status_order as s WHERE o.status_id = s.id AND s.id = :id ORDER BY o.id DESC";
            return App::call()->db->queryAll($sql, ['id' => $id]);
        }
    }
    // Возвращает полную информацию по заказу включая его статус
    public function getOrderDetail($id) {
        $sql = "SELECT o.id, o.name, o.phone, o.email, o.session_id, o.status_id, s.status FROM orders o, status_order s WHERE o.id=:id AND o.status_id = s.id";
        return App::call()->db->queryOne($sql, ['id' => $id]);
    }

    // Возвращает полную информацию по всем товарам в заказе по соответствующей сессии
    public function getAllGoodsOrder($session) {
        $sql = "SELECT b.count_product quantity, p.name, p.description, p.price, p.image FROM basket b, products p WHERE b.session_id=:session AND b.product_id=p.id";
        return App::call()->db->queryAll($sql, ['session' => $session]);
    }

    // Получаем суммарную стоимость товаров в заказе по соответствующей сессии
    public function getPriceProducts($session) {
        $sql = "SELECT sum(p.price * b.count_product) as sum FROM basket b, products p WHERE b.session_id = :session AND b.product_id=p.id";
        return App::call()->db->queryOne($sql, ['session' => $session]);
    }

    public function getStatus() {
        $sql = "SELECT * FROM status_order";
        return App::call()->db->queryAll($sql);
    }

    public function getEntityClass() {
        return Order::class;
    }

    public function getTableName()
    {
        return "orders";
    }
}