<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%list_contacts}}".
 *
 * @property integer $id_list
 * @property integer $id_createur
 * @property integer $id_supp
 * @property string $nom
 * @property string $type
 * @property string $date_creation
 *
 * @property AppartenirListContacts[] $appartenirListContacts
 * @property User[] $idUsers
 * @property User $idSupp
 * @property User $idCreateur
 */
class ListContacts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%list_contacts}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_createur', 'id_supp'], 'integer'],
            [['date_creation'], 'safe'],
            [['nom', 'type'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_list' => Yii::t('app', 'Id List'),
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
    public function getAppartenirListContacts()
    {
        return $this->hasMany(AppartenirListContacts::className(), ['id_list' => 'id_list']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'id_user'])->viaTable('{{%appartenir_list_contacts}}', ['id_list' => 'id_list']);
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

    /**
     * @inheritdoc
     * @return ListContactsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ListContactsQuery(get_called_class());
    }
}
