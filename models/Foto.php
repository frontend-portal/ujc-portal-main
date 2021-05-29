<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_foto".
 *
 * @property int $id
 * @property string $nome
 *
 * @property GaleriaFotos[] $galeriaFotos
 * @property TblGaleria[] $galerias
 * @property TblArtigo[] $tblArtigos
 * @property TblEvento[] $tblEventos
 */
class Foto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_foto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 50],
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
        ];
    }

    /**
     * Gets query for [[GaleriaFotos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGaleriaFotos()
    {
        return $this->hasMany(GaleriaFotos::className(), ['id_foto' => 'id']);
    }

    /**
     * Gets query for [[Galerias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGalerias()
    {
        return $this->hasMany(Galeria::className(), ['id' => 'id_galeria'])->viaTable('galeria_fotos', ['id_foto' => 'id']);
    }

    /**
     * Gets query for [[TblArtigos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblArtigos()
    {
        return $this->hasMany(Artigo::className(), ['imagem' => 'id']);
    }

    /**
     * Gets query for [[TblEventos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblEventos()
    {
        return $this->hasMany(Evento::className(), ['imagem' => 'id']);
    }
}
