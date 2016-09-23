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
        'sql' => "SELECT  id, contact_id, name FROM image WHERE contact_id = $t",
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
                            // echo Html::a(Html::img(Yii::$app->params['uploadImage'].$row["contact_id"].'/'.$row["name"],
                            //  ['width' => '50px']), Yii::$app->params['uploadImage'].$row["contact_id"].'/'.$row["name"], ['target' => '_blank', 'class' => 'img-thumbnail']);
                            $items[] = [
                                'url' => "http://localhost".Yii::$app->request->BaseUrl."/".Yii::$app->params['uploadImage'].$row["contact_id"].'/'.$row["name"],
                                'src' => "http://localhost".Yii::$app->request->BaseUrl."/".Yii::$app->params['uploadImage'].$row["contact_id"].'/'.$row["name"],
                                ];
                        }   
                    } else {
                        //echo "<span class=\"not-set\">(não possui imagens)</span>";
                    }

            ?>
<p>
<br/>
</p>

<?= dosamigos\gallery\Gallery::widget(['items' => $items]);?>

  </div>
</div>

</div>
