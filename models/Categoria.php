<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_categoria".
 *
 * @property int $id
 * @property string $nome
 * @property string $descricao
 *
 * @property ArtigoCategoria[] $artigoCategorias
 * @property TblArtigo[] $artigos
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_categoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'descricao'], 'required'],
            [['nome'], 'string', 'max' => 80],
            [['descricao'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nome' => Yii::t('app', 'Nome'),
            'descricao' => Yii::t('app', 'Descricao'),
        ];
    }

    /**
     * Gets query for [[ArtigoCategorias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArtigoCategorias()
    {
        return $this->hasMany(ArtigoCategoria::className(), ['id_categoria' => 'id']);
    }

    /**
     * Gets query for [[Artigos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArtigos()
    {
        return $this->hasMany(Artigo::className(), ['id' => 'id_artigo'])->viaTable('artigo_categoria', ['id_categoria' => 'id']);
    }
}
