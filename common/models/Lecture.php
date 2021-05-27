<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\db\BaseActiveRecord;
use yii\web\UploadedFile;
use yii\base\Model;

/**
 * This is the model class for table "lecture".
 *
 * @property int $id
 * @property string $firstname Имя
 * @property string $middlename Отчество
 * @property string $lastname Фамилия
 * @property string $country Страна
 * @property string $city Город
 * @property string $place_work Место работы
 * @property string $position Должность
 * @property int $user_academic_degree_id Ученая степень
 * @property int $user_academic_rank_id Ученое звание
 * @property string $email Адрес электронной почты
 * @property int $phone Номер телефона
 * @property int $participation_format_id Формат участия в форуме
 * @property int $conference_id
 * @property int $section_id Секция
 * @property string $title Тема доклада
 * @property string $created_at
 * @property Conference $conference
 * @property Section $section
 * @property UserAcademicDegree $userAcademicDegree
 * @property UserAcademicRank $userAcademicRank
 * @property ParticipationFormat $participationFormat
 * @property int $file_id
 * @property int $age
 */
class Lecture extends \yii\db\ActiveRecord
{
    /**
     * @var UserFiles
     */
    public $uploadFile;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lecture';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname', 'email', 'section_id', 'participation_format_id', 'age'], 'required'],
            [['conference_id', 'section_id', 'user_academic_degree_id', 'user_academic_rank_id', 'age'], 'integer'],
            [['created_at'], 'safe'],
            [['firstname', 'middlename', 'lastname', 'country', 'city'], 'string', 'max' => 64],
            [['place_work', 'position', 'title', 'email'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 32],
            ['email', 'email'],
            [['conference_id'], 'exist', 'skipOnError' => true, 'targetClass' => Conference::className(), 'targetAttribute' => ['conference_id' => 'id']],
            [['section_id'], 'exist', 'skipOnError' => true, 'targetClass' => Section::class, 'targetAttribute' => ['section_id' => 'id']],
            [['user_academic_degree_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserAcademicDegree::className(), 'targetAttribute' => ['user_academic_degree_id' => 'id']],
            [['user_academic_rank_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserAcademicRank::className(), 'targetAttribute' => ['user_academic_rank_id' => 'id']],
            //[['participation_format_id'], 'exist', 'skipOnError' => truem 'targetClass' => ],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Имя',
            'middlename' => 'Отчество',
            'lastname' => 'Фамилия',
            'country' => 'Страна',
            'city' => 'Город (населенный пункт)',
            'place_work' => 'Место работы / учебы',
            'position' => 'Должность',
            'user_academic_degree_id' => 'Ученая степень',
            'user_academic_rank_id' => 'Ученое звание',
            'email' => 'Адрес электронной почты',
            'phone' => 'Номер телефона',
            'participation_format_id' => 'Формат участия в форуме',
            'conference_id' => 'Conference ID',
            'section_id' => 'Секция',
            'title' => 'Тема выступления',
            'age' => 'Возраст, лет',
            'uploadFile' => 'Файл доклада',
            'file_id' => 'Файл доклада',
        ];
    }


    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    BaseActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
            ],
        ];
    }
    
    public function getFio()
    {
        return implode(' ', [$this->lastname, $this->firstname, $this->middlename]);
    }

    public function getCountry()
    {
        return isset($this->country) ? $this->country : "Страна не указана";
    }

    public function getCity()
    {
        return isset($this->city) ? $this->city : "Город не указан";
    }
    
    public function getDegree()
    {
        return isset($this->userAcademicDegree) ?
            $this->userAcademicDegree->name_ru : null;
    }
    
    public function getRank()
    {
        return isset($this->userAcademicRank) ?
            $this->userAcademicRank->name_ru : null;
    }

    public function getParticipationFormat()
    {
        return isset($this->participation_format_id) ?
            ParticipationFormat::getAllAsMap()[$this->participation_format_id] : null;
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConference()
    {
        return $this->hasOne(Conference::className(), ['id' => 'conference_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSection()
    {
        return $this->hasOne(Section::class, ['id' => 'section_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserAcademicDegree()
    {
        return $this->hasOne(UserAcademicDegree::className(), ['id' => 'user_academic_degree_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserAcademicRank()
    {
        return $this->hasOne(UserAcademicRank::className(), ['id' => 'user_academic_rank_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\queries\LectureQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\LectureQuery(get_called_class());
    }
}
