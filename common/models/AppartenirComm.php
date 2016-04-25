<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "appartenir_comm".
 *
 * @property integer $id_user
 * @property integer $id_comm
 *
 * @property Communaute $idComm
 */
class AppartenirComm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'appartenir_comm';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_comm'], 'required'],
            [['id_user', 'id_comm'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_user' => Yii::t('app', 'Id User'),
            'id_comm' => Yii::t('app', 'Id Comm'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdComm()
    {
        return $this->hasOne(Communaute::className(), ['id_comm' => 'id_comm']);
    }
}
