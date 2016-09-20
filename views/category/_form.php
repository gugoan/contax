<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\color\ColorInput;

?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 45]) ?>

    <?php
    echo $form->field($model, 'color')->widget(ColorInput::classname(), [
    	'options' => ['placeholder' => Yii::t('app', 'Select')],
	]);
    ?>    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>' : '<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>', ['class' => $model->isNewRecord ? 'btn btn-primary btn-lg grid-button' : 'btn btn-primary btn-lg grid-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>