<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_projecto".
 *
 * @property int $id
 * @property string $titulo
 * @property string $resumo
 * @property string $data_carregamento
 * @property int $ficheiro
 * @property int $area
 *
 * @property TblDocumento $ficheiro0
 * @property TblArea $area0
 */
class Projecto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_projecto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'resumo', 'data_carregamento', 'ficheiro', 'area'], 'required'],
            [['resumo'], 'string'],
            [['data_carregamento'], 'safe'],
            [['ficheiro', 'area'], 'integer'],
            [['titulo'], 'string', 'max' => 255],
            [['ficheiro'], 'exist', 'skipOnError' => true, 'targetClass' => Documento::className(), 'targetAttribute' => ['ficheiro' => 'id']],
            [['area'], 'exist', 'skipOnError' => true, 'targetClass' => Area::className(), 'targetAttribute' => ['area' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'titulo' => Yii::t('app', 'Titulo'),
            'resumo' => Yii::t('app', 'Resumo'),
            'data_carregamento' => Yii::t('app', 'Data Carregamento'),
            'ficheiro' => Yii::t('app', 'Ficheiro'),
            'area' => Yii::t('app', 'Area'),
        ];
    }

    /**
     * Gets query for [[Ficheiro0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFicheiro()
    {
        return $this->hasOne(Documento::className(), ['id' => 'ficheiro']);
    }

    /**
     * Gets query for [[Area0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArea()
    {
        return $this->hasOne(Area::className(), ['id' => 'area']);
    }
}
