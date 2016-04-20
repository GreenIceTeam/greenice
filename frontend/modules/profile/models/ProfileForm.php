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
   // public $password;
   // public $password_repeat;
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
        return [
           
           ['photo', 'required'],
           ['photo', 'file', 'extensions' => 'jpg,jpeg,png'],

            ['username', 'filter', 'filter' => 'trim'],
            //['username', 'required'],
            //['photo', 'required'],
           // ['email', 'required'],
            ['email', 'unique'],
            ['email', 'email'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Ce nom existe deja'],
            ['username', 'string', 'min' => 2, 'max' => 255,'tooShort'=>'il doit être au moins de 2 caractères '],
            [['nom','prenom'], 'string','min'=>3,'max'=>20],
            
            ['ville', 'string','max'=>20,'tooLong'=>'nom de ville trop long'],
            
           //['sexe','in', 'range'=>['H', 'F']],
        ];
    }
}