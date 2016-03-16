<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cercle".
 *
 * @property integer $id_cercle
 * @property integer $id_createur
 * @property integer $id_supp
 * @property string $nom
 * @property string $type
 * @property string $date_creation
 *
 * @property AppartenirCercle[] $appartenirCercles
 * @property User[] $idUsers
 * @property User $idSupp
 * @property User $idCreateur
 */
class Cercle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cercle';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_createur', 'id_supp'], 'integer'],
            [['date_creation'], 'safe'],
            [['type'], 'in', 'range'=>['amis', 'famille', 'connaissance', 'collegue']],
            [['nom', 'type'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cercle' => Yii::t('app', 'Id Cercle'),
            'id_createur' => Yii::t('app', 'Id Createur'),
            'id_supp' => Yii::t('app', 'Id Supp'),
            'nom' => Yii::t('app', 'Nom'),
            'type' => Yii::t('app', 'Type'),
            'date_creation' => Yii::t('app', 'Date Creation'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppartenirCercles()
    {
        return $this->hasMany(AppartenirCercle::className(), ['id_cercle' => 'id_cercle']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'id_user'])->viaTable('appartenir_cercle', ['id_cercle' => 'id_cercle']);
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
