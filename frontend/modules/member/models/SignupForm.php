<?php
namespace frontend\modules\member\models;

use common\models\User;
use yii\base\Model;


/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $etudiant;
    public $statutSocial;
    public $domaineEtude;
    public $domaineActivite;
    public $email;
    public $password;
    public $sousDomaine;
    public $nom;
    public $prenom;
    public $sexe;
    //public $dateNaiss;
    public $ville;
    public $password_repeat;



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            
            [['username', 'email', 'password','nom','prenom','sexe','ville', 'statutSocial'], 'required', 'message'=>'Ce champ est obligatoire'],
            
            ['domaineActivite', 'required',  'when'=>function($model){ return $model->statutSocial == 'travailleur'; },                                                       
                                                            'whenClient'=>'function(attribute, value){ return $("#labAct").parent().css("display") != "none"; }'
                                                             ,'skipOnEmpty'=>false, 'skipOnError'=>false, 'message'=>'Choisissez un domaine'
             ],
             
              ['domaineEtude', 'required',  'when'=>function($model){ return $model->statutSocial == 'etudiant'; },                                                       
                                                            'whenClient'=>'function(attribute, value){ return $("#labEtud").parent().css("display") != "none"; }'
                                                             ,'skipOnEmpty'=>false, 'skipOnError'=>false, 'message'=>'Choisissez un domaine'
             ],
                      
              ['sousDomaine', 'required',  'when'=>function($model){ return $model->domaineActivite != '' ||  $model->domaineEtude != ''; },                                                       
                                                            'whenClient'=>'function(attribute, value){ return $("#labSousDom").parent().css("display") != "none"; }'
                                                             ,'skipOnEmpty'=>false, 'skipOnError'=>false, 'message'=>'Choisissez un sous-domaine'
             ],
              
             
                                                                         
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Ce nom est  déjà pris'],
            ['username', 'string', 'min' => 2, 'max' => 255, 'tooLong'=>'Ce champ ne doit pas dépasser 255 caractère', 'tooShort'=>'Ce champ doit dépasser 2 caractères'],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'email', 'message'=>'email non valide'],
            ['email', 'string', 'max' => 255, 'tooLong'=>'trop long'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Cet email existe déjà.'],

           
            ['password', 'string', 'min' => 8, 'message'=>'le mot de passe doit dépasser 8 caractères'],

            [['nom','prenom'], 'string','min'=>3,'max'=>20, 'tooShort'=>'Ce champ doit dépasser 3 caractères', 'tooShort'=>'Ce champ doit dépasser 3 caractères'],
            
            ['ville', 'string','max'=>20, 'message'=>'Ce champ ne doit pas dépasser 20 caractères'],
            ['sexe','in', 'range'=>['H', 'F']],

//            ['dateNaiss', 'date','format'=>"yyyy-m-d "] 
            

            
            ['password_repeat', 'compare',
                'compareAttribute'=>'password',
                'message'=>'le mot de passe doit être identique'
            ],
            
     ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->nom = $this->nom;
            $user->prenom = $this->prenom;
            $user->email = $this->email;
            $user->id_domaine = empty($this->domaineEtude) ? $this->domaineActivite : $this->domaineEtude;
            $user->id_sous_dom = $this->sousDomaine;
            $user->sexe = $this->sexe;
           // $user->date_naiss = $this->dateNaiss;
            $user->ville = $this->ville;
            $user->statut_social = $this->statutSocial;
			
            
            $user->last_active_time = date('y-m-d H:m:s');
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }
}
