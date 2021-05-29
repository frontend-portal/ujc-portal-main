<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "galeria_fotos".
 *
 * @property int $id_galeria
 * @property int $id_foto
 *
 * @property TblFoto $foto
 * @property TblGaleria $galeria
 */
class GaleriaFotos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'galeria_fotos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_galeria', 'id_foto'], 'required'],
            [['id_galeria', 'id_foto'], 'integer'],
            [['id_galeria', 'id_foto'], 'unique', 'targetAttribute' => ['id_galeria', 'id_foto']],
            [['id_foto'], 'exist', 'skipOnError' => true, 'targetClass' => Foto::className(), 'targetAttribute' => ['id_foto' => 'id']],
            [['id_galeria'], 'exist', 'skipOnError' => true, 'targetClass' => Galeria::className(), 'targetAttribute' => ['id_galeria' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_galeria' => Yii::t('app', 'Id Galeria'),
            'id_foto' => Yii::t('app', 'Id Foto'),
        ];
    }

    /**
     * Gets query for [[Foto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFoto()
    {
        return $this->hasOne(Foto::className(), ['id' => 'id_foto']);
    }

    /**
     * Gets query for [[Galeria]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGaleria()
    {
        return $this->hasOne(Galeria::className(), ['id' => 'id_galeria']);
    }
}
