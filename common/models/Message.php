<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "message".
 *
 * @property integer $id_mess
 * @property integer $id_source
 * @property string $contenu
 * @property string $date_env
 *
 * @property FichierAssocMess[] $fichierAssocMesses
 * @property Fichier[] $idFichiers
 * @property User $idSource
 * @property RecevoirMess[] $recevoirMesses
 * @property User[] $idDests
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_source'], 'integer'],
            [['contenu'], 'string'],
            [['date_env'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_mess' => Yii::t('app', 'Id Mess'),
            'id_source' => Yii::t('app', 'Id Source'),
            'contenu' => Yii::t('app', 'Contenu'),
            'date_env' => Yii::t('app', 'Date Env'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFichierAssocMesses()
    {
        return $this->hasMany(FichierAssocMess::className(), ['id_mess' => 'id_mess']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFichiers()
    {
        return $this->hasMany(Fichier::className(), ['id_fichier' => 'id_fichier'])->viaTable('fichier_assoc_mess', ['id_mess' => 'id_mess']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSource()
    {
        return $this->hasOne(User::className(), ['id' => 'id_source']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecevoirMesses()
    {
        return $this->hasMany(RecevoirMess::className(), ['id_mess' => 'id_mess']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDests()
    {
        return $this->hasMany(User::className(), ['id' => 'id_dest'])->viaTable('recevoir_mess', ['id_mess' => 'id_mess']);
    }
}
