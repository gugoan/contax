<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

class Image extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'image';
    }

    public $file;
    public $filename;    

    public function rules()
    {
        return [
            [['contact_id', 'name'], 'required'],
            [['contact_id'], 'integer'],
            [['name'], 'string'],
            [['name'], 'safe'],
            [['file'], 'file', 'extensions'=>'jpg, png, jpeg', 'maxSize' => 1024 * 1024 * 4],            
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'contact_id' => Yii::t('app', 'Contact ID'),
            'name' => Yii::t('app', 'Name'),
            'file' => Yii::t('app', 'File'),
        ];
    }

    public function getContact()
    {
        return $this->hasOne(Contact::className(), ['id' => 'contact_id']);
    }

    public function getImageFile()
    {
        return isset($this->name) ? Yii::$app->params['uploadImage'] . $this->contact_id.'/'. $this->name : null;
    }

    public function getImageUrl()
    {
        $name = isset($this->name) ? $this->name : 'default-img.png';
        return Yii::$app->params['uploadImage'] . $this->contact_id.'/'. $name;
    }

    public function uploadImage() {

        $file = UploadedFile::getInstance($this, 'file');

        if (empty($file)) {
            return false;
        }
 
        $this->filename = $file->name;
        $ext = end((explode(".", $file->name)));

        $this->name = Yii::$app->security->generateRandomString().".{$ext}";

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

        $this->attachment = null;
        $this->filename = null;
 
        return true;
    }      
}