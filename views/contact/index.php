<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = Yii::t('app', 'Contacts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-index">

    <h1>
    <span>
    <?= Html::encode($this->title) ?></span>
    <?= Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>', ['create'], ['class'=>'btn btn-primary btn-lg grid-button pull-right']) ?>
    </h1>
    <hr/>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

            'id',
            'shortname:ntext',
            'fullname:ntext',
            'celphone:ntext',
            'phone:ntext',
            // 'mail:ntext',
            // 'website:ntext',
            // 'blog:ntext',
            // 'facebookpage:ntext',
            // 'twitterpage:ntext',
            // 'googlepluspage:ntext',
            // 'description:ntext',
            // 'avatar:ntext',
            // 'category_id',
            // 'rating',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
