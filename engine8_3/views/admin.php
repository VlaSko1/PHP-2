<h2>Админка</h2>
<h3>Список заказов</h3>

<? if ($admin) : ?>

    <form action="/admin/filter/" method="post">
        <p>Отфильтровать заказ по статусу:</p>
        <select name="orderSelect" id="">
            <option value="0" >Все заказы</option>
            <? foreach ($statuses as $status) :?>

                <option value="<?=$status['id'] ?>" ><?=$status['status'] ?></option>
            <? endforeach; ?>
        </select>
        <input type="submit" value="Фильтр">
    </form>
    <hr>
    <? foreach ($orders as $order) : ?>
        <div class="order">
            <p>Заказ №<?=$order['id']?></p>
            <p>Имя покупателя: <?=$order['name']?></p>
            <p>Телефон покупателя: <?=$order['phone']?></p>
            <p>Email покупателя: <?=$order['email']?></p>
            <p>Статус заказа: <?=$order['status']?></p>
            <a href="/admin/detail/?id=<?=$order['id']?>"><button>Подбробнее о заказе</button></a>
            <hr>
        </div>

    <? endforeach; ?>


<? else: ?>
    <h4>Вы не являетесь администратором</h4>
<? endif; ?>
