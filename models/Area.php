<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_area".
 *
 * @property int $id
 * @property string $nome
 * @property string $descricao
 *
 * @property ArtigoArea[] $artigoAreas
 * @property TblArtigo[] $artigos
 * @property TblProjecto[] $tblProjectos
 */
class Area extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_area';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'descricao'], 'required'],
            [['nome'], 'string', 'max' => 100],
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
     * Gets query for [[ArtigoAreas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArtigoAreas()
    {
        return $this->hasMany(ArtigoArea::className(), ['id_area' => 'id']);
    }

    /**
     * Gets query for [[Artigos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArtigos()
    {
        return $this->hasMany(TblArtigo::className(), ['id' => 'id_artigo'])->viaTable('artigo_area', ['id_area' => 'id']);
    }

    /**
     * Gets query for [[TblProjectos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblProjectos()
    {
        return $this->hasMany(TblProjecto::className(), ['area' => 'id']);
    }
}
