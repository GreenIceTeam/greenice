<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "commentaire".
 *
 * @property integer $id_comment
 * @property integer $id_auteur
 * @property integer $id_publ
 * @property string $contenu
 * @property string $date
 *
 * @property AimerComment[] $aimerComments
 * @property Publication $idPubl
 * @property User $idAuteur
 * @property FichierAssocComment[] $fichierAssocComments
 * @property Fichier[] $idFichiers
 */
class Commentaire extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'commentaire';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_auteur', 'id_publ'], 'integer'],
            [['contenu'], 'string'],
            [['date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_comment' => Yii::t('app', 'Id Comment'),
            'id_auteur' => Yii::t('app', 'Id Auteur'),
            'id_publ' => Yii::t('app', 'Id Publ'),
            'contenu' => Yii::t('app', 'Contenu'),
            'date' => Yii::t('app', 'Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAimerComments()
    {
        return $this->hasMany(AimerComment::className(), ['id_comment' => 'id_comment']);
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
    public function getIdAuteur()
    {
        return $this->hasOne(User::className(), ['id' => 'id_auteur']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFichierAssocComments()
    {
        return $this->hasMany(FichierAssocComment::className(), ['id_comment' => 'id_comment']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFichiers()
    {
        return $this->hasMany(Fichier::className(), ['id_fichier' => 'id_fichier'])->viaTable('fichier_assoc_comment', ['id_comment' => 'id_comment']);
    }
}
