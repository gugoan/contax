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
                        . Yii::$app->urlManager->createUrl('contact/view') 
                        . '&id="+(this.id);',
                    'style' => "cursor: pointer",
                ];
        },        
        'columns' => [
            [
                'attribute' => 'shortname',
                'format' => 'html',
                'value' => function ($model) {                      
                      return $model->avatar == '' ? Html::img(Yii::$app->params['uploadUrl'].'default.jpg',
                        ['width' => '50px', 'height'=>'50px', 'class' => 'img-rounded img-thumbnail']). ' '.$model->shortname : Html::img(Yii::$app->params['uploadUrl'].$model->avatar,
                        ['width' => '50px', 'height'=>'50px', 'class' => 'img-rounded img-thumbnail']).' '.$model->shortname;
                },
                'contentOptions'=>['style'=>'width: 50%;text-align:left'],
            ],        
            [
                'attribute' => 'celphone',
                'format' => 'raw',
                'contentOptions'=>['style'=>'width: 40%;text-align:left;vertical-align: middle;'],
            ],
            [
              'class' => 'yii\grid\ActionColumn',
              'header' => false,  
              'contentOptions'=>['style'=>'width: 10%;text-align:right'],
              'headerOptions' => ['class' => 'text-center'],                            
              'template' => '{call}',
              'buttons' => [
                  'call' => function ($url, $model) {
                      return Html::a('<span class="glyphicon glyphicon-earphone" ></span>', "tel:+1-303-499-7111", [
                                  'class' => 'btn btn-default',
                      ]);
                  },                                                   
                ],
            ],
        ],
        
    ]); ?>
    <?php Pjax::end(); ?>
</div>