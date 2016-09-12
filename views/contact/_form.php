<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Category;

?>

<div class="contact-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::find()->orderBy("name ASC")->all(), 'id', 'name'),['prompt'=>'-- select --'])  ?>

    <?= $form->field($model, 'shortname')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fullname')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'celphone')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'phone')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mail')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'website')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'blog')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'facebookpage')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'twitterpage')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'googlepluspage')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'avatar')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rating')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
