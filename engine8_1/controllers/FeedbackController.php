<?php


namespace app\controllers;


use app\models\entities\Feedback;
use app\engine\App;

class FeedbackController extends Controller
{
    public function actionIndex() {
        echo $this->render('index');
    }

    public function actionApiFeedback() {
        $feedback = App::call()->feedbackRepository->getAll();
        echo json_encode($feedback, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function actionFeedback() {
        $feedback = App::call()->feedbackRepository->getAll();
        echo $this->render('feedback', ['feedback' => $feedback, 'buttonValue'=>'Отправить']);
    }
    public function actionAdd() {

        $feedback = new Feedback($_POST['name'], $_POST['feedback']);
        if(!empty($_POST['id'])) {
            $feedback->id = $_POST['id'];
            App::call()->feedbackRepository->save($feedback);
            $feedbackAll = App::call()->feedbackRepository->getAll();
            echo $this->render('feedback', ['feedback' => $feedbackAll, 'buttonValue'=>'Отправить', 'message' => 'Отзыв изменен']);


        } else {
            App::call()->feedbackRepository->save($feedback);
            $feedbackAll = App::call()->feedbackRepository->getAll();
            echo $this->render('feedback', ['feedback' => $feedbackAll, 'buttonValue'=>'Отправить', 'message' => 'Отзыв добавлен']);

        }
    }
    public function actionDel() {
        $id=$_GET['id'];
        $feedback = App::call()->feedbackRepository->getOne($id);
        App::call()->feedbackRepository->delete($feedback);
        $feedbackAll = App::call()->feedbackRepository->getAll();
        echo $this->render('feedback', ['feedback' => $feedbackAll, 'buttonValue'=>'Отправить', 'message' => 'Отзыв удален']);
    }
    public function actionEdit() {
        $id=$_GET['id'];
        $feedback = App::call()->feedbackRepository->getAll();
        $feedbackCurrent = App::call()->feedbackRepository->getOne($id);
        $name = $feedbackCurrent->name;
        $message = $feedbackCurrent->feedback;
        $id = $feedbackCurrent->id;

        echo $this->render('feedback', ['feedback' => $feedback, 'buttonValue'=>'Изменить',
            'valueName'=>$name, 'valueMessage' => $message, 'valueId' => $id]);
    }
}