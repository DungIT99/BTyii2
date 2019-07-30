<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Experiences;

/**
 * ExperiencesSearch represents the model behind the search form of `frontend\models\Experiences`.
 */
class ExperiencesSearch extends Experiences
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'userId'], 'integer'],
            [['start_at', 'end_at', 'namecompany', 'aboutjob'], 'safe'],
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
    public function search($id)
    {
        $query = Experiences::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($id);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
          
            'userId' => $id,
        ]);

        // $query->andFilterWhere(['like', 'start_at', $this->start_at])
        //     ->andFilterWhere(['like', 'end_at', $this->end_at])
        //     ->andFilterWhere(['like', 'namecompany', $this->namecompany])
        //     ->andFilterWhere(['like', 'aboutjob', $this->aboutjob]);

        return $dataProvider;
    }
}
