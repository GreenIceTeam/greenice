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
    public $id_domaine;
    public $id_sous_dom;
    public $nom;
    public $prenom;
    public $sexe;
    public $date_naiss;
    public $ville;
    public $role;


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

            [['password','nom','prenom','sexe','ville','role','date_naiss','id_domaine','id_sous_dom'], 'required'],
            ['password', 'string', 'min' => 8],

            [['nom','prenom'], 'string','min'=>3,'max'=>20],
            
            ['ville', 'string','max'=>20],

            ['role', 'string','max'=>255],

            ['date_naiss', 'safe'],
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
            $user->id_sous_dom = $this->id_sous_dom;
            $user->sexe = $this->sexe;
            $user->date_naiss = $this->date_naiss;
            $user->ville = $this->ville;
            $user->role = $this->role;
            $user->date_insc = NOW();
            $user->last_active_time = Date();
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }
}
