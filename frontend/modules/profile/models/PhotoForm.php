<?php

namespace  frontend\modules\profile\models;


use yii\base\Model;


/**
 * Signup form
 */
class PhotoForm extends Model
{
    public $photo;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           
          ['photo', 'required','message'=>'votre photo doit être renseigné '],
          ['photo', 'file', 'extensions' => 'jpg,jpeg,png'],
          ['photo', 'required'],
    
            
            //['ville', 'string','max'=>20,'tooLong'=>'nom de ville trop long'],
            
           //['sexe','in', 'range'=>['H', 'F']],
        ];
    }
   // public static function find(){}
}