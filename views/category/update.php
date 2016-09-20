<?php

use yii\helpers\Html;

$this->title = $model->name;
?>
<div class="category-update">

    <h1><span>
    <?= Html::encode($this->title) ?></span>
    <?= Html::a('<span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> ', ['index'], ['class'=>'btn btn-primary btn-lg grid-button pull-right', 'style' => 'margin-right: 5px;']) ?>
    </h1>
    <hr/>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
