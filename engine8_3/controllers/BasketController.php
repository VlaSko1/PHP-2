<?php


namespace app\controllers;



use app\engine\App;
use app\models\entities\Basket;


class BasketController extends Controller
{
    public function actionIndex() {
        $session = session_id();
        $basket = App::call()->basketRepository->getBasket($session);
        echo $this->render('basket', ['products' => $basket]);
    }

    public function actionAddToBasket() {
        $id = App::call()->request->getParams()['id'];
        $session = session_id();
        $basket = App::call()->basketRepository->getOneByProdId($id, $session);
        if(isset($basket->count_product) && $basket->session_id == session_id()) {
            $basket->count_product++;
            App::call()->basketRepository->save($basket);
        } else {
            $basket = new Basket(session_id(), $id);
            App::call()->basketRepository->save($basket);
        }
        header('Content-Type: application/json');
        echo json_encode(['status' => 'ok', 'count' => App::call()->basketRepository->getCountWhere('session_id', session_id())]);
        die();
    }
    public function actionDelFromBasket() {
        $id = (int)App::call()->request->getParams()['id'];
        $basket = App::call()->basketRepository->getOne($id);
        $session = session_id();
        $countProd = 0;
        if ($session == $basket->session_id) {
            if((int)$basket->count_product > 1) {
                $basket->count_product--;
                $countProd = $basket->count_product;
                App::call()->basketRepository->save($basket);
            } else {
                App::call()->basketRepository->delete($basket);
            }
        }

        header('Content-Type: application/json');
        echo json_encode(['status' => 'ok', 'id' => $id, 'count' => App::call()->basketRepository->getCountWhere('session_id', session_id()), 'countProd' => $countProd]);
        die();
    }

}