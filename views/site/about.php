<?php

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    A Private Phonebook Directory
    </p>
    <p>
    Simple and personal storage of individuals' names, phone numbers, extensions, and other 
    information  made with <code>Yii2</code> and <code>Sqlite</code>
    </p>
</div>
