<?php

namespace  frontend\modules\profile\models;
use Yii;
use yii\base\Model;
use common\models\User;
use common\models\Domaine;
use common\models\SousDomaine;

/**
 * Signup form
 */
class ProfileForm extends Model
{
    public $photo;
    public $username;
    public $email;
    public $domaineActivite;
    public $domaineEtude;
    public $sousDomaine;
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
            ['sousDomaine', 'integer'],
            [['username'], 'required','message'=>'ce champ doit être renseigné '],
           // ['statutSocial', 'required','message'=>'votre statut doit être renseigné '],
            ['statutSocial', 'string'],
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
    
    
    /*
     * fonction me permettant de recupérer les informations  dans la table User
     * */
     public function findModel()
    {
        if (($model = User::findOne(Yii::$app->getUser()->getId())) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    /*
     * initialize  the properties with user's datas retrieved with findModel()
     */
    public function init(){
           $this->username= $this->findModel()->username;
            $this->email= $this->findModel()->email;
            $this->nom= $this->findModel()->nom;
            $this->prenom= $this->findModel()->prenom;
            $this->date_naiss= $this->findModel()->date_naiss;
            $this->ville= $this->findModel()->ville;
            $this->statutSocial=$this->findModel()->statut_social;
           $this->domaineEtude =Domaine::find()->select('nom')->where(['id_domaine'=>$this->findModel()->id_domaine,
                                                                                                                                      'type'=>'mixte'])->orWhere(['type'=>'etude'])->scalar();
           $this->domaineActivite =Domaine::find()->select('nom')->where(['id_domaine'=>$this->findModel()->id_domaine,
                                                                                                                                      'type'=>'travail'])->scalar();
            $this->sousDomaine=SousDomaine::find()->select('nom')->where(['id_sous_dom'=>$this->findModel()->id_sous_dom])->scalar();
                
    }
    
    
    

}