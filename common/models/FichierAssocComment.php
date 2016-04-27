<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fichier_assoc_comment".
 *
 * @property integer $id_fichier
 * @property integer $id_comment
 *
 * @property Commentaire $idComment
 * @property Fichier $idFichier
 */
class FichierAssocComment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fichier_assoc_comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_fichier', 'id_comment'], 'required'],
            [['id_fichier', 'id_comment'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_fichier' => Yii::t('app', 'Id Fichier'),
            'id_comment' => Yii::t('app', 'Id Comment'),
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
    public function getIdFichier()
    {
        return $this->hasOne(Fichier::className(), ['id_fichier' => 'id_fichier']);
    }
}
