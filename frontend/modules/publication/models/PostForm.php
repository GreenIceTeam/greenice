<?php
namespace frontend\modules\publication\models;

use Yii;
use yii\base\Model;
use common\models\Publication;
use common\models\RecevoirPubl;
use \common\models\Communaute;
use common\models\AppartenirComm;
use common\models\User;
use common\models\Fichier;
use common\models\FichierAssocPubl;

/**
 * PostForm is the model behind the post form.
 */
class PostForm extends Model
{
    public $content;
    public $file;
    public $idComm;
    

    /**
     * @inheritdoc
     */
    public function rules()
    {	
        return [
            ['content', 'required', 'message'=>'Ce champ est obligatoire'],
          /**  ['content', 'required', 'when'=>  function($model){ return empty($mdel->file); },
                                                         'whenClient'=>'function(attribute, value){ '
                    . 'alert(  $("#post-form").children(":file").val());'
                    . 'return $("#post-form").children(":file").val() == ""; }'
                                                         ,'skipOnEmpty'=>false, 'skipOnError'=>false, 'message'=>'Choisissez un domaine'
                            
                            ],
           **
           */
            ['file', 'file'],
            [['idComm'], 'integer']
        ];
    }
    /**
     * This function handle the post by inserting submitted datas  in the database
     * @return Null|Publication the active Record created 
     */
    
    public function post(){
        $publ = new Publication();
         
        /**  insert the new post in table 'publication' **/
        //$publ->idAuteur = Yii::$app->user->identity->id;
         
         $publ->id_comm = $this->idComm;
        $publ->contenu = $this->content;
        $publ->date_post = date("y-m-d H:i:s");
        $isValidComm = (!empty(Communaute::find()->where(['id_comm'=>$this->idComm])->scalar()) ) ;
         if($isValidComm){
            if($publ->save()){
                //handle file submittion
                 if(!empty($this->file)){
                    //  Insert file data in the database
                    $idFile = (Fichier::find()->select(['max(id_fichier)'])->scalar())+1;
                    $file = new Fichier();
                    $file->nom = 'publ_'.date("YmdHis").'_'.$idFile.'.'.$this->file->extension;
                    $file->statut = 'publication';
                    $file->save();
                    // insert in table fichier_assoc_publ
                    $publFile = new FichierAssocPubl();
                    $publFile->id_publ = Publication::find()->select(['max(id_publ)'])->scalar();
                    $publFile->id_fichier = $idFile;
                    $publFile->save();
                    // save the file in frontend/web/uploads 
                    $this->file->saveAs('uploads/'.$file->nom);
                }
                
                // That is the current publication id
                $idPubl = Publication::find()->select('id_publ')->orderBy('id_publ DESC')->scalar();
                /** Select members of the concerned community **/
                $members = AppartenirComm::find()->select(['id_user'])->where(['id_comm'=>$this->idComm])->all();

                foreach ($members as $member){
                    $recPubl = new RecevoirPubl();
                    $recPubl->id_publ = $idPubl;
                    $recPubl->id_user = $member->id_user;
                    $recPubl->nouveau = 'oui';
                    if (!$recPubl->save()){ 
                        return Null;
                    }
                }

                return $publ;
            }   
        }
        return Null;
        
    }
    
}