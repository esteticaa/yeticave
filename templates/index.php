<section class="promo">
    <h2 class="promo__title">Нужен стафф для катки?</h2>
    <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
    <ul class="promo__list">
        <?php
        foreach ($mains as $q)
        {?>
            <li class="promo__item promo__item--<?=$q['eng']?>">
                <a class="promo__link" href="pages/all-lots.html"><?=$q['rus']?></a>
            </li>
            <?php

        }
        ?>
        <!--заполните этот список из массива категорий-->
    </ul>
</section>
<section class="lots">
    <div class="lots__header">
        <h2>Открытые лоты</h2>
    </div>
    <ul class="lots__list">
        <?php
        foreach ($info as $q)
        {?>
            <!--заполните этот список из массива с товарами-->
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="<?=$q['url']?>" width="350" height="260" alt="">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?=$q['categorie']?></span>
                    <h3 class="lot__title"><a class="text-link" href="pages/lot.html"><?=$q['name']?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Стартовая цена</span>
                            <span class="lot__cost"><?=sub_format($q["price"])?></span>
                        </div>
                        <div class="lot__timer timer">
                            <?=timer()?>
                        </div>
                    </div>
                </div>
            </li>
            <?php

        }
        ?>
    </ul>
</section>