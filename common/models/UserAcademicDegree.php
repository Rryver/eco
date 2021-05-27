<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_academic_degree".
 *
 * @property int $id
 * @property string $name_ru
 * @property string $name_en
 *
 * @property Lecture[] $lectures
 */
class UserAcademicDegree extends UserAcademic
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_academic_degree';
    }

    /**
     * {@inheritdoc}
     * @return \common\models\queries\UserAcademicDegreeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\UserAcademicDegreeQuery(get_called_class());
    }
}
