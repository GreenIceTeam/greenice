<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "aimer_comment".
 *
 * @property integer $id_user
 * @property integer $id_comment
 * @property string $date
 *
 * @property Commentaire $idComment
 * @property User $idUser
 */
class AimerComment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aimer_comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_comment'], 'integer'],
            [['date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_user' => Yii::t('app', 'Id User'),
            'id_comment' => Yii::t('app', 'Id Comment'),
            'date' => Yii::t('app', 'Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdComment()
    {
        return $this->hasOne(Commentaire::className(), ['id_comment' => 'id_comment']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
