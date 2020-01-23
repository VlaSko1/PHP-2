<?php
// Выполнение задания №3 к уроку №2.


abstract class Good {
    const ProfitPercent = 10;
    protected $price;
    protected function __construct($price = null)
    {
        $this->price = $price;
    }

    abstract protected function fullCost();
    abstract protected function fullProfit();
}

class PieceGood extends Good {
    protected $quantityGood;
    public function __construct($price = null, $quantityGood = null)
    {
        parent::__construct($price);
        $this->quantityGood = $quantityGood;
        
    }
    protected function fullCost()
    {
        return $this->price * $this->quantityGood;
    }
    protected function fullProfit()
    {
        return $this->fullCost() * self::ProfitPercent / 100;
    }
    public function getFullCost() {
        return $this->fullCost();
    }
    public function getFullProfit() {
        return $this->fullProfit();
    }
    public function getPrice() {
        return $this->price;
    }
    public function setPrice($price) {
        return $this->price = $price;

    }
    public function getQuantity() {
        return $this->quantityGood;
    }
    public function setQuantity($quantity) {
        return $this->quantityGood = $quantity;
    }
}


class DigitalGood extends PieceGood {
    public function __construct($price = null, $quantityGood = null)
    {
        parent::__construct($price/2, $quantityGood);
    }
}
class WeightGood extends Good {
    protected $weight;
    public function __construct($price = null, $weight = null)
    {
        parent::__construct($price);
        $this->weight = $weight;
    }
    protected function fullProfit()
    {
        return $this->fullCost() * self::ProfitPercent / 100;
    }
    protected function fullCost()
    {
        return $this->weight * $this->price;
    }
    public function getFullCost() {
        return $this->fullCost();
    }
    public function getFullProfit() {
        return $this->fullProfit();
    }
    public function getPrice() {
        return $this->price;
    }
    public function setPrice($price) {
        return $this->price = $price;

    }
    public function getWeight() {
        return $this->weight;
    }
    public function setWeight($weight) {
        return $this->weight = $$this->weight;
    }
}




$pieceGood1 = new PieceGood(100, 4);
echo $pieceGood1 -> getPrice() . '<br>';
echo $pieceGood1 -> getQuantity() . '<br>';
echo $pieceGood1 -> getFullCost() . '<br>';
echo $pieceGood1 -> getFullProfit() . '<br>';

$digital1 = new DigitalGood(100, 5);
echo $digital1 -> getPrice() . '<br>';
echo $digital1 -> getQuantity() . '<br>';
echo $digital1 -> getFullCost() . '<br>';
echo $digital1 -> getFullProfit() . '<br>';

$weightGood1 = new WeightGood(50, 3);
echo $weightGood1 -> getPrice() . '<br>';
echo $weightGood1 -> getWeight() . '<br>';
echo $weightGood1 -> getFullCost() . '<br>';
echo $weightGood1 -> getFullProfit() . '<br>';
