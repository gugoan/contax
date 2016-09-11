<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ContactSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contact-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'shortname') ?>

    <?= $form->field($model, 'fullname') ?>

    <?= $form->field($model, 'celphone') ?>

    <?= $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'mail') ?>

    <?php // echo $form->field($model, 'website') ?>

    <?php // echo $form->field($model, 'blog') ?>

    <?php // echo $form->field($model, 'facebookpage') ?>

    <?php // echo $form->field($model, 'twitterpage') ?>

    <?php // echo $form->field($model, 'googlepluspage') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'avatar') ?>

    <?php // echo $form->field($model, 'category_id') ?>

    <?php // echo $form->field($model, 'rating') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
