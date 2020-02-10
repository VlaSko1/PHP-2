<h2>Каталог</h2>

<? foreach ($catalog as $product) :?>
<div class="product">
    <h4><?=$product['name']?></h4>
    <a href="/product/card/?id=<?=$product['id']?>"><img src="/img/catalog/small/<?=$product['image']?>" alt="<?=$product['name']?>"></a>
    <p><?=$product['description']?></p>
    <p>Цена: <?=$product['price']?></p>
    <button data-id="<?=$product['id']?>" class="buy">Купить</button>
    <hr>
</div>
<? endforeach;?>

<a href="/product/catalog/?page=<?=$page?>">Показать ещё</a>

<script>
    let buttons = document.querySelectorAll('.buy');
    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (
                async () => {
                    const response = await fetch('/basket/AddToBasket/', {
                        method: 'POST',
                        headers: new Headers({
                            'Content-Type': 'application/json'
                        }),
                        body: JSON.stringify({
                            id: id
                        })
                    });
                    const answer = await response.json();
                    document.getElementById('count').innerText = answer.count;
                }
            )();
        })
    });
</script>