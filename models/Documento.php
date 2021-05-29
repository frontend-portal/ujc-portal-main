<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_documento".
 *
 * @property int $id
 * @property int $nome
 * @property string $tipo
 *
 * @property TblProjecto[] $tblProjectos
 */
class Documento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_documento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'tipo'], 'required'],
            [['nome'], 'integer'],
            [['tipo'], 'string'],
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
            'tipo' => Yii::t('app', 'Tipo'),
        ];
    }

    /**
     * Gets query for [[TblProjectos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblProjectos()
    {
        return $this->hasMany(Projecto::className(), ['ficheiro' => 'id']);
    }
}
