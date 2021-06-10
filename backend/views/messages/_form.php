<?php

use yii\helpers\Html;
use backend\components\widgets\ActiveForm\ActiveForm;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\web\YiiAsset;


$pluginOptions = [];

/* @var $this yii\web\View */
/* @var $model common\models\Partners */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(['options' => ['id' => 'user-form', 'enctype' => 'multipart/form-data']]); ?>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Partner</h3>
                    </div>
                    <div class="box-body">

                        <?= !$model->isNewRecord
                            ? $form->field($model, 'id')->textInput(['readonly' => true])
                            : null
                        ?>

                        <?= $form->field($model, 'title')->label('Название партнера') ?>
                        <?= $form->field($model, 'utm')->textInput(['readonly' => true])->label('UTM метка партнера (partner-key)') ?>

                        <?= $model->isNewRecord
                            ? '<button class="update_utm btn btn-primary" onclick="return false">Сгенерировать новый код</button>'
                            : null
                        ?>

                        <?= $form->field($model, 'site_url')->label('Адрес сайта') ?>
                        <?= $form->field($model, 'card_binding_sum')->label('Сумма за привязку карты (руб.)') ?>
                        <?= $form->field($model, 'active')->checkbox()->label('Активность') ?>
                        <?= $form->field($model, 'clean_response')->checkbox()->label('Не отправлять ответ') ?>
                        <?= $form->field($model, 'send_email')->checkbox()->label('Отправлять клиентам email') ?>
                        <?if(!$model->isNewRecord) {?>
                            <a href="<?= '/admin/api-settings?source=' . $model->utm;?>"><b>Перейти к настройкам веб-мастеров</b></a>
                        <?}?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group well">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Создать') : Yii::t('app', 'Сохранить'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <a href="/admin/clients" class="btn btn-warning">Отмена</a>
</div>

<?php ActiveForm::end(); ?>
<?if(!$model->isNewRecord) {?>
    <div class="alert" id="successMsg" style="display: none" role="alert">

    </div>
    <h3>Пересчет для всего партнера</h3>

    <div class="row">
        <div class="col-md-3">
            <br>
            <label for="date-start-api">Дата с</label>
            <input type="date" id="date-start-api" class="form form-control">
            <br>
            <label for="date-end-api">Дата по</label>
            <input type="date" id="date-end-api" class="form form-control">
            <br>
            <label for="bind-val">Новое значение ссылочного дохода</label>
            <input type="text" onkeyup="this.value=this.value.replace(/[A-Za-zА-Яа-я!@#$%^&*(),.<>:'+?/~`{}_-]/g, '')" id="incomeValApi" class="form form-control">
            <br>
            <input type="button" id="btnIncome" value="Пересчитать" class="btn btn-success">
            <br>
            <br>
            <label for="bind-val-api">Новое значение для привязки карт</label>
            <input type="text" onkeyup="this.value=this.value.replace(/[A-Za-zА-Яа-я!@#$%^&*().,<>:'+?/~`{}_-]/g, '')" id="bind-val-api" class="form form-control">
            <br>
            <input type="button" id="btnBindValApi" value="Пересчитать" class="btn btn-success">
            <br>
            <br>
            <label for="new-val-unique-api">Новое значение для уникальных привязок карт</label>
            <input type="text" id="new-val-unique-api" onkeyup="this.value=this.value.replace(/[A-Za-zА-Яа-я!@#$%^&*(),.<>:'+?/~`{}_-]/g, '')" class="form form-control">
            <br>
            <input type="button" id="btnRecalcUniqueApi" value="Пересчитать" class="btn btn-success">
            <br>
            <br>
            <label for="new-val-sms-api">Новое значение для СМС</label>
            <input type="text" onkeyup="this.value=this.value.replace(/[A-Za-zА-Яа-я!@#$%^&*(),<>:'+?/~`{}_-]/g, '')" id="new-val-sms-api" class="form form-control">
            <br>
            <input type="button" id="btnRecalcSmsApi" value="Пересчитать" class="btn btn-success">
        </div>
    </div>

<?}?>



