<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "recevoir_mess".
 *
 * @property integer $id_dest
 * @property integer $id_mess
 * @property string $affiche
 * @property string $lu
 *
 * @property Message $idMess
 * @property User $idDest
 */
class RecevoirMess extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'recevoir_mess';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_dest', 'id_mess'], 'required'],
            [['id_dest', 'id_mess'], 'integer'],
            [['affiche', 'lu'], 'string', 'max' => 3],
            [['affiche', 'lu'], 'in', 'range' => ['oui', 'non']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_dest' => Yii::t('app', 'Id Dest'),
            'id_mess' => Yii::t('app', 'Id Mess'),
            'affiche' => Yii::t('app', 'Affiche'),
            'lu' => Yii::t('app', 'Lu'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMess()
    {
        return $this->hasOne(Message::className(), ['id_mess' => 'id_mess']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDest()
    {
        return $this->hasOne(User::className(), ['id' => 'id_dest']);
    }
}
