<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ArtigoCategoria;

/**
 * ArtigoCategoriaSearch represents the model behind the search form of `app\models\ArtigoCategoria`.
 */
class ArtigoCategoriaSearch extends ArtigoCategoria
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_artigo', 'id_categoria'], 'integer'],
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
        $query = ArtigoCategoria::find();

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
            'id_categoria' => $this->id_categoria,
        ]);

        return $dataProvider;
    }
}
