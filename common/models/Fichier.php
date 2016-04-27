<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fichier".
 *
 * @property integer $id_fichier
 * @property integer $id_user
 * @property string $nom
 * @property string $statut
 *
 * @property User $idUser
 * @property FichierAssocComment[] $fichierAssocComments
 * @property Commentaire[] $idComments
 * @property FichierAssocMess[] $fichierAssocMesses
 * @property Message[] $idMesses
 * @property FichierAssocPubl[] $fichierAssocPubls
 * @property Publication[] $idPubls
 */
class Fichier extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fichier';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user'], 'integer'],
            [['nom'], 'string', 'max' => 255],
            [['statut'], 'string', 'max' => 20],
            [['statut'], 'in', 'range' => ['photo_profil', 'publication', 'message', 'comment','ancien_profil']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_fichier' => Yii::t('app', 'Id Fichier'),
            'id_user' => Yii::t('app', 'Id User'),
            'nom' => Yii::t('app', 'Nom'),
            'statut' => Yii::t('app', 'Statut'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFichierAssocComments()
    {
        return $this->hasMany(FichierAssocComment::className(), ['id_fichier' => 'id_fichier']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdComments()
    {
        return $this->hasMany(Commentaire::className(), ['id_comment' => 'id_comment'])->viaTable('fichier_assoc_comment', ['id_fichier' => 'id_fichier']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFichierAssocMesses()
    {
        return $this->hasMany(FichierAssocMess::className(), ['id_fichier' => 'id_fichier']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMesses()
    {
        return $this->hasMany(Message::className(), ['id_mess' => 'id_mess'])->viaTable('fichier_assoc_mess', ['id_fichier' => 'id_fichier']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFichierAssocPubls()
    {
        return $this->hasMany(FichierAssocPubl::className(), ['id_fichier' => 'id_fichier']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPubls()
    {
        return $this->hasMany(Publication::className(), ['id_publ' => 'id_publ'])->viaTable('fichier_assoc_publ', ['id_fichier' => 'id_fichier']);
    }
}
