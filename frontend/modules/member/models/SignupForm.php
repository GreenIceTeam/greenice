<?php
namespace frontend\modules\member\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $domaine;
    public $sousDomaine;
    public $nom;
    public $prenom;
    public $sexe;
    public $dateNaissance;
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
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Cet email existe déjà.'],

            [['password','nom','prenom','sexe','ville','dateNaissance','domaine','sousDomaine'], 'required'],
            ['password', 'string', 'min' => 8],

            [['nom','prenom'], 'string','min'=>3,'max'=>20],
            
            ['ville', 'string','max'=>20],
            ['sexe','in', 'range'=>['H', 'F']],

            

            ['dateNaissance', 'date','format'=>"yyyy-m-d "] 

             
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
            $user->id_domaine = $this->domaine;
            $user->id_sous_dom = $this->sousDomaine;
            $user->sexe = $this->sexe;
            $user->date_naiss = $this->dateNaissance;
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
