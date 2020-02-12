<?if ($auth): ?>
    <p>Добро пожаловать <?=$username?> <a href="/auth/logout/">[Выход]</a></p>
<?else:?>
    <form action="/auth/login/" method="post">
        <input type="text" name="login" placeholder="Логин">
        <input type="password" name="pass" placeholder="Пароль" >
        Save? <input type="checkbox" name="save">
        <input type="submit" name="submit" value="Войти">
    </form>
<?endif;?><br>
<a href="/">Главная</a>
<a href="/product/catalog/">Каталог</a>
<a href="/basket/">Корзина <span id="count"><?=$count?></span></a>
<a href="/feedback/feedback/">Отзывы о магазине</a>
<? if ($admin):?>
    <a href="/admin/admin/">Админка</a>
<?endif;?><br>
