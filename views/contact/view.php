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
        <?= Html::a('<span class="glyphicon glyphicon-camera" aria-hidden="true"></span> ' . Yii::t('app', 'Images'), ['image/create', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> ' . Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> ' .Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
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
            'fullname:ntext',
            'phone:ntext',
            'mail:ntext',
            'website:ntext',
            'blog:ntext',
            'facebookpage:ntext',
            'twitterpage:ntext',
            'googlepluspage:ntext',
            //'description:ntext',
        ],
    ]) ?>

      </div>
    </div>    

<div class="panel panel-default">
  <div class="panel-heading">Images</div>
  <div class="panel-body">
    Panel content
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">Info</div>
  <div class="panel-body">
    Panel content
  </div>
</div>

</div>
