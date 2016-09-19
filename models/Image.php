<?php

namespace app\models;

use Yii;

class Image extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'image';
    }

    public function rules()
    {
        return [
            [['contact_id', 'name'], 'required'],
            [['contact_id'], 'integer'],
            [['name'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'contact_id' => Yii::t('app', 'Contact ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }
}
