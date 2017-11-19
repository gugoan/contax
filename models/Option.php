<?php

namespace app\models;

use Yii;

class Option extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'option';
    }

    public function rules()
    {
        return [
            [['language', 'theme', 'defaultpage'], 'required'],
            [['language', 'theme', 'defaultpage'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'language' => Yii::t('app', 'Language'),
            'theme' => Yii::t('app', 'Theme'),
            'defaultpage' => Yii::t('app', 'Defaultpage'),
        ];
    }
}
