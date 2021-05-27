<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Lecture;

/**
 * LectureSearch represents the model behind the search form of `common\models\Lecture`.
 */
class LectureSearch extends Lecture
{
    public $fio;
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_academic_degree_id', 'user_academic_rank_id', 'conference_id'], 'integer'],
            [['firstname', 'middlename', 'lastname', 'place_work', 'position', 'title', 'phone', 'email', 'created_at', 'fio'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Lecture::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_academic_degree_id' => $this->user_academic_degree_id,
            'user_academic_rank_id' => $this->user_academic_rank_id,
            'conference_id' => $this->conference_id,
            'created_at' => $this->created_at,
            'participation_format_id' => $this->participation_format_id,
            'section_id' => $this->section_id,
        ]);

        $query->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'middlename', $this->middlename])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'place_work', $this->place_work])
            ->andFilterWhere(['like', 'position', $this->position])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email]);
        
        $dataProvider->sort->attributes['fio'] = [
            'asc' => ['lastname' => SORT_ASC, 'firstname' => SORT_ASC, 'middlename' => SORT_ASC],
            'desc' => ['lastname' => SORT_DESC, 'firstname' => SORT_DESC, 'middlename' => SORT_DESC],
        ];
        
        $query->andFilterWhere([
            'like',
            'CONCAT_WS(" ", lastname, firstname, middlename)',
            $this->fio,
        ]);
        
        return $dataProvider;
    }
}
