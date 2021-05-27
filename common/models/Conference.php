<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "conference".
 *
 * @property int $id
 * @property string $name
 * @property int $registration_deadline
 * @property string $created_at
 *
 * @property Lecture[] $lectures
 * @property Section[] $sections
 */
class Conference extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'conference';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['created_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'created_at' => 'Created At',
        ];
    }
    
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    
    public function registrationIsClosed()
    {
        return time() >= $this->registration_deadline;
    }
    
    public static function getAllAsMap()
    {
        return ArrayHelper::map(
            self::find()->all(),
            'id',
            'name'
        );
    }
    
    public static function getLastConference()
    {
        return self::find()
            ->orderBy(['id' => SORT_DESC])
            ->one();
    }

    public static function getConferenceByName($name)
    {
        return self::find()
            ->where(['name' => $name])
            ->one();
    }

    public static function getConferenceById($id) {
        return self::find()
            ->where(['id' => $id])
            ->one();
    }

    /**
     * @return array
     */
    public function getSectionsMap()
    {
        return ArrayHelper::map($this->sections, 'id', 'title');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLectures()
    {
        return $this->hasMany(Lecture::className(), ['conference_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSections()
    {
        return $this->hasMany(Section::class, ['conference_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\queries\ConferenceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\ConferenceQuery(get_called_class());
    }
}
