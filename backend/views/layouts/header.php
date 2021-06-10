<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-lg">'. Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <li class="user user-menu">
                    <a href="/admin/user/update?id=<?= Yii::$app->user->identity->id?>" >
                        <span class="hidden-xs"><?= Yii::$app->user->identity->full_name?></span>
                    </a>
                </li>
                <li class="">

                    <?= Html::a(
                        'Выход',
                        ['/site/logout'],
                        ['data-method' => 'post', 'class' => 'btn btn-flat']
                    ) ?>
                </li>

            </ul>
        </div>
    </nav>
</header>
