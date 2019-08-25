<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Product;

class ProductSearch extends Product
{
    public $pro;

    public function rules()
    {
        return [
            [['id', 'category_id'], 'integer'],
            [['name','pro', 'price'], 'safe'],
        ];
    }

    public function scenarios()
    {
  
        return Model::scenarios();
    }

    
    public function search($params)
    {
        $query = Product::find();


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->orFilterWhere(['like', 'name', $this->pro])
            ->orFilterWhere(['like', 'price', $this->pro]);
        return $dataProvider;
    }
}
