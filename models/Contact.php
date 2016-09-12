<?php

namespace app\models;

use Yii;

class Contact extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'contact';
    }

    public function rules()
    {
        return [
            [['shortname', 'category_id', 'rating'], 'required'],
            [['shortname', 'fullname', 'celphone', 'phone', 'mail', 'website', 'blog', 'facebookpage', 'twitterpage', 'googlepluspage', 'description', 'avatar'], 'string'],
            [['category_id', 'rating'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'shortname' => Yii::t('app', 'Shortname'),
            'fullname' => Yii::t('app', 'Fullname'),
            'celphone' => Yii::t('app', 'Celphone'),
            'phone' => Yii::t('app', 'Phone'),
            'mail' => Yii::t('app', 'Mail'),
            'website' => Yii::t('app', 'Website'),
            'blog' => Yii::t('app', 'Blog'),
            'facebookpage' => Yii::t('app', 'Facebookpage'),
            'twitterpage' => Yii::t('app', 'Twitterpage'),
            'googlepluspage' => Yii::t('app', 'Googlepluspage'),
            'description' => Yii::t('app', 'Description'),
            'avatar' => Yii::t('app', 'Avatar'),
            'category_id' => Yii::t('app', 'Category'),
            'rating' => Yii::t('app', 'Rating'),
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }    
}