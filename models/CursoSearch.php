<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Curso;

/**
 * CursoSearch represents the model behind the search form of `app\models\Curso`.
 */
class CursoSearch extends Curso
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'faculdade'], 'integer'],
            [['nome', 'area', 'nivel', 'duracao'], 'safe'],
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
        $query = Curso::find();

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
            'faculdade' => $this->faculdade,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'area', $this->area])
            ->andFilterWhere(['like', 'nivel', $this->nivel])
            ->andFilterWhere(['like', 'duracao', $this->duracao]);

        return $dataProvider;
    }
}
