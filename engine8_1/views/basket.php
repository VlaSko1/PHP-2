<h2>Козрина</h2><hr>
<h4 id="info" style="display: none">Корзина пуста</h4>
<h4><?=$message?></h4>
<form action="/order/add/" method="post" id="orderForm">
    <p>Оформите заказ:</p>
    <input type="text" name="name" placeholder="Имя" required>
    <input type="text" name="phone" placeholder="Телефон" required> <br>
    <input type="email" name="email" placeholder="Электронная почта" required>
    <input type="submit" value="Оформить заказ">
</form>
<? foreach ($products as $item): ?>
<div id="<?=$item['id_basket']?>">
    <h3><?=$item['name']?></h3>
    <img src="/img/catalog/small/<?=$item['image']?>" alt="<?=$item['name']?>">
    <p>Описание: <?=$item['description']?></p>
    <p>Цена: <?=$item['price']?></p>
    <p>Количество товаров: <span id="count<?=$item['id_basket']?>"><?=$item['count_product']?></span></p>
    <button data-id="<?=$item['id_basket']?>" class="delete">Удалить</button>
    <hr>
</div>
<?endforeach; ?>

<script>


    hiddenInfo();
    let buttons = document.querySelectorAll('.delete');
    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (
                async () => {
                    const response = await fetch('/basket/DelFromBasket/', {
                        method: 'POST',
                        headers: new Headers({
                            'Content-Type': 'application/json'
                        }),
                        body: JSON.stringify({
                            id: id
                        })
                    });
                    const answer = await response.json();
                    if (answer.status === 'ok') {
                        document.getElementById('count').innerText = answer.count;
                        if(+answer.countProd >= 1) {
                            document.getElementById(`count${id}`).innerText = answer.countProd;
                        } else {
                            document.getElementById(answer.id).remove();
                            hiddenInfo()
                        }
                    } else {
                        console.log('Нет соединения с БД');
                    }
                }
            )();
        })
    });

    function hiddenInfo() {
        if (document.getElementById('count').innerText == 0) {
            document.getElementById('info').style.display = 'block';
            document.getElementById('orderForm').style.display = 'none';
        }
    }


</script>


