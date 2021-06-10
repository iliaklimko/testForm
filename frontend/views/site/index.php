<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\Form */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'My Yii Application';
?>

<div class="row">
    <div class="col-lg-5">
        <?php
        $form = ActiveForm::begin([
            'id' => 'contact-form',
            'options' => [
                'class' => 'guruweba_example_form',
                'enctype' => 'multipart/form-data'
            ],
        ]);
        ?>
        <div class="guruweba_example_caption">Обратная связь</div>
        <?= $form->field($model, 'name')->textInput(['autofocus' => true])->label('Ваше имя') ?>

        <?= $form->field($model, 'email')->label('Ваш email') ?>

        <?= $form->field($model, 'message')->label('Сообщение') ?>

        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>


<a href="#" class="btn btn-primary btnShowMessage">Последнее сообщение</a>
<p class="lastMessageText"></p>
