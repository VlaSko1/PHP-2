<?php
include "../engine/Autoload.php";

use app\models\{Products, Users};
use app\engine\Autoload;
use app\models\Model;
use app\interfaces\IModel;

spl_autoload_register([new Autoload(), 'loadClass']);


$product = new Products();
$user = new Users();

function foo(IModel $model) {
    var_dump($model instanceof Model);
}

echo $product->getOne(2) . '<br>';
echo $user->getOne(1) . '<br>';

echo $product->getAll();
foo($product);

