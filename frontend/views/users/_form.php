<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'F')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'I')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'O')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birhsday')->textInput() ?>

    <?= $form->field($model, 'about')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cat_ids')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'skype')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telegram')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'viber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'avatar')->textInput() ?>

    <?= $form->field($model, 'completed_works')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'set_noticemsg')->textInput() ?>

    <?= $form->field($model, 'set_noticev')->textInput() ?>

    <?= $form->field($model, 'set_noticenewresp')->textInput() ?>

    <?= $form->field($model, 'set_showcontact1')->textInput() ?>

    <?= $form->field($model, 'set_hideprofile')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rating')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dt_add')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'online')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
