<?php

use yii\helpers\Html;
use yii\data\SqlDataProvider;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\grid\GridView;

$this->title = Yii::t('app', 'Contact Images');
?>
<?php
	$t = Yii::$app->getRequest()->getQueryParam('id');
	$cod = $model->id;
    $dataProvider = new SqlDataProvider([
        'sql' => "SELECT  image.id, 
            contact_id, 
            shortname,
            name 
            FROM image 
            INNER JOIN contact
            ON image.contact_id = contact.id
            WHERE contact_id =  $t",
        'totalCount' => 200,
        'sort' =>false,
        'key'  => 'id',
        'pagination' => [
            'pageSize' => 200,
        ],
    ]);    
?>
<div class="image-create">

    <h1>
    <span>
    <?= Html::encode($this->title) ?></span>
    <?= Html::a('<span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> ', ['contact/view', 'id' => Yii::$app->getRequest()->getQueryParam('id')], ['class'=>'btn btn-primary btn-lg grid-button pull-right', 'style' => 'margin-right: 5px;']) ?> 
    </h1>
    <hr/>

    <?php foreach (Yii::$app->session->getAllFlashes() as $key=>$message):?>
        <?php $alertClass = substr($key,strpos($key,'-')+1); ?>
        <div class="alert alert-dismissible alert-<?=$alertClass?>" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p><?=$message?></p>
        </div>
    <?php endforeach ?>

    <div class="panel panel-default">
      <div class="panel-heading"><?= Yii::t('app', 'Send Image')?></div>
      <div class="panel-body">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
      </div>
    </div>
    
<div class="panel panel-default">
  <div class="panel-heading"><?= Yii::t('app', 'Gallery')?></div>
  <div class="panel-body">
    <?php             
    $items = array();
        $prov = $models = $dataProvider->getModels();
        if(!empty($prov))
            {
                foreach($prov as $row)
                {
                $items[] = [
                    'image' => Yii::$app->request->BaseUrl."/".Yii::$app->params['uploadImage'].$row["contact_id"].'/'.$row["name"],
                    'title' => $row["shortname"],
                    'caption' => $row["shortname"],
                    'size' => '1024x685',
                    'thumb' => Yii::$app->request->BaseUrl."/".Yii::$app->params['uploadImage'].$row["contact_id"].'/'.$row["name"],
                    ];
                }   
            } else {
                //echo "<span class=\"not-set\">(não possui imagens)</span>";
            }

    echo \modernkernel\photoswipe\Gallery::widget([
        'items' => $items
    ])
    ?>
  </div>
</div>
</div>