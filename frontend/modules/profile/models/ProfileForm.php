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
    public $date_insc;
    public $ville;
    

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return 
        [
           
            
            
            ['photo', 'file', 'extensions' => ['jpg','jpeg','png'],'wrongExtension'=>'les extensions autorisés sont jpg,jpeg,png'],
        
            ['username', 'filter', 'filter' => 'trim'],
                  
            [['username','sousDomaine'], 'required','message'=>'ce champ doit être renseigné '],
            
            ['statutSocial', 'required','message'=>'votre statut doit être renseigné '],
            
            ['domaineActivite', 'required',  'when'=>function($model){ return $model->statutSocial == 'travailleur'; },                                                       
                                                            'whenClient'=>'function(attribute, value){ return $("#labAct").parent().css("display") != "none"; }'
                                                             ,'skipOnEmpty'=>false, 'skipOnError'=>false, 'message'=>'Choisissez un domaine'
             ],
             
            ['domaineEtude', 'required',  'when'=>function($model){ return $model->statutSocial == 'etudiant'; },                                                       
                                                            'whenClient'=>'function(attribute, value){ return $("#labEtud").parent().css("display") != "none"; }'
                                                             ,'skipOnEmpty'=>false, 'skipOnError'=>false, 'message'=>'Choisissez un domaine'
             ],
            
            ['email', 'required','message'=>'votre email doit être renseigné '],
                        
            ['email', 'email','message'=>'votre email est incorrect '],
            
            ['username', 'string', 'min' => 2, 'max' => 255,'tooShort'=>'il doit être au moins de 2 caractères '],
            
            [['nom','prenom'], 'string','min'=>3,'max'=>20,'tooShort'=>'il doit être au moins de 2 caractères ','tooLong'=>'remplir au plus 20 caractères'],
            
            ['ville', 'string','max'=>20,'tooLong'=>'nom de ville trop long'],
            
        ];
    }
  
}