<form class="form container <?= $form ?? ""?>" action="../login.php" method="post"> <!-- form--invalid -->
    <h2>Вход</h2>
    <div class="form__item <?= $err['email'] ?? ""?> "> <!-- form__item--invalid -->
        <label for="email">E-mail <sup>*</sup></label>
        <input id="email" type="text" name="email" placeholder="Введите e-mail" value="<?=$_POST['email'] ?? ""?>">
        <?= $message['email']  ?? ""?>
    </div>
    <div class="form__item <?= $err['password'] ?? ""?>">
        <label for="password">Пароль <sup>*</sup></label>
        <input id="password" type="password" name="password" placeholder="Введите пароль" value="<?=$_POST['password'] ?? ""?>">
        <?= $message['password']  ?? ""?>
    </div>
    <?= $message['form'] ?? ""?>
    <button type="submit" class="button">Войти</button>
</form>
