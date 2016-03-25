<?php
namespace backend\modules\admin\models;

use common\models\User;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $name;
    public $sexe;
    public $role;
    public $email;
    public $password;
    public $pwd_re;
    public $date_insc;
    

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required','message'=>'ce champ doit être rempli','skipOnError'=>false,'skipOnEmpty'=>false],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['email', 'filter', 'filter' => 'trim'],
            ['name','required','message'=>'ce champ doit être rempli','skipOnError'=>false,'skipOnEmpty'=>false],
            ['email', 'required','message'=>'ce champ doit être rempli','skipOnError'=>false,'skipOnEmpty'=>false],
            ['email', 'email'], 
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
        
/**
 *  adding the rules that verify the spelling of password and another space on my form
 */
            ['sexe','in', 'range'=>['H', 'F']],
            
            ['role','in', 'range'=>['admin', 'member']],
            
            ['role','default','value'=>'member'],
            
            ['date_insc','default','value'=>date('y-m-d H:m:s')],
            
            ['password', 'required','message'=>'ce champ doit être rempli'],
            
            ['password','string','min'=>8,
                'tooShort' =>'ce mot de passe doit être au moins de 8 caratères', 
                'skipOnError'=>false,
                'skipOnEmpty'=>false
            ],
            ['password','match','pattern'=>'/[a-z]/', 
                'message'=>'minuscule manquante', 
                'skipOnError'=>false,
                'skipOnEmpty'=>false 
            ],
            ['password','match','pattern'=>'/[A-Z]/',
                'message'=>'majuscule manquante',
                'skipOnError'=>false,
                'skipOnEmpty'=>false
            ],
            ['password','match','pattern'=>'/[0-9]/',
                'message'=>'chiffre manquant', 
                'skipOnError'=>false,
                'skipOnEmpty'=>false 
            ],
            ['password','match','pattern'=>'/[!_#$%&@?.*+]/', 
                'message'=>'caractère spécial manquant', 
                'skipOnError'=>false,
                'skipOnEmpty'=>false 
            ],
            
            ['pwd_re','required',
                'message'=>'ce champ doit être rempli',
                'skipOnError'=>false,
                'skipOnEmpty'=>false 
                ],
            
            ['pwd_re', 'compare',
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
            $user->nom = $this->name;
            $user->sexe =$this->sexe;
            $user->role =$this->role ;
            $user->email = $this->email;
            $user->date_insc=date('y-m-d H:m:s');
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }

}