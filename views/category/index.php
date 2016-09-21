<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = Yii::t('app', 'Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1>
    <span>
    <?= Html::encode($this->title) ?></span>
    <?= Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>', ['create'], ['class'=>'btn btn-primary btn-lg grid-button pull-right']) ?>
    </h1>
    <hr/>

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class'=>'table table-striped table-hover'],
        'rowOptions'   => function ($model, $index, $widget, $grid) {
                return [
                    'id' => $model['id'], 
                    'onclick' => 'location.href="'
                        . Yii::$app->urlManager->createUrl('category/update') 
                        . '&id="+(this.id);',
                    'style' => "cursor: pointer",
                ];
        },         
        'columns' => [
            'name:ntext',
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>