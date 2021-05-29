<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "artigo_categoria".
 *
 * @property int $id_artigo
 * @property int $id_categoria
 *
 * @property TblArtigo $artigo
 * @property TblCategoria $categoria
 */
class ArtigoCategoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'artigo_categoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_artigo', 'id_categoria'], 'required'],
            [['id_artigo', 'id_categoria'], 'integer'],
            [['id_artigo', 'id_categoria'], 'unique', 'targetAttribute' => ['id_artigo', 'id_categoria']],
            [['id_artigo'], 'exist', 'skipOnError' => true, 'targetClass' => Artigo::className(), 'targetAttribute' => ['id_artigo' => 'id']],
            [['id_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['id_categoria' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_artigo' => Yii::t('app', 'Id Artigo'),
            'id_categoria' => Yii::t('app', 'Id Categoria'),
        ];
    }

    /**
     * Gets query for [[Artigo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArtigo()
    {
        return $this->hasOne(Artigo::className(), ['id' => 'id_artigo']);
    }

    /**
     * Gets query for [[Categoria]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'id_categoria']);
    }
}
