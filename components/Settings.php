<?php

namespace app\components;
use yii\base\BootstrapInterface;
use Yii;

use app\models\Option;
use app\models\OptionSearch;

class Settings implements BootstrapInterface
{
    public $supportedLanguages = [];

    public function bootstrap($app)
    {

    $model = Option::find()->where(['id' => 1])->one();

        if(!Yii::$app->user->isGuest) {

            //Yii::$app->language = Yii::$app->user->identity->language;
            //Yii::$app->defaultRoute = Yii::$app->user->identity->defaultpage;
            Yii::$app->language         = $model->language;
            Yii::$app->defaultRoute     = $model->defaultpage;
            
        }else{
            Yii::$app->language = Yii::$app->request->getPreferredLanguage($this->supportedLanguages);
            Yii::$app->defaultRoute     = $model->defaultpage;
        }
    }
}

//https://stackoverflow.com/questions/27778477/how-to-make-custom-settings-data-available-globally-in-yii-2