<?php


namespace app\models\entities;
use app\models\Model;

class Order extends Model {
    protected $id;
    protected $name;
    protected $phone;
    protected $email;
    protected $session_id;
    protected $status_id;

    protected $props = [
        'name' => false,
        'phone' => false,
        'email' => false,
        'session_id' => false,
        'status_id' => false
    ];

    public function __construct($name = null, $phone = null, $email = null, $session_id = null, $status_id = 1)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->session_id = $session_id;
        $this->status_id = $status_id;
    }


}