<?php


namespace common\models;


use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "participation_format".
 *
 * @property int $id
 * @property string $name_ru
 * @property string $name_en
 */

class ParticipationFormat extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'participation_format';
    }

    public function rules()
    {
        return [
            [['name_ru', 'name_en'], 'required'],
            [['name_ru', 'name_en'], 'string', 'max' => 255],
            [['name_ru'], 'unique'],
            [['name_en'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_ru' => 'Название формата на русском',
            'name_en' => 'Название формата на английском',
        ];
    }

    public static function getAllAsMap()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'name_ru');
    }
}