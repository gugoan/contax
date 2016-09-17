<?php

use yii\helpers\Html;


$this->title = Yii::t('app', 'Create Contact');
?>
<div class="contact-create">

<h1>
    <span>
    <?= Html::encode($this->title) ?></span>
    <?= Html::a('<span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> ', ['index'], ['class'=>'btn btn-primary btn-lg grid-button pull-right', 'style' => 'margin-right: 5px;']) ?>
    </h1>
    <hr/>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
