<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "domaine".
 *
 * @property integer $id_domaine
 * @property string $nom
 *
 * @property SousDomaine[] $sousDomaines
 * @property User[] $users
 */
class Domaine extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'domaine';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nom'], 'required'],
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
            'id_domaine' => Yii::t('app', 'Id Domaine'),
            'nom' => Yii::t('app', 'Nom'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSousDomaines()
    {
        return $this->hasMany(SousDomaine::className(), ['id_domaine' => 'id_domaine']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id_domaine' => 'id_domaine']);
    }

   
}
