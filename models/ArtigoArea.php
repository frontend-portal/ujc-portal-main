<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "artigo_area".
 *
 * @property int $id_artigo
 * @property int $id_area
 *
 * @property Area $area
 * @property Artigo $artigo
 */
class ArtigoArea extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'artigo_area';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_artigo', 'id_area'], 'required'],
            [['id_artigo', 'id_area'], 'integer'],
            [['id_artigo', 'id_area'], 'unique', 'targetAttribute' => ['id_artigo', 'id_area']],
            [['id_area'], 'exist', 'skipOnError' => true, 'targetClass' => Area::className(), 'targetAttribute' => ['id_area' => 'id']],
            [['id_artigo'], 'exist', 'skipOnError' => true, 'targetClass' => Artigo::className(), 'targetAttribute' => ['id_artigo' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_artigo' => Yii::t('app', 'Id Artigo'),
            'id_area' => Yii::t('app', 'Id Area'),
        ];
    }

    /**
     * Gets query for [[Area]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArea()
    {
        return $this->hasOne(Area::className(), ['id' => 'id_area']);
    }

    /**
     * Gets query for [[Artigo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArtigo()
    {
        return $this->hasOne(Artigo::className(), ['id' => 'id_artigo']);
    }
}
