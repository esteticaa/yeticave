
<form class="form form--add-lot container form--invalid" enctype="multipart/form-data" action="<?=$_SERVER["PHP_SELF"]?>" method="post"> <!-- form--invalid -->
    <h2>Добавление лота</h2>
    <div class="form__container-two">
        <div class="form__item <?= $error['lot_name']?"form__item--invalid":"" ?> "> <!-- form__item--invalid -->
            <label for="lot-name">Наименование <sup>*</sup></label>
            <input id="lot-name" type="text" name="lot_name" placeholder="Введите наименование лота">
            <span class="form__error">Введите наименование лота</span>
        </div>
        <div class="form__item <?= $error['categorie']?"form__item--invalid":"" ?>">
            <label for="category">Категория <sup>*</sup></label>
            <select id="category" name="name">
                <option>Выберите категорию</option>
                <?php
                foreach($mains as $q){
                    ?>
                        <option><?=$q['name']?></option>
                <?php } ?>
            </select>
            <span class="form__error">Выберите категорию</span>
        </div>
    </div>
    <div class="form__item <?= $error['description']?"form__item--invalid":"" ?> form__item--wide">
        <label for="message">Описание <sup>*</sup></label>
        <textarea id="message" name="description" placeholder="Напишите описание лота"></textarea>
        <span class="form__error">Напишите описание лота</span>
    </div>
    <div class="form__item <?= $error['image']?"form__item--invalid":"" ?> form__item--file">
        <label>Изображение <sup>*</sup></label>
        <div class="form__input-file">
            <input name="image" class="visually-hidden" type="file" id="lot-img" value="">
            <label for="lot-img">
                Добавить
            </label>
        </div>
    </div>
    <div class="form__container-three">
        <div class="form__item <?= $error['start_cost']?"form__item--invalid":"" ?> form__item--small">
            <label for="lot-rate">Начальная цена <sup>*</sup></label>
            <input id="lot-rate" type="text" name="start_cost" placeholder="0">
            <span class="form__error">Введите начальную цену</span>
        </div>
        <div class="form__item <?= $error['shag_sravka']?"form__item--invalid":"" ?> form__item--small">
            <label for="lot-step">Шаг ставки <sup>*</sup></label>
            <input id="lot-step" type="text" name="shag_sravka" placeholder="0">
            <span class="form__error">Введите шаг ставки</span>
        </div>
        <div class="form__item <?= $error['data_stop']?"form__item--invalid":"" ?>">
            <label for="lot-date">Дата окончания торгов <sup>*</sup></label>
            <input class="form__input-date" id="lot-date" type="text" name="data_stop" placeholder="Введите дату в формате ГГГГ-ММ-ДД">
            <span class="form__error">Введите дату завершения торгов</span>
        </div>
    </div>
    <span class="form__error <?= $fatal?"form__error--bottom":"" ?>">Пожалуйста, исправьте ошибки в форме.</span>
    <button type="submit" class="button">Добавить лот</button>
</form>
