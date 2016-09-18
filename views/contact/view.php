<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->shortname;
?>
<div class="contact-view">

    <h1>
    <span>
    <?= Html::encode($this->title) ?></span>
        <p class="pull-right">
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    </h1>
    <hr/>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'category.name',
            'shortname:ntext',
            'fullname:ntext',
            'celphone:ntext',
            'phone:ntext',
            'mail:ntext',
            'website:ntext',
            'blog:ntext',
            'facebookpage:ntext',
            'twitterpage:ntext',
            'googlepluspage:ntext',
            //'description:ntext',
            //'avatar:ntext',
            //'rating',
            [
             'attribute' => 'rating',
             'format' => 'raw',
             'value' => \yii2mod\rating\StarRating::widget([
                       'name' => "rating",
                       'value' => $model->rating,
                       'clientOptions' => [
                           // Your client options
                       ]
                 ]),
            ],            
            [
             'attribute' => 'favorite',
             'format' => 'raw',
             'value' => $model->favorite == 1 ? '<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>' : null,
            ],
        ],
    ]) ?>

</div>
