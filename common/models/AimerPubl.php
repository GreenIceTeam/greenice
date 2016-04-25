<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "aimer_publ".
 *
 * @property integer $id_user
 * @property integer $id_publ
 * @property string $date_aime
 *
 * @property Publication $idPubl
 * @property User $idUser
 */
class AimerPubl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aimer_publ';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_publ'], 'required'],
            [['id_user', 'id_publ'], 'integer'],
            [['date_aime'], 'safe']
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
            'date_aime' => Yii::t('app', 'Date Aime'),
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
