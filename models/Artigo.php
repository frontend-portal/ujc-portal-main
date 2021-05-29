<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_artigo".
 *
 * @property int $id
 * @property int $autor
 * @property string $titulo
 * @property string $data_publicacao
 * @property string $estado
 * @property string $data_criacao
 * @property string $data_actualizacao
 * @property int $imagem
 * @property string $acesso
 * @property string $conteudo
 * @property string $lead
 *
 * @property ArtigoArea[] $artigoAreas
 * @property TblArea[] $areas
 * @property ArtigoCategoria[] $artigoCategorias
 * @property TblCategoria[] $categorias
 * @property User $autor0
 * @property TblFoto $imagem0
 */
class Artigo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_artigo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['autor', 'titulo', 'data_publicacao', 'estado', 'data_criacao', 'data_actualizacao', 'imagem', 'acesso', 'conteudo', 'lead'], 'required'],
            [['autor', 'imagem'], 'integer'],
            [['data_publicacao', 'data_criacao', 'data_actualizacao'], 'safe'],
            [['estado', 'acesso', 'conteudo'], 'string'],
            [['titulo'], 'string', 'max' => 200],
            [['lead'], 'string', 'max' => 255],
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
            'autor' => Yii::t('app', 'Autor'),
            'titulo' => Yii::t('app', 'Titulo'),
            'data_publicacao' => Yii::t('app', 'Data Publicacao'),
            'estado' => Yii::t('app', 'Estado'),
            'data_criacao' => Yii::t('app', 'Data Criacao'),
            'data_actualizacao' => Yii::t('app', 'Data Actualizacao'),
            'imagem' => Yii::t('app', 'Imagem'),
            'acesso' => Yii::t('app', 'Acesso'),
            'conteudo' => Yii::t('app', 'Conteudo'),
            'lead' => Yii::t('app', 'Lead'),
        ];
    }

    /**
     * Gets query for [[ArtigoAreas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArtigoAreas()
    {
        return $this->hasMany(ArtigoArea::className(), ['id_artigo' => 'id']);
    }

    /**
     * Gets query for [[Areas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAreas()
    {
        return $this->hasMany(Area::className(), ['id' => 'id_area'])->viaTable('artigo_area', ['id_artigo' => 'id']);
    }

    /**
     * Gets query for [[ArtigoCategorias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArtigoCategorias()
    {
        return $this->hasMany(ArtigoCategoria::className(), ['id_artigo' => 'id']);
    }

    /**
     * Gets query for [[Categorias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategorias()
    {
        return $this->hasMany(TblCategoria::className(), ['id' => 'id_categoria'])->viaTable('artigo_categoria', ['id_artigo' => 'id']);
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
