<?php


namespace app\models\entities;

use app\models\Model;

class Basket extends Model {
    protected $id = null;
    protected $session_id;
    protected $product_id;
    protected $count_product;

    public $props = [
        'session_id' => false,
        'product_id' => false,
        'count_product' => false
    ];


    public function __construct($session_id = null, $product_id = null, $count_product = 1)
    {
        $this->session_id = $session_id;
        $this->product_id = $product_id;
        $this->count_product = $count_product;
    }


}
