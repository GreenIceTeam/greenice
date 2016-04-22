<?php

namespace  frontend\modules\profile\models;


use yii\base\Model;


/**
 * Signup form
 */
class ProfileForm extends Model
{
    public $photo;
    public $username;
    public $email;
    public $domaineEtude;
    public $sousDomaine;
    public $domaineActivite;
    public $nom;
    public $prenom;
    public $statutSocial;
    public $sexe;
    public $date_naiss;
    public $ville;
    

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return 
        [
           
            ['photo', 'required','message'=>'votre photo doit être renseigné '],
            
            ['photo', 'file', 'extensions' => ['jpg','jpeg','png'],'wrongExtension'=>'les extensions autorisés sont jpg,jpeg,png'],
        
            ['username', 'filter', 'filter' => 'trim'],
            
            ['username', 'required','message'=>'votre username doit être renseigné '],
            
            ['email', 'required','message'=>'votre email doit être renseigné '],
                        
            ['email', 'email','message'=>'votre email est incorrect '],
            
            ['username', 'string', 'min' => 2, 'max' => 255,'tooShort'=>'il doit être au moins de 2 caractères '],
            
            [['nom','prenom'], 'string','min'=>3,'max'=>20,'tooShort'=>'il doit être au moins de 2 caractères ','tooLong'=>'remplir au plus 20 caractères'],
            
            ['ville', 'string','max'=>20,'tooLong'=>'nom de ville trop long'],
            
        ];
    }
  
}