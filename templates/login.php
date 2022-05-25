<form class="form container" action="<?=$_SERVER['PHP_SELF']?>" method="post"> <!-- form--invalid -->
    <h2>Вход</h2>
    <div class="form__item <?/*= $error['email']?"form__item--invalid":"" */?> "> <!-- form__item--invalid -->
        <label for="email">E-mail <sup>*</sup></label>
        <input id="email" type="text" name="email" placeholder="Введите e-mail">
        <span class="form__error">Введите e-mail</span>
    </div>
    <div class="form__item <?= $error['password']?"form__item--invalid":"" ?>">
        <label for="password">Пароль <sup>*</sup></label>
        <input id="password" type="password" name="password" placeholder="Введите пароль">
        <span class="form__error">Введите пароль</span>
    </div>
    <button type="submit" class="button">Войти</button>
</form>
