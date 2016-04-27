<?php
namespace frontend\modules\publication\models;


use Yii;
use yii\base\Model;
use common\models\Fichier;
use common\models\FichierAssocComment;

class CommentForm extends Model{
    
    public $content;
    public $file;
    public $idPubl;
  
    /**
     * @inheritdoc
     */
    public function rules()
    {	
        return [
                 /**   ['content', 'required', 'when'=>  function($model){ return empty($mdel->file); },
                                                         'whenClient'=>'function(attribute, value){ return $("#comment-form").children("textarea").val() != ""; }'
                                                         ,'skipOnEmpty'=>false, 'skipOnError'=>false, 'message'=>'Choisissez un domaine'
                            
                            ],
                  * **/
                  ['content', 'required', 'message'=>'Ce champ est obligatoire'],
                    ['file', 'file'],
            ['idPubl', 'integer'],
             //       ['file', 'required', 'when'=>  function($model){ return empty($mdel->content); }]
            ];
    }
    
    public function  comment(){
        $comment = new \common\models\Commentaire();
        $comment->id_auteur = \Yii::$app->user->identity->id;
        $comment->id_publ = $this->idPubl;
        $comment->contenu = $this->content;
        $comment->date = date('y-m-d H:i:s');
        
        if($comment->save()){
        if(!empty($this->file)){
            $idFile = (Fichier::find()->select(['max(id_fichier)'])->scalar())+1;
            $file = new \common\models\Fichier();
            $file->nom = 'comment_'.date("YmdHis").'_'.$idFile.'.'.$this->file->extension;
            $file->statut ='publication';   // 'commentaire';
            $file->save();
            
            // insert in table fichier_assoc_publ
                    $commentFile = new FichierAssocComment();
                    $commentFile->id_comment = \common\models\Commentaire::find()->select(['max(id_comment)'])->scalar();
                    $commentFile->id_fichier = $idFile;
                    $commentFile->save();
                    // save the file in frontend/web/uploads 
                    $this->file->saveAs('uploads/'.$file->nom);
        }
         return $comment;       
        }
        
        return Null;
    }
    
    
}