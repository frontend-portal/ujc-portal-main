<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ArtigoArea;

/**
 * ArtigoAreaSearch represents the model behind the search form of `app\models\ArtigoArea`.
 */
class ArtigoAreaSearch extends ArtigoArea
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_artigo', 'id_area'], 'integer'],
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
        $query = ArtigoArea::find();

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
            'id_artigo' => $this->id_artigo,
            'id_area' => $this->id_area,
        ]);

        return $dataProvider;
    }
}
