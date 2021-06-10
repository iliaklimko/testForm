<aside class="main-sidebar">

    <section class="sidebar">
        <?php
        use yii\helpers\Url;
        use yii\widgets\ActiveForm;
        use yii\helpers\Html;
        use yii\bootstrap\Dropdown ;
        ?>

            <?= html_entity_decode(dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                    'items' => [
                        ['label' => 'Меню', 'options' => ['class' => 'header']],
                        ['label' => 'Сообщения', 'icon' => 'fa fa-user-o', 'url' => ['/messages']],


                    ],
                ]
            )) ?>
    </section>

</aside>
