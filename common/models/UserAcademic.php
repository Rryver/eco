<?php

namespace common\models;

use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "user_academic_degree".
 *
 * @property int $id
 * @property string $name_ru
 * @property string $name_en
 *
 * @property Lecture[] $lectures
 */
class UserAcademic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_ru', 'name_en'], 'required'],
            [['name_ru', 'name_en'], 'string', 'max' => 255],
            [['name_ru'], 'unique'],
            [['name_en'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_ru' => 'Name Ru',
            'name_en' => 'Name En',
        ];
    }
    
    public static function getAllAsMap()
    {
        return ArrayHelper::merge(
            ['' => ''],
            ArrayHelper::map(
                self::find()->all(),
                'id',
                'name_ru'
            )
        );
    }
}
