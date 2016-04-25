<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "appartenir_cercle".
 *
 * @property integer $id_user
 * @property integer $id_cercle
 *
 * @property Cercle $idCercle
 * @property User $idUser
 */
class AppartenirCercle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'appartenir_cercle';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_cercle'], 'required'],
            [['id_user', 'id_cercle'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_user' => Yii::t('app', 'Id User'),
            'id_cercle' => Yii::t('app', 'Id Cercle'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCercle()
    {
        return $this->hasOne(Cercle::className(), ['id_cercle' => 'id_cercle']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
