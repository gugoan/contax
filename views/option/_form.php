<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="option-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'language')->dropDownList([
        'en' => Yii::t('app', 'English USA'), 
        'pt-br' => Yii::t('app', 'Brazilian Portuguese'), 
        ]); 
    ?>

    <?= $form->field($model, 'theme')->dropDownList([
        'darkly' => 'Darkly', 
        'paper' => 'Paper', 
        'sandstone' => 'Sandstone', 
        'united' => 'United', 
        ]); 
    ?>

    <?= $form->field($model, 'defaultpage')->dropDownList([
        'contact/index' => Yii::t('app', 'Basic List'), 
        'contact/grid'  => Yii::t('app', 'Grid'), 
        ]); 
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
