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
    <?= Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> ', ['create'], ['class'=>'btn btn-primary btn-lg grid-button pull-right', 'style' => 'margin-right: 5px;']) ?> 
    <button class="btn btn-primary btn-lg grid-button pull-right" style='margin-right: 5px;' type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
  <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
</button>
    </h1>
    <hr/>

    <div class="collapse" id="collapseExample">
      <div class="well">
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
      </div>
    </div>    

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class'=>'table table-striped table-hover'],
        'rowOptions'   => function ($model, $index, $widget, $grid) {
                return [
                    'id' => $model['id'], 
                    'onclick' => 'location.href="'
                        . Yii::$app->urlManager->createUrl('contact/') 
                        . '/"+(this.id);',
                    'style' => "cursor: pointer",
                ];
        },         
        'columns' => [
            'shortname:ntext',
            'celphone:ntext',
        ],
        
    ]); ?>
    <?php Pjax::end(); ?>
</div>