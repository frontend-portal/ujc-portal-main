<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_curso".
 *
 * @property int $id
 * @property string $nome
 * @property int $faculdade
 * @property string $area
 * @property string $nivel
 * @property string $duracao
 *
 * @property TblFaculdade $faculdade0
 */
class Curso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_curso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nome', 'faculdade', 'area', 'nivel', 'duracao'], 'required'],
            [['id', 'faculdade'], 'integer'],
            [['nivel'], 'string'],
            [['nome'], 'string', 'max' => 255],
            [['area'], 'string', 'max' => 100],
            [['duracao'], 'string', 'max' => 20],
            [['faculdade'], 'exist', 'skipOnError' => true, 'targetClass' => Faculdade::className(), 'targetAttribute' => ['faculdade' => 'id']],
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
            'faculdade' => Yii::t('app', 'Faculdade'),
            'area' => Yii::t('app', 'Area'),
            'nivel' => Yii::t('app', 'Nivel'),
            'duracao' => Yii::t('app', 'Duracao'),
        ];
    }

    /**
     * Gets query for [[Faculdade0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFaculdade0()
    {
        return $this->hasOne(Faculdade::className(), ['id' => 'faculdade']);
    }
}
