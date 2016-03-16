<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "critique".
 *
 * @property integer $id_critique
 * @property integer $id_auteur
 * @property string $contenu
 * @property string $date
 *
 * @property User $idAuteur
 */
class Critique extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'critique';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_auteur'], 'integer'],
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
            'id_critique' => Yii::t('app', 'Id Critique'),
            'id_auteur' => Yii::t('app', 'Id Auteur'),
            'contenu' => Yii::t('app', 'Contenu'),
            'date' => Yii::t('app', 'Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAuteur()
    {
        return $this->hasOne(User::className(), ['id' => 'id_auteur']);
    }
}
