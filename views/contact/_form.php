<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Category;
use yii\widgets\MaskedInput;

?>

<div class="contact-form">

    <?php $form = ActiveForm::begin([
        'id' => 'contactform',
        'options' => [
            'enctype'=>'multipart/form-data',
            ],
    ]); ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::find()->orderBy("name ASC")->all(), 'id', 'name'),['prompt'=>'-- select --'])  ?>

    <?= $form->field($model, 'shortname')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'celphone')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '(99)999999999',
    ]) ?>

    <?php
   echo $form->field($model, 'rating')->widget(\yii2mod\rating\StarRating::className(), [
                       'options' => [
                           // options
                       ],
                       'clientOptions' => [
                           'numberMax' => 10,
                           'number' => 10,
                       ]
                   ]); 
    ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <div class="collapse" id="collapseExample">
      <div class="well">

      <div class="row">
        <div class="col-md-6">

        <?= $form->field($model, 'fullname')->textInput(['maxlength' => 45]) ?>   

        <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
            'mask' => '(99)999999999',
        ]) ?>

        <?= $form->field($model, 'mail')->textInput(['maxlength' => 45]) ?>

        <?= $form->field($model, 'website')->textInput(['maxlength' => 45]) ?>

        <?= $form->field($model, 'blog')->textInput(['maxlength' => 45]) ?>

        <?= $form->field($model, 'facebookpage')->textInput(['maxlength' => 45]) ?>

        <?= $form->field($model, 'twitterpage')->textInput(['maxlength' => 45]) ?>

        <?= $form->field($model, 'googlepluspage')->textInput(['maxlength' => 45]) ?>

        <?= $form->field($model, 'favorite')->checkbox() ?>

        </div>
        <div class="col-md-6">

        <?= $form->field($model, 'description')->textarea(['rows' => 20]) ?>
        <hr/>
        
        </div>
      </div>      
    
      </div>
    </div>      

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' : '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>', ['class' => $model->isNewRecord ? 'btn btn-primary btn-lg grid-button' : 'btn btn-primary btn-lg grid-button']) ?>

        <a class="btn btn-primary btn-lg grid-button" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span> More info</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>