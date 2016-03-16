<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "publication".
 *
 * @property integer $id_publ
 * @property integer $id_auteur
 * @property string $contenu
 * @property string $type
 * @property string $date_post
 *
 * @property AimerPubl[] $aimerPubls
 * @property User[] $idUsers
 * @property Commentaire[] $commentaires
 * @property FichierAssocPubl[] $fichierAssocPubls
 * @property Fichier[] $idFichiers
 * @property User $idAuteur
 * @property RecevoirPubl[] $recevoirPubls
 * @property User[] $idUsers0
 */
class Publication extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'publication';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_auteur'], 'integer'],
            [['contenu'], 'string'],
            [['date_post'], 'safe'],
            [['type'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_publ' => Yii::t('app', 'Id Publ'),
            'id_auteur' => Yii::t('app', 'Id Auteur'),
            'contenu' => Yii::t('app', 'Contenu'),
            'type' => Yii::t('app', 'Type'),
            'date_post' => Yii::t('app', 'Date Post'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAimerPubls()
    {
        return $this->hasMany(AimerPubl::className(), ['id_publ' => 'id_publ']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'id_user'])->viaTable('aimer_publ', ['id_publ' => 'id_publ']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommentaires()
    {
        return $this->hasMany(Commentaire::className(), ['id_publ' => 'id_publ']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFichierAssocPubls()
    {
        return $this->hasMany(FichierAssocPubl::className(), ['id_publ' => 'id_publ']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFichiers()
    {
        return $this->hasMany(Fichier::className(), ['id_fichier' => 'id_fichier'])->viaTable('fichier_assoc_publ', ['id_publ' => 'id_publ']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAuteur()
    {
        return $this->hasOne(User::className(), ['id' => 'id_auteur']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecevoirPubls()
    {
        return $this->hasMany(RecevoirPubl::className(), ['id_publ' => 'id_publ']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsers0()
    {
        return $this->hasMany(User::className(), ['id' => 'id_user'])->viaTable('recevoir_publ', ['id_publ' => 'id_publ']);
    }
}
