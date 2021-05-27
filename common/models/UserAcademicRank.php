<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_academic_rank".
 *
 * @property int $id
 * @property string $name_ru
 * @property string $name_en
 *
 * @property Lecture[] $lectures
 */
class UserAcademicRank extends UserAcademic
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_academic_rank';
    }

    /**
     * {@inheritdoc}
     * @return \common\models\queries\UserAcademicRankQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\UserAcademicRankQuery(get_called_class());
    }
}
