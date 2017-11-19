<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Options');

?>
<div class="option-update">

    <h1><span>
    <?= Html::encode($this->title) ?></span>
    <?= Html::a('<span class="glyphicon glyphicon-erase" aria-hidden="true"></span> ', ['#'], ['class'=>'btn btn-primary btn-lg grid-button pull-right', 'style' => 'margin-right: 5px;']) ?>
    </h1>
    <hr/>

    <?php foreach (Yii::$app->session->getAllFlashes() as $key=>$message):?>
        <?php $alertClass = substr($key,strpos($key,'-')+1); ?>
        <div class="alert alert-dismissible alert-<?=$alertClass?>" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p><?=$message?></p>
        </div>
    <?php endforeach ?> 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
