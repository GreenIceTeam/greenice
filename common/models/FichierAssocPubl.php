<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fichier_assoc_publ".
 *
 * @property integer $id_fichier
 * @property integer $id_publ
 *
 * @property Publication $idPubl
 * @property Fichier $idFichier
 */
class FichierAssocPubl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fichier_assoc_publ';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_fichier', 'id_publ'], 'required'],
            [['id_fichier', 'id_publ'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_fichier' => Yii::t('app', 'Id Fichier'),
            'id_publ' => Yii::t('app', 'Id Publ'),
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
    public function getIdFichier()
    {
        return $this->hasOne(Fichier::className(), ['id_fichier' => 'id_fichier']);
    }
}
