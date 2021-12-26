<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Users */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="users-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'user_name' => $model->user_name], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'user_name' => $model->user_name], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_name',
            'password',
            'F',
            'I',
            'O',
            'email:email',
            'location',
            'birhsday',
            'about:ntext',
            'cat_ids',
            'tel',
            'skype',
            'telegram',
            'viber',
            'avatar',
            'completed_works:ntext',
            'set_noticemsg',
            'set_noticev',
            'set_noticenewresp',
            'set_showcontact1',
            'set_hideprofile',
            'status',
            'rating',
            'dt_add',
            'online',
        ],
    ]) ?>

</div>
