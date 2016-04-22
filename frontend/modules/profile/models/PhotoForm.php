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
        return 
        [
           
          ['photo', 'required','message'=>'votre photo doit être renseigné '],
            
          ['photo', 'file', 'extensions' => ['jpg','jpeg','png'],'wrongExtension'=>'les extensions autorisés sont jpg,jpeg,png'],
        
        ];
    }
}