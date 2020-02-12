<?php


namespace app\controllers;

use app\interfaces\IRenderer;
use app\engine\App;

abstract class  Controller
{
    private $action;
    private $defaultAction = 'index';
    private $layout = 'main';
    private $userLayout = true;
    private $renderer;


    public function __construct(IRenderer $renderer)
    {
        $this->renderer = $renderer;
    }


    public function runAction($action = null) {
        $this->action = $action ? : $this->defaultAction; // Если $action существует он подставится в поле $action, если нет возмется дефолтное значение из $defaultAction
        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else die(404);
    }

    public function render($template, $params = []) {
        if ($this->userLayout) {
            return $this->renderTemplate("layouts/{$this->layout}", [
                'menu' => $this->renderTemplate('menu', [
                    'count' => App::call()->basketRepository->getCountWhere('session_id', session_id()),
                    'auth' => App::call()->userRepository->isAuth(),
                    'username' => App::call()->userRepository->getName(),
                    'admin' => App::call()->userRepository->isAdmin()
                ]),
                'content' => $this->renderTemplate($template, $params)
            ]);
        } else {
            return $this->renderTemplate($template, $params);
        }
    }

    public function renderTemplate($template, $params = []) {
        return $this->renderer->renderTemplate($template, $params);
    }
}