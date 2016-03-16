<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "communaute".
 *
 * @property integer $id_comm
 * @property integer $id_createur
 * @property integer $id_supp
 * @property string $nom
 * @property string $type
 *
 * @property AppartenirComm[] $appartenirComms
 * @property CommLierSousDom[] $commLierSousDoms
 * @property SousDomaine[] $idSousDoms
 * @property User $idSupp
 * @property User $idCreateur
 */
class Communaute extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'communaute';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_createur', 'id_supp'], 'integer'],
            [['nom', 'type'], 'required'],
            ['type','in','range'=>['comm_dom','comm_util']],
            [['nom', 'type'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_comm' => Yii::t('app', 'Id Comm'),
            'id_createur' => Yii::t('app', 'Id Createur'),
            'id_supp' => Yii::t('app', 'Id Supp'),
            'nom' => Yii::t('app', 'Nom'),
            'type' => Yii::t('app', 'Type'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppartenirComms()
    {
        return $this->hasMany(AppartenirComm::className(), ['id_comm' => 'id_comm']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommLierSousDoms()
    {
        return $this->hasMany(CommLierSousDom::className(), ['id_comm' => 'id_comm']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSousDoms()
    {
        return $this->hasMany(SousDomaine::className(), ['id_sous_dom' => 'id_sous_dom'])->viaTable('comm_lier_sous_dom', ['id_comm' => 'id_comm']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSupp()
    {
        return $this->hasOne(User::className(), ['id' => 'id_supp']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCreateur()
    {
        return $this->hasOne(User::className(), ['id' => 'id_createur']);
    }
}
