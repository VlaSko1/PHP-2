<h2>Подбробнее о заказе</h2>
<? if ($admin) : ?>
    <? if (empty($order['id'])): ?>
        <h4>Заказ удален</h4>
    <? else: ?>
        <div class="order">
            <table style="border:1px solid black;">
                <tr>
                    <th>№п/п</th><th>Название</th><th>Цена за единицу товара</th><th>Количество</th><th>Внешний вид</th>
                </tr>
                <? for($i = 0, $n = 1; $i < count($orderAllGoods); $i++, $n++):?>
                    <tr>
                        <td><?=$n?></td><td><?=$orderAllGoods[$i]['name']?></td><td><?=$orderAllGoods[$i]['price']?></td>
                        <td><?=$orderAllGoods[$i]['quantity']?></td>
                        <td><img style="max-width: 100px" src="/img/catalog/small/<?=$orderAllGoods[$i]['image']?>" alt="<?=$orderAllGoods[$i]['name']?>"></td>
                    </tr>
                <? endfor; ?>

            </table>
            <br>
            <form action="/admin/change/" method="post">
                <p>Заказ №<?=$order['id']?></p>
                <p>Имя покупателя: <?=$order['name']?></p>
                <p>Телефон покупателя: <?=$order['phone']?></p>
                <p>Email покупателя: <?=$order['email']?></p>
                <p>Статус заказа: <?=$order['status']?></p>
                <p>Количество товаров: <?=$orderCount?></p>
                <p>Суммарная стоимость товаров: <?=$orderPrice['sum']?></p>
                <select name="select" id="">
                    <? foreach ($statuses as $status) :?>

                        <option value="<?=$status['id'] ?>" <?=($order['status_id'] == $status['id'] ? 'selected' : null) ?>><?=$status['status'] ?></option>
                    <? endforeach; ?>
                </select>
                <input type="text" hidden name="id" value="<?=$order['id']?>">
                <input type="submit" class="status"  value="Изменить статус заказа">
            </form>
            <hr>
            <br>
            <form action="/admin/delete/" name="delete" method="post">
                <input type="submit"  value="Удалить заказ">
                <input type="text" hidden name="id" value="<?=$order['id']?>">
            </form>
        </div>
    <? endif; ?>

<? else: ?>
    <h4>Вы не являетесь администратором</h4>
<? endif; ?>
