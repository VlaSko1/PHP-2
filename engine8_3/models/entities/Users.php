<?php

namespace app\models\entities;
use app\models\Model;
class Users extends Model
{
    protected $id = null;
    protected $login;
    protected $pass;
    protected $hash = null;
    protected $access;


    protected $props = [
        'login' => false,
        'pass' => false,
        'hash' => false,
        'access' => false
    ];


    public function __construct($login = null, $pass = null, $access = null)
    {
        $this->login = $login;
        $this->pass = $pass;
        $this->access = $access;
    }





}