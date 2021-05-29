<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_unidade_organica".
 *
 * @property int $id
 * @property string $nome
 * @property int $chefe
 *
 * @property User $chefe0
 */
class UnidadeOrganica extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_unidade_organica';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'chefe'], 'required'],
            [['chefe'], 'integer'],
            [['nome'], 'string', 'max' => 255],
            [['chefe'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['chefe' => 'id']],
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
            'chefe' => Yii::t('app', 'Chefe'),
        ];
    }

    /**
     * Gets query for [[Chefe0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChefe()
    {
        return $this->hasOne(User::className(), ['id' => 'chefe']);
    }
}
