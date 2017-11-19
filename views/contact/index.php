<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = Yii::t('app', 'Contacts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-index">

  <div class="row">
    <div class="col-md-6">
    <h1><span><?= Html::encode($this->title) ?></span></h1>
    </div>
    <div class="col-md-6">
    <h1>
        <?= Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> ', ['create'], ['class'=>'btn btn-primary btn-lg grid-button pull-right', 'style' => 'margin-right: 5px;']) ?> 
        <button class="btn btn-primary btn-lg grid-button pull-right" style='margin-right: 5px;' type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
      <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
      </button>
      <?= Html::a('<span class="glyphicon glyphicon-th" aria-hidden="true"></span> ', ['grid'], ['class'=>'btn btn-primary btn-lg grid-button pull-right', 'style' => 'margin-right: 5px;']) ?> 
      </h1>
    </div>
  </div>

    <hr/>

    <div class="collapse" id="collapseExample">
      <div class="well">
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
      </div>
    </div>   

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
                      return $model->avatar == '' ? Html::img(Yii::$app->params['uploadUrl'].'default.png',
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
                      return Html::a('<span class="glyphicon glyphicon-earphone" ></span>', $model->celphone, [
                                  'class' => 'btn btn-default',
                      ]);
                  },                                                   
                ],
            ],
        ],
        
    ]); ?>
    <?php Pjax::end(); ?>
</div>