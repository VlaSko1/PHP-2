<?php


namespace app\controllers;

use app\engine\App;
use app\models\entities\Order;

class OrderController extends Controller
{
    /*public function actionIndex() {
        echo $this->render('index');
    }*/
    public function actionAdd() {
        $params = App::call()->request->getParams();
        $order = new Order($params['name'], $params['phone'], $params['email'], session_id());
        App::call()->orderRepository->save($order);
        session_regenerate_id();
        $session = session_id();
        echo $this->render('basket', ['products' => App::call()->basketRepository->getBasket($session), 'message' => 'Заказ оформлен']);
    }

}