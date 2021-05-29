<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property AuthAssignment[] $authAssignments
 * @property AuthItem[] $itemNames
 * @property TblArtigo[] $tblArtigos
 * @property TblEvento[] $tblEventos
 * @property TblFaculdade[] $tblFaculdades
 * @property TblGaleria[] $tblGalerias
 * @property TblUnidadeOrganica[] $tblUnidadeOrganicas
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'email' => Yii::t('app', 'Email'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[AuthAssignments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthAssignments()
    {
        return $this->hasMany(AuthAssignment::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[ItemNames]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemNames()
    {
        return $this->hasMany(AuthItem::className(), ['name' => 'item_name'])->viaTable('auth_assignment', ['user_id' => 'id']);
    }

    /**
     * Gets query for [[TblArtigos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblArtigos()
    {
        return $this->hasMany(TblArtigo::className(), ['autor' => 'id']);
    }

    /**
     * Gets query for [[TblEventos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblEventos()
    {
        return $this->hasMany(TblEvento::className(), ['autor' => 'id']);
    }

    /**
     * Gets query for [[TblFaculdades]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblFaculdades()
    {
        return $this->hasMany(TblFaculdade::className(), ['director' => 'id']);
    }

    /**
     * Gets query for [[TblGalerias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblGalerias()
    {
        return $this->hasMany(TblGaleria::className(), ['autor' => 'id']);
    }

    /**
     * Gets query for [[TblUnidadeOrganicas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblUnidadeOrganicas()
    {
        return $this->hasMany(TblUnidadeOrganica::className(), ['chefe' => 'id']);
    }
}
