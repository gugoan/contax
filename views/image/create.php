<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Contact Images');
?>
<?php
	$t = Yii::$app->getRequest()->getQueryParam('id');
	$cod = $model->id;
?>
<div class="image-create">

    <h1>
    <span>
    <?= Html::encode($this->title) ?></span>
    <?= Html::a('<span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> ', ['contact/view', 'id' => Yii::$app->getRequest()->getQueryParam('id')], ['class'=>'btn btn-primary btn-lg grid-button pull-right', 'style' => 'margin-right: 5px;']) ?> 
    </h1>
    <hr/>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    
<div class="panel panel-default">
  <div class="panel-heading">Images</div>
  <div class="panel-body">
// on your view
<?php $items = [
    [
        'url' => 'http://farm8.static.flickr.com/7429/9478294690_51ae7eb6c9_b.jpg',
        'src' => 'http://farm8.static.flickr.com/7429/9478294690_51ae7eb6c9_s.jpg',
        'options' => array('title' => 'Camposanto monumentale (inside)')
    ],
    [
        'url' => 'http://farm3.static.flickr.com/2863/9479121747_0b37c63fe7_b.jpg',
        'src' => 'http://farm3.static.flickr.com/2863/9479121747_0b37c63fe7_s.jpg',
        'options' => array('title' => 'Hafsten - Sunset')
    ],
    [
        'url' => 'http://farm4.static.flickr.com/3712/9478186779_81c2e5f7ef_b.jpg',
        'src' => 'http://farm4.static.flickr.com/3712/9478186779_81c2e5f7ef_s.jpg',
        'options' => array('title' => 'Sail us to the Moon')
    ],
    [
        'url' => 'http://farm4.static.flickr.com/3789/9476654149_b4545d2f25_b.jpg',
        'src' => 'http://farm4.static.flickr.com/3789/9476654149_b4545d2f25_s.jpg',
        'options' => array('title' => 'Sail us to the Moon')
    ],
    [
        'url' => 'http://farm8.static.flickr.com/7429/9478868728_e9109aff37_b.jpg',
        'src' => 'http://farm8.static.flickr.com/7429/9478868728_e9109aff37_s.jpg',
        'options' => array('title' => 'Sail us to the Moon')
    ],
    [
        'url' => 'http://farm4.static.flickr.com/3825/9476606873_42ed88704d_b.jpg',
        'src' => 'http://farm4.static.flickr.com/3825/9476606873_42ed88704d_s.jpg',
        'options' => array('title' => 'Sail us to the Moon')
    ],
    [
        'url' => 'http://farm4.static.flickr.com/3749/9480072539_e3a1d70d39_b.jpg',
        'src' => 'http://farm4.static.flickr.com/3749/9480072539_e3a1d70d39_s.jpg',
        'options' => array('title' => 'Sail us to the Moon')
    ],
    [
        'url' => 'http://farm8.static.flickr.com/7352/9477439317_901d75114a_b.jpg',
        'src' => 'http://farm8.static.flickr.com/7352/9477439317_901d75114a_s.jpg',
        'options' => array('title' => 'Sail us to the Moon')
    ],
    [
        'url' => 'http://farm4.static.flickr.com/3802/9478895708_ccb710cfd1_b.jpg',
        'src' => 'http://farm4.static.flickr.com/3802/9478895708_ccb710cfd1_s.jpg',
        'options' => array('title' => 'Sail us to the Moon')
    ],
];?>
<?= dosamigos\gallery\Gallery::widget(['items' => $items]);?>
  </div>
</div>

</div>
