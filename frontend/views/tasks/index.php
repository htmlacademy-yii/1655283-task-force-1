<?php

use frontend\models\Tasks;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\db\Query;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Новые задания';
$this->params['breadcrumbs'][] = $this->title;
?>

<main class="page-main">
    <div class="main-container page-container">
        <section class="new-task">
            <div class="new-task__wrapper">
                <h1><?= Html::encode($this->title) ?></h1>

<?php
$tasks = Tasks::findAll(['status' => 'new']);
//echo "<PRE>";
//print_r($tasks);
//echo "</PRE>";

foreach($tasks as $task) {
    $ago = time() - strtotime($task->time_add);
    if($ago < 3601) {
        $time_add = round($ago/60).' минут назад';
    }
    if($ago < 86400 && $ago > 3600) {
        $time_add = round($ago/3600).' часов назад';
    }
    else {
        $time_add = date('d.m.Y',strtotime($task->time_add));
    }
    $query = new Query();
    $task_lat = $task->lat;
    $task_long = $task->long;
    $query->select(['city'])->from('locations')->orderBy("ABS(`lat` - $task_lat), ABS(`long` - $task_long)")->limit(1);
    $cityName = "Неизвестный город";
    if($query->count() > 0) {
        $cityName = $query->one()['city'];
    }
    ?>
    <div class="new-task__card">
        <div class="new-task__title">
            <a href="view.html" class="link-regular"><h2><?= $task->name ?></h2></a>
            <a class="new-task__type link-regular" href="#"><p><?= $task->categories->name ?></p></a>
        </div>
        <div class="new-task__icon new-task__icon--<?= $task->categories->icon ?>"></div>
        <p class="new-task_description">
            <?= substr($task->about,0,200).'...' ?>
        </p>
        <b class="new-task__price new-task__price--translation"><?= $task->money ?><b> ₽</b></b>
        <p class="new-task__place"><?= $cityName ?></p>
        <span class="new-task__time"><?= $time_add ?></span>
    </div>
    <?php
}
?>

            </div>
            <div class="new-task__pagination">
                <ul class="new-task__pagination-list">
                    <li class="pagination__item"><a href="#"></a></li>
                    <li class="pagination__item pagination__item--current">
                        <a>1</a></li>
                    <li class="pagination__item"><a href="#">2</a></li>
                    <li class="pagination__item"><a href="#">3</a></li>
                    <li class="pagination__item"><a href="#"></a></li>
                </ul>
            </div>
        </section>
        <section class="search-task">
            <div class="search-task__wrapper">
                <form class="search-task__form" name="test" method="post" action="#">
                    <fieldset class="search-task__categories">
                        <legend>Категории</legend>
                        <label class="checkbox__legend">
                            <input class="visually-hidden checkbox__input" type="checkbox" name="" value="" checked>
                            <span>Курьерские услуги</span>
                        </label>
                        <label class="checkbox__legend">
                            <input class="visually-hidden checkbox__input" type="checkbox" name="" value="" checked>
                            <span>Грузоперевозки</span>
                        </label>
                        <label class="checkbox__legend">
                            <input class="visually-hidden checkbox__input" type="checkbox" name="" value="">
                            <span>Переводы</span>
                        </label>
                        <label class="checkbox__legend">
                            <input class="visually-hidden checkbox__input" type="checkbox" name="" value="">
                            <span>Строительство и ремонт</span>
                        </label>
                        <label class="checkbox__legend">
                            <input class="visually-hidden checkbox__input" type="checkbox" name="" value="">
                            <span>Выгул животных</span>
                        </label>
                    </fieldset>
                    <fieldset class="search-task__categories">
                        <legend>Дополнительно</legend>
                        <div>
                            <label class="checkbox__legend">
                                <input class="visually-hidden checkbox__input" type="checkbox" name="" value="">
                                <span>Без исполнителя</span>
                            </label>
                        </div>
                        <div>
                            <label class="checkbox__legend">
                                <input class="visually-hidden checkbox__input" id="7" type="checkbox" name="" value="" checked>
                                <span>Удаленная работа</span>
                            </label>
                        </div>
                    </fieldset>
                    <div class="field-container">
                        <label class="search-task__name" for="8">Период</label>
                        <select class="multiple-select input" id="8" size="1" name="time[]">
                            <option value="day">За день</option>
                            <option selected value="week">За неделю</option>
                            <option value="month">За месяц</option>
                        </select>
                    </div>
                    <div class="field-container">
                        <label class="search-task__name" for="9">Поиск по названию</label>
                        <input class="input-middle input" id="9" type="search" name="q" placeholder="">
                    </div>
                    <button class="button" type="submit">Искать</button>
                </form>
            </div>
        </section>
    </div>
</main>


