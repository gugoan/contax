<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>
<?php
	$t = Yii::$app->getRequest()->getQueryParam('id');
	$cod = $model->id;
?>
<div class="image-form">

    <?php $form = ActiveForm::begin([
		        'id' => 'imageform',
		        'options' => [
		            'enctype'=>'multipart/form-data',
		            ],
	]); ?>

    <?php
    echo Html::activeHiddenInput($model, 'contact_id', ['value' => $t]);    

    echo $form->field($model, 'file')->fileInput(['maxlength' => true]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
