<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fichier_assoc_mess".
 *
 * @property integer $id_fichier
 * @property integer $id_mess
 *
 * @property Message $idMess
 * @property Fichier $idFichier
 */
class FichierAssocMess extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fichier_assoc_mess';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_fichier', 'id_mess'], 'required'],
            [['id_fichier', 'id_mess'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_fichier' => Yii::t('app', 'Id Fichier'),
            'id_mess' => Yii::t('app', 'Id Mess'),
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
    public function getIdFichier()
    {
        return $this->hasOne(Fichier::className(), ['id_fichier' => 'id_fichier']);
    }
}
