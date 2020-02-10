<h2>Отзывы о нас</h2>

<?=$message?><br>
<hr>
<form action="/feedback/add/" method="post">
    Оставьте отзыв: <br>

    <input type="text" name="id" value="<?=$valueId?>" hidden><br>
    <input type="text" name="name" value="<?=$valueName?>" placeholder="Ваше имя" required><br>
    <input type="text" name="feedback" value="<?=$valueMessage?>" placeholder="Ваш отзыв" required><br>
    <input type="submit" value="<?=$buttonValue?>">
</form><br>

<?foreach ($feedback as $value): ?>
    <div>
        <strong><?=$value['name']?></strong>: <?=$value['feedback']?>
        <a href="/feedback/edit/?id=<?=$value['id']?>">[править]</a>
        <a href="/feedback/del/?id=<?=$value['id']?>">[Х]</a>
    </div>

<?endforeach;?>