<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sous_domaine".
 *
 * @property integer $id_sous_dom
 * @property integer $id_domaine
 * @property string $nom
 *
 * @property CommLierSousDom[] $commLierSousDoms
 * @property Communaute[] $idComms
 * @property Domaine $idDomaine
 * @property User[] $users
 */
class SousDomaine extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sous_domaine';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_domaine', 'nom'], 'required'],
            [['id_domaine'], 'integer'],
            [['nom'], 'string', 'max' => 255],
            ['valide', 'in', 'range' =>['oui', 'non']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_sous_dom' => Yii::t('app', 'Id Sous Dom'),
            'id_domaine' => Yii::t('app', 'Id Domaine'),
            'nom' => Yii::t('app', 'Nom'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommLierSousDoms()
    {
        return $this->hasMany(CommLierSousDom::className(), ['id_sous_dom' => 'id_sous_dom']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdComms()
    {
        return $this->hasMany(Communaute::className(), ['id_comm' => 'id_comm'])->viaTable('comm_lier_sous_dom', ['id_sous_dom' => 'id_sous_dom']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDomaine()
    {
        return $this->hasOne(Domaine::className(), ['id_domaine' => 'id_domaine']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id_sous_dom' => 'id_sous_dom']);
    }
}
