<?php
use app\models\entities\Products;

class ProductTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider providerProduct
     */
        public function testProduct($name, $description, $price, $image) {

            $product = new Products($name, $description, $price, $image);
            $this->assertEquals($name, $product->name);
            $this->assertEquals($description, $product->description);
            $this->assertEquals($price, $product->price);
            $this->assertEquals($image, $product->image);
            $this->assertEquals(0, strpos(self::class, 'app\\'));
            $this->assertEquals(['models'], array_splice(explode("\\", (string)get_class(new Products())), 1,1));
            $this->assertEquals(3, substr_count(Products::class, '\\'));
        }

        public function providerProduct() {
            return array (
                array ('Банан', 'Вкусный банан', 12, '09.jpg'),
                array ('Огурец', 'Свежий и твердый', 21, '10.jpg'),
                array ('Помидор', '%не содержит ГМО%', 22, '11.jpg'),
            );
        }


}