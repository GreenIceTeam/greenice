<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comm_lier_sous_dom".
 *
 * @property integer $id_sous_dom
 * @property integer $id_comm
 *
 * @property Communaute $idComm
 * @property SousDomaine $idSousDom
 */
class CommLierSousDom extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comm_lier_sous_dom';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_sous_dom', 'id_comm'], 'required'],
            [['id_sous_dom', 'id_comm'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_sous_dom' => Yii::t('app', 'Id Sous Dom'),
            'id_comm' => Yii::t('app', 'Id Comm'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdComm()
    {
        return $this->hasOne(Communaute::className(), ['id_comm' => 'id_comm']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSousDom()
    {
        return $this->hasOne(SousDomaine::className(), ['id_sous_dom' => 'id_sous_dom']);
    }
}
