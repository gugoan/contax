<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

class Contact extends \yii\db\ActiveRecord
{

    public $file;
    public $filename; 

    public static function tableName()
    {
        return 'contact';
    }

    public function rules()
    {
        return [
            [['shortname', 'celphone', 'category_id', 'rating'], 'required'],
            [['shortname', 'fullname', 'celphone', 'phone', 'mail', 'website', 'blog', 'facebookpage', 'twitterpage', 'googlepluspage', 'description', 'avatar'], 'string'],
            [['category_id', 'rating','favorite'], 'integer'],
            [['avatar', 'file', 'filename'], 'safe'],
            [['file'], 'file', 'extensions'=>'jpg, png', 'maxSize' => 1024 * 1024 * 2],
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
            'favorite' => Yii::t('app', 'Favorite'),
        ];
    }

    public function getImageFile()
    {
        return isset($this->avatar) ? Yii::$app->params['uploadPath'] . $this->avatar : null;
    }
    public function getImageUrl()
    {
        $avatar = isset($this->avatar) ? $this->avatar : 'default-avatar.png';
        return Yii::$app->params['uploadUrl'] . $avatar;
    }
    public function uploadImage() {
        $file = UploadedFile::getInstance($this, 'file');
 
        if (empty($file)) {
            return false;
        }
 
        $this->filename = $file->name;
        $ext = end((explode(".", $file->name)));

        $this->avatar = Yii::$app->security->generateRandomString().".{$ext}";
 
        return $file;
    }
    public function deleteImage() {
        $file = $this->getImageFile();
 
        if (empty($file) || !file_exists($file)) {
            return false;
        }

        if (!unlink($file)) {
            return false;
        }

        $this->avatar = null;
        $this->filename = null;
 
        return true;
    }


    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getImage()
    {
        return $this->hasMany(Image::className(), ['contact_id' => 'id']);
    }
}