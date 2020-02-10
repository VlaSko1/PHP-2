<?php
/**
 * @var \app\models\Products $product
 */

?>
<h2><?=$product->name?></h2>
<img src="/img/catalog/big/<?=$product->image?>" alt="<?=$product->name?>">
<p><?=$product->description?></p>
<p>Цена: <?=$product->price?></p>
