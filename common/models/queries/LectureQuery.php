<?php

namespace common\models\queries;

/**
 * This is the ActiveQuery class for [[\common\models\Lecture]].
 *
 * @see \common\models\Lecture
 */
class LectureQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Lecture[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Lecture|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
