<?php

use yii\helpers\Html;

use yii\bootstrap\ActiveForm;

?>
<div class="user-default-login">
    <div class="container">
        <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
        <h1 class="text-center login-title"><?php echo Yii::t('app', 'Login to access the System');?></h1>
        <div>
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'options' => ['class' => 'form-signin'],
            ]); ?>

            <?= $form->field($model, 'username')->label(false,['class'=>'label-class'])->textInput(array('placeholder' => Yii::t('app', 'E-mail or Username'))) ?>
            <?= $form->field($model, 'password')->label(false,['class'=>'label-class'])->passwordInput(array('placeholder' => Yii::t('app', 'Password'))) ?>

            <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-lg btn-primary btn-block']) ?>

            <?php ActiveForm::end(); ?>

        </div>
        </div>
        </div>
    </div> 
</div>