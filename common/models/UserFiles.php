<?php
namespace common\models;

use yii\db\ActiveRecord;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * This is the model class for table "user_files".
 *
 * @property int $id
 * @property string $name
 */
class UserFiles extends ActiveRecord
{
    public $file;

    public static function tableName()
    {
        return "user_files";
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    //TODO Написать validate
    public function upload()
    {
        $this->file->saveAs('frontend/web/uploads/' . $this->file->baseName . '.' . $this->file->extension);
    }


//    public function searchfile()
//    {
//
//    }

    public function getNameByID()
    {

    }

    public function downloadAllFiles()
    {

    }

    public function downloadOneFile()
    {

    }
}