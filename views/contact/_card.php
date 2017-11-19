<?php
/**
 * @var $model \app\models\Contact
 */

use yii\helpers\Html;
use yii\helpers\Url;

?>

<article class="">
    <a class="details" href="<?= Url::to(['project/view', 'id' => $model->id, 'slug' => $model->phone]) ?>">
        <img class="img-responsive" src="avatar/<?= $model->avatar ?>" />
        <h1><?= Html::encode($model->shortname) ?></h1>
    </a>

</article>
