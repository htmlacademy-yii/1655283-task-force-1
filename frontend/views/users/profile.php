<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\Users;
use yii\db\Query;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;

//define('SERVER_PATH',$_SERVER['HTTPS'].'://'.$_SERVER['HTTP_HOST'].'/');
?>
<main class="page-main">
    <div class="main-container page-container">
        <section class="user__search">
            <?php
            $users = Users::findAll(['role' => 'performer']);
            $qe = new Query();
            $qe->select(['id','name','icon'])->from('categories');
            $rows = $qe->all();
            foreach($rows As $row)
            {
                $catArr[$row['id']]['name'] = $row['name'];
                $catArr[$row['id']]['icon'] = $row['icon'];
            }

            foreach($users as $user) {
                $user_name = $user->F.' '.$user->I;
                $tt = '';
                if(strlen($user->about) > 200)
                {
                    $tt = '...';
                }
                $online = '';
                $user_online = $user->online;
                $delta = time() - $user_online;
                if($delta < 60) {
                    $online = "Online";
                }
                if($delta >= 60 && $delta < 3600) {
                    $min = round($delta / 60); $online = "Был на сайте $min минут назад";
                }
                if($delta >= 3600 && $delta < 86400) {
                    $min = round($delta / 3600); $online = "Был на сайте $min часов назад";
                }
                if($delta >= 86400 && $delta < 2592000) {
                    $min = round($delta / 86400); $online = "Был на сайте $min дней назад";
                }
                if($delta >= 2592000 && $delta < 31104000) {
                    $min = round($delta / 2592000); $online = "Был на сайте $min месяца назад";
                }
                if($delta >= 31104000) {
                    $min = round($delta / 31104000); $online = "Был на сайте $min лет назад";
                }

                $cat_ids = $user->cat_ids;
                $cat_ids = explode(",",$cat_ids);
                $num_task = count($user->tasks);
                $num_res = count($user->responces);
                
            ?>
            <div class="content-view__feedback-card user__search-wrapper">
                <div class="feedback-card__top">
                    <div class="user__search-icon">
                        <a href="user.html"><img src="<?= SERVER_PATH ?>img/<?= $user->avatar ?>" width="65" height="65"></a>
                        <span><?= $num_task ?> заданий</span>
                        <span><?= $num_res ?> отзывов</span>
                    </div>
                    <div class="feedback-card__top--name user__search-card">
                        <p class="link-name"><a href="user.html" class="link-regular"><?= $user_name ?></a></p>
                        <span></span><span></span><span></span><span></span><span class="star-disabled"></span>
                        <b><?= $user->rating; ?></b>
                        <p class="user__search-content">
                            <?= substr($user->about,0,200).$tt; ?>
                        </p>
                    </div>
                    <span class="new-task__time"><?= $online ?></span>
                </div>
                <div class="link-specialization user__search-link--bottom">
                    <?php
                    if(count($cat_ids) > 0)
                    {
                        foreach($cat_ids As $cat)
                        {
                            echo "<a href=\"browse.html\" class=\"link-regular\">".$catArr[$cat]['name']."</a>".PHP_EOL;
                        }
                    }

                    ?>
                </div>
            </div>
            <?php
            }
            ?>
        </section>
        <section class="search-task">
            <div class="search-task__wrapper">
                <form class="search-task__form" name="users" method="post" action="#">
                    <fieldset class="search-task__categories">
                        <legend>Категории</legend>
                        <label class="checkbox__legend">
                            <input class="visually-hidden checkbox__input" type="checkbox" name="" value="" checked disabled>
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
                        <label class="checkbox__legend">
                            <input class="visually-hidden checkbox__input" type="checkbox" name="" value="">
                            <span>Сейчас свободен</span>
                        </label>
                        <label class="checkbox__legend">
                            <input class="visually-hidden checkbox__input" type="checkbox" name="" value="">
                            <span>Сейчас онлайн</span>
                        </label>
                        <label class="checkbox__legend">
                            <input class="visually-hidden checkbox__input" type="checkbox" name="" value="">
                            <span>Есть отзывы</span>
                        </label>
                        <label class="checkbox__legend">
                            <input class="visually-hidden checkbox__input" type="checkbox" name="" value="">
                            <span>В избранном</span>
                        </label>
                    </fieldset>
                    <label class="search-task__name" for="110">Поиск по имени</label>
                    <input class="input-middle input" id="110" type="search" name="q" placeholder="">
                    <button class="button" type="submit">Искать</button>
                </form>
            </div>
        </section>
    </div>
</main>
