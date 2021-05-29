<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Artigo;

/**
 * ArtigoSearch represents the model behind the search form of `app\models\Artigo`.
 */
class ArtigoSearch extends Artigo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'autor', 'imagem'], 'integer'],
            [['titulo', 'data_publicacao', 'estado', 'data_criacao', 'data_actualizacao', 'acesso', 'conteudo', 'lead'], 'safe'],
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
        $query = Artigo::find();

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
            'autor' => $this->autor,
            'data_publicacao' => $this->data_publicacao,
            'data_criacao' => $this->data_criacao,
            'data_actualizacao' => $this->data_actualizacao,
            'imagem' => $this->imagem,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'acesso', $this->acesso])
            ->andFilterWhere(['like', 'conteudo', $this->conteudo])
            ->andFilterWhere(['like', 'lead', $this->lead]);

        return $dataProvider;
    }
}
