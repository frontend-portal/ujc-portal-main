<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_evento".
 *
 * @property int $id
 * @property string $titulo
 * @property string $data_inicio
 * @property string $data_termino
 * @property string $descricao
 * @property int $imagem
 * @property int $autor
 * @property string $data_criacao
 * @property string $data_actualizacao
 * @property string $hora_inicio
 * @property string $hora_fim
 *
 * @property User $autor0
 * @property TblFoto $imagem0
 */
class Evento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_evento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'titulo', 'data_inicio', 'data_termino', 'descricao', 'imagem', 'autor', 'data_criacao', 'data_actualizacao', 'hora_inicio', 'hora_fim'], 'required'],
            [['id', 'imagem', 'autor'], 'integer'],
            [['data_inicio', 'data_termino', 'data_criacao', 'data_actualizacao', 'hora_inicio', 'hora_fim'], 'safe'],
            [['titulo'], 'string', 'max' => 100],
            [['descricao'], 'string', 'max' => 255],
            [['autor'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['autor' => 'id']],
            [['imagem'], 'exist', 'skipOnError' => true, 'targetClass' => Foto::className(), 'targetAttribute' => ['imagem' => 'id']],
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
            'data_inicio' => Yii::t('app', 'Data Inicio'),
            'data_termino' => Yii::t('app', 'Data Termino'),
            'descricao' => Yii::t('app', 'Descricao'),
            'imagem' => Yii::t('app', 'Imagem'),
            'autor' => Yii::t('app', 'Autor'),
            'data_criacao' => Yii::t('app', 'Data Criacao'),
            'data_actualizacao' => Yii::t('app', 'Data Actualizacao'),
            'hora_inicio' => Yii::t('app', 'Hora Inicio'),
            'hora_fim' => Yii::t('app', 'Hora Fim'),
        ];
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

    /**
     * Gets query for [[Imagem0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImagem0()
    {
        return $this->hasOne(Foto::className(), ['id' => 'imagem']);
    }
}
