<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->shortname . " #" . $model->id;
?>
<div class="contact-view">

    <h1>
    <span>
    <?= Html::encode($this->title) ?></span>
        <p class="pull-right">
        <?= Html::a('<span class="glyphicon glyphicon-camera" aria-hidden="true"></span>', ['image/create', 'id' => $model->id], ['class' => 'btn btn-success btn-lg grid-button pull-right', 'style' => 'margin-right: 5px;']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-lg grid-button pull-right', 'style' => 'margin-right: 5px;']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-lg grid-button pull-right',
            'style' => 'margin-right: 5px;',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    </h1>
    <hr/>

    <div class="row">
      <div class="col-md-6">

<?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
            'attribute'=>'avatar',
            'value' => $model->avatar == '' ? Yii::$app->params['uploadUrl'].'default.jpg' : Yii::$app->params['uploadUrl'].$model->avatar,            
            'format' => ['image',['width'=>'100','height'=>'200', 'class'=>'img-thumbnail']],
            ],
            'category.name',
            'shortname:ntext',
            'celphone:ntext',
            [
             'attribute' => 'rating',
             'format' => 'raw',
             'value' => \yii2mod\rating\StarRating::widget([
                       'name' => "rating",
                       'value' => $model->rating,
                       'clientOptions' => [
                           'numberMax' => 10,
                           'number' => 10,
                           'readOnly' => true,
                       ]
                 ]),
            ],            
            [
             'attribute' => 'favorite',
             'format' => 'raw',
             'value' => $model->favorite == 1 ? '<span style="color:red;" class="glyphicon glyphicon-heart" aria-hidden="true"></span>' : '<span style="color:gray;" class="glyphicon glyphicon-heart" aria-hidden="true"></span>',
            ],
        ],
    ]) ?>

      </div>
      <div class="col-md-6">

<?= DetailView::widget([
        'model' => $model,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
        'attributes' => [
            [
                'attribute' => 'fullname',  
                'format' => 'raw',
                'value' => $model->fullname == '' ?  '<span class="not-set">(não informado)</span>' : $model->fullname,
            ],
            [
                'attribute' => 'phone',  
                'format' => 'raw',
                'value' => $model->phone == '' ?  '<span class="not-set">(não informado)</span>' : $model->phone,
            ], 
            [
                'attribute' => 'mail',  
                'format' => 'raw',
                'value' => $model->mail == '' ?  '<span class="not-set">(não informado)</span>' : $model->mail,
            ], 
            [
                'attribute' => 'website',  
                'format' => 'raw',
                'value' => $model->website == '' ?  '<span class="not-set">(não informado)</span>' : $model->website,
            ], 
            [
                'attribute' => 'blog',  
                'format' => 'raw',
                'value' => $model->blog == '' ?  '<span class="not-set">(não informado)</span>' : $model->blog,
            ],
            [
                'attribute' => 'facebookpage',  
                'format' => 'raw',
                'value' => $model->facebookpage == '' ?  '<span class="not-set">(não informado)</span>' : $model->facebookpage,
            ],
            [
                'attribute' => 'twitterpage',  
                'format' => 'raw',
                'value' => $model->twitterpage == '' ?  '<span class="not-set">(não informado)</span>' : $model->twitterpage,
            ],
            [
                'attribute' => 'googlepluspage',  
                'format' => 'raw',
                'value' => $model->googlepluspage == '' ?  '<span class="not-set">(não informado)</span>' : $model->googlepluspage,
            ], 
        ],
    ]) ?>

      </div>
    </div>    

    <div class="panel panel-default">
      <div class="panel-heading"><strong><?= Yii::t('app', 'Description')?></strong></div>
      <div class="panel-body">
        <?= $model->description == '' ?  '<span class="not-set">(não informado)</span>' : $model->description?>
      </div>
    </div>

</div>