<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_faculdade".
 *
 * @property int $id
 * @property string $nome
 * @property string $sigla
 * @property int $director
 * @property string $endereco
 * @property string $area
 *
 * @property TblCurso[] $tblCursos
 * @property User $director0
 */
class Faculdade extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_faculdade';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'sigla', 'director', 'endereco', 'area'], 'required'],
            [['director'], 'integer'],
            [['nome', 'endereco'], 'string', 'max' => 255],
            [['sigla'], 'string', 'max' => 10],
            [['area'], 'string', 'max' => 100],
            [['director'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['director' => 'id']],
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
            'sigla' => Yii::t('app', 'Sigla'),
            'director' => Yii::t('app', 'Director'),
            'endereco' => Yii::t('app', 'Endereco'),
            'area' => Yii::t('app', 'Area'),
        ];
    }

    /**
     * Gets query for [[TblCursos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblCursos()
    {
        return $this->hasMany(TblCurso::className(), ['faculdade' => 'id']);
    }

    /**
     * Gets query for [[Director0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDirector0()
    {
        return $this->hasOne(User::className(), ['id' => 'director']);
    }
}
