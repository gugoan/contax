<?php

use yii\helpers\Html;
use \yii\widgets\ListView;

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
      <?= Html::a('<span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> ', ['index'], ['class'=>'btn btn-primary btn-lg grid-button pull-right', 'style' => 'margin-right: 5px;']) ?> 
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

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{items}{pager}',
        'options' => ['class' => 'projects-flow'],
        'itemOptions' => ['class' => 'project'],
        'itemView' => '_card',
    ]) ?>
    
</div>