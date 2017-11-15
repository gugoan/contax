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

    <?php foreach (Yii::$app->session->getAllFlashes() as $key=>$message):?>
        <?php $alertClass = substr($key,strpos($key,'-')+1); ?>
        <div class="alert alert-dismissible alert-<?=$alertClass?>" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p><?=$message?></p>
        </div>
    <?php endforeach ?> 
    
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
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function ($model) {                      
                    return '<span class="glyphicon glyphicon-tag" aria-hidden="true" style="color:'. $model->color .'"></span> ' . $model->name;
                },
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>