<?php

use yii\helpers\Html;
use yii\helpers\StringHelper;
use backend\components\widgets\GridView\GridViewWidget as GridView;
use backend\components\widgets\HeaderMenu\HeaderMenu;
use yii\web\YiiAsset;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MessagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список сообщений';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="user-index box box-primary">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'headerOptions' => [
                    'style' => 'width: 4%;',
                ],
            ],

            [
                'attribute' => 'id',
                'headerOptions' => [
                    'style' => 'width: 4%;',
                ],
            ],


            [
                'label' => 'Сообщение',
                'attribute' => 'message',
            ],

            [
                'label' => 'Имя',
                'attribute' => 'name',
            ],

            [
                'label' => 'Почта',
                'attribute' => 'email',
            ],

            [
                'label' => 'Дата создания',
                'attribute' => 'created_at',
                'format' => ['date', 'php:Y-m-d H:i'],
                'filter' => false,
            ],

            [
                'label' => 'Дата редактирования',
                'attribute' => 'updated_at',
                'format' => ['date', 'php:Y-m-d H:i'],
                'filter' => false,
            ],

        ],
    ]); ?>
</div>
