//список категорий
INSERT INTO categorie (`id_categorie`, `name`)
VALUE ('1', 'Доски и лыжи'),
  ('2', 'Крепления'),
  ('3', 'Ботинки'),
  ('4', 'Одежда'),
  ('5', 'Инструменты'),
  ('6', 'Разное');
//добавление пользователей
  INSERT INTO user (`id_user`,`name`, `email`, `password`, `image`, `contact`, `date_regisrtatoin`)
  VALUE ('1','Карина','burik02@bk.ru','qwerty','1.jpg','89299259651','16.05.2022'),
  ('2','Коля','test2@mail.ru','qwerty123','2.jpg','88005553535','16.05.2022'),
  ('3','Владимир','test@mail.ru','qwerty222','3.jpg','89296578900','16.05.2022');
//добавление списка объявлений
  INSERT INTO lot (`id_lot`,`id_winner`, `id_categorie`, `id_user`,`data_creation`, `name`, `description`, `image`, `start_cost`, `data_stop`, `shag_sravka`)
   VALUE ('1','1','1','1','16.05.22','Карина','2014 Rossignol District Snowboard','1.jpg','10','17.05.22','шаг ставки'),
  ('2','2','2','2','16.05.22','Коля','DC Ply Mens 2016/2017 Snowboard','2.jpg','20','18.05.22','шаг ставки'),
  ('3','3','3','3','16.05.22','Владимир','Крепления Union Contact Pro 2015 года размер L/XL','3.jpg','30','19.05.22','шаг ставки');
// добавление ставок
    INSERT INTO stavka (`id_stavka`,`id_lot`,`date`, `summa`, `id_user`)
  VALUE ('1','NULL','17.05.22','5500','1'),
  ('2','NULL','17.05.22','6000','2'),
  ('3','NULL','17.05.22','3000','3');
//все категории
select * from categorie;
//получить самые новые, открытые лоты. Каждый лот должен включать название, стартовую цену, ссылку на изображение, цену последней ставки, количество ставок, название категории;
select a.name,
       start_cost,
       image,
       (sum(b.summa)+a.start_cost)Последняя_ставка,
       count(b.summa)Количество_ставок,
       c.name,
       ID_winner
from lot as a
       left join stavka b
                 on a.id_lot = b.id_lot
       inner join categorie c on a.id_categorie = c.id_categorie
group by a.name, start_cost, image,data_creation,id_winner,data_stop, c.name
having ISNULL(data_stop)
order by data_creation desc;
//показать лот по его id. Получите также название категории, к которой принадлежит лот
  SELECT `id_lot`,`categorie`.`name` FROM lot INNER JOIN categorie ON `lot`.`id_categorie` = `categorie`.`id_categorie`;
//обновить название лота по его идентификатору;
UPDATE `lot` SET `name`= 'Карина' WHERE `id_lot` = 1;   UPDATE `lot` SET `name`= 'Карина_тест' WHERE `id_lot` = 1;
//2
UPDATE lot
SET name = '2015 Rossignol District Snowboard'
WHERE id_lot = 1;
//получить список самых свежих ставок для лота по его идентификатору;
SELECT  date, summa from stavka where id_lot = 1 order by date
//2
SELECT date,
  summa
FROM stavka
WHERE id_lot = 1
order by date
