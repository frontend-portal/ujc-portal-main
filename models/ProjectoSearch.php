<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Projecto;

/**
 * ProjectoSearch represents the model behind the search form of `app\models\Projecto`.
 */
class ProjectoSearch extends Projecto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ficheiro', 'area'], 'integer'],
            [['titulo', 'resumo', 'data_carregamento'], 'safe'],
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
        $query = Projecto::find();

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
            'data_carregamento' => $this->data_carregamento,
            'ficheiro' => $this->ficheiro,
            'area' => $this->area,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'resumo', $this->resumo]);

        return $dataProvider;
    }
}
