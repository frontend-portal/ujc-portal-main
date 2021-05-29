<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_galeria".
 *
 * @property int $id
 * @property int $autor
 * @property string $nome
 * @property string $descricao
 *
 * @property GaleriaFotos[] $galeriaFotos
 * @property TblFoto[] $fotos
 * @property User $autor0
 */
class Galeria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_galeria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['autor', 'nome', 'descricao'], 'required'],
            [['autor'], 'integer'],
            [['nome'], 'string', 'max' => 150],
            [['descricao'], 'string', 'max' => 255],
            [['autor'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['autor' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'autor' => Yii::t('app', 'Autor'),
            'nome' => Yii::t('app', 'Nome'),
            'descricao' => Yii::t('app', 'Descricao'),
        ];
    }

    /**
     * Gets query for [[GaleriaFotos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGaleriaFotos()
    {
        return $this->hasMany(GaleriaFotos::className(), ['id_galeria' => 'id']);
    }

    /**
     * Gets query for [[Fotos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFotos()
    {
        return $this->hasMany(Foto::className(), ['id' => 'id_foto'])->viaTable('galeria_fotos', ['id_galeria' => 'id']);
    }

    /**
     * Gets query for [[Autor0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutor0()
    {
        return $this->hasOne(User::className(), ['id' => 'autor']);
    }
}
