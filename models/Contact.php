<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property integer $id
 * @property string $shortname
 * @property string $fullname
 * @property string $celphone
 * @property string $phone
 * @property string $mail
 * @property string $website
 * @property string $blog
 * @property string $facebookpage
 * @property string $twitterpage
 * @property string $googlepluspage
 * @property string $description
 * @property string $avatar
 * @property integer $category_id
 * @property integer $rating
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shortname', 'category_id', 'rating'], 'required'],
            [['shortname', 'fullname', 'celphone', 'phone', 'mail', 'website', 'blog', 'facebookpage', 'twitterpage', 'googlepluspage', 'description', 'avatar'], 'string'],
            [['category_id', 'rating'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
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
            'category_id' => Yii::t('app', 'Category ID'),
            'rating' => Yii::t('app', 'Rating'),
        ];
    }
}
