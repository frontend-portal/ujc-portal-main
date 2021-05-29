<?php

namespace app\modules\auth\models;

use Yii;

/**
 * This is the model class for table "auth_assignment".
 *
 * @property string $item_name
 * @property string $user_id
 * @property integer $created_at
 */
class AuthAssignment extends \yii\db\ActiveRecord
{
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auth_assignment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
		$user = Yii::$app->user->identityClass;
        return [
            [['item_name'], 'required'],
            //[['created_at'], 'secure'],
            [['item_name', ], 'string', 'max' => 64],
            [['user_id',],'integer'],
            [['user_id'], 'unique', 'targetAttribute'=>['user_id'], 'message'=>'O utilizador ja possui perfil'],
            [['item_name'], 'exist', 'skipOnError' => true, 'targetClass' => AuthItem::className(), 'targetAttribute' => ['item_name' => 'name']],
			[['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => $user::className(), 'targetAttribute' => ['user_id' => 'id_funcionario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'item_name' => Yii::t('app', 'Perfil'),
            'user_id' => Yii::t('app', 'Utilizador'),
            'created_at' => Yii::t('app', 'Criado em'),
        ];
    }
	
	public function getUserIdUser() {
		$user = Yii::$app->user->identityClass;
        return $this->hasOne($user::className(), ['id_funcionario' => 'user_id']);
    }
	
	public function getRole() {
		$user = Yii::$app->user->identityClass;
        return $this->hasOne($user::className(), ['id' => 'user_id']);
    }
}
