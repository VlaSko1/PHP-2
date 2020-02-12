<?php


namespace app\controllers;


use app\engine\App;


class AdminController extends Controller
{

    public function actionAdmin() {
        $admin = App::call()->userRepository->isAdmin();
        if(!$admin) {
            echo $this->render('index');
            return;
        }
        $orders = App::call()->orderRepository->getOrders();
        $statuses = App::call()->orderRepository->getStatus();
        echo $this->render('admin', ['orders' => $orders, 'admin' => $admin, 'statuses' => $statuses]);
    }

    public function actionFilter() {
        $admin = App::call()->userRepository->isAdmin();
        if(!$admin) {
            echo $this->render('index');
            return;
        }
        $id = (int)App::call()->request->getParams()['orderSelect'];
        $orders = App::call()->orderRepository->getOrders($id);
        $statuses = App::call()->orderRepository->getStatus();
        echo $this->render('admin', ['orders' => $orders, 'admin' => $admin, 'statuses' => $statuses]);
    }

    public function actionDetail() {
        $admin = App::call()->userRepository->isAdmin();
        if(!$admin) {
            echo $this->render('index');
            return;
        }
        $id = (int)App::call()->request->getParams()['id'];
        $order = App::call()->orderRepository->getOrderDetail($id);
        $session = $order['session_id'];
        $orderAllGoods = App::call()->orderRepository->getAllGoodsOrder($session);
        $statuses = App::call()->orderRepository->getStatus();
        $orderCount = App::call()->basketRepository->getCountWhere('session_id', $session);
        $orderPrice = App::call()->orderRepository->getPriceProducts($session);
        echo $this->render('detail', [
                                                'order' => $order,
                                                'admin' => $admin,
                                                'orderAllGoods' => $orderAllGoods,
                                                'statuses' => $statuses,
                                                'orderCount' => $orderCount,
                                                'orderPrice' => $orderPrice
                                                ]);
    }
    public function actionChange() {
        $admin = App::call()->userRepository->isAdmin();
        if(!$admin) {
            echo $this->render('index');
            return;
        }
        $params = App::call()->request->getParams();
        $id = (int)$params['id'];
        $status_id = (int)$params['select'];
        $order = App::call()->orderRepository->getOne($id);
        $order->status_id = $status_id;
        App::call()->orderRepository->save($order);
        $this->actionDetail();
    }

    public function actionDelete() {
        $admin = App::call()->userRepository->isAdmin();
        if(!$admin) {
            echo $this->render('index');
            return;
        }
        $id = App::call()->request->getParams()['id'];
        $order = App::call()->orderRepository->getOne($id);
        App::call()->orderRepository->delete($order);
        $this->actionDetail();
    }
}