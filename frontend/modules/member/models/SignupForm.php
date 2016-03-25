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
    public $email;
    public $password;
    public $password_repeat;
    public $domaine;
    public $sousDomaine;
    public $nom;
    public $prenom;
    public $sexe;
    public $dateNaiss;
    public $ville;
    


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Ce nom existe deja'],
            ['username', 'string', 'min' => 2, 'max' => 255,'tooShort'=>'il doit être au moins de 2 caractères '],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Cet email existe déjà.'],

            [['password','nom','prenom','sexe','ville','dateNaiss','domaine','sousDomaine'], 'required'],
            
            ['password','string','min'=>8,
                'tooShort' =>8,
                'tooShort' =>'ce mot de passe doit être au moins de 8 caratères',
                'skipOnError'=>false,
                'skipOnEmpty'=>false
            ],
            [['nom','prenom'], 'string','min'=>3,'max'=>20],
            
            ['ville', 'string','max'=>20,'tooLong'=>'nom de ville trop long'],
            
            ['sexe','in', 'range'=>['H', 'F']],
            
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
            $user->id_domaine = 1; //$this->domaine;
            $user->id_sous_dom = 1;// $this->sousDomaine;
            $user->sexe = $this->sexe;
            $user->date_naiss = $this->dateNaiss;
            $user->ville = $this->ville;
            
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
