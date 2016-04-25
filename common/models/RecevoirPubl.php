<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "recevoir_publ".
 *
 * @property integer $id_user
 * @property integer $id_publ
 * @property string $affiche
 *
 * @property Publication $idPubl
 * @property User $idUser
 */
class RecevoirPubl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'recevoir_publ';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_publ'], 'required'],
            [['id_user', 'id_publ'], 'integer'],
            [['affiche'], 'string', 'max' => 3],
            ['affiche', 'in', 'range'=>['oui', 'non']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_user' => Yii::t('app', 'Id User'),
            'id_publ' => Yii::t('app', 'Id Publ'),
            'affiche' => Yii::t('app', 'Affiche'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPubl()
    {
        return $this->hasOne(Publication::className(), ['id_publ' => 'id_publ']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
