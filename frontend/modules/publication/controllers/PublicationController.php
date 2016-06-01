<?php

namespace frontend\modules\publication\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use \yii\web\UploadedFile;
use frontend\modules\publication\models\CommentForm ;
use \common\models\Commentaire;
use \common\models\AimerComment;
use \common\models\AimerPubl;
use common\models\Publication;
use common\models\RecevoirPubl;
use common\models\Communaute;
use common\models\AppartenirComm;
use \frontend\modules\publication\models\PostForm;

class PublicationController extends Controller
{
    /**$pageIndex  is thenumber of set of 1. publications already delivered. A page is a set of 1. publs
     * PUBLBYPAGE is the number of publ by page.
     *                        **/
    const  PUBLBYPAGE = 10;


    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'viewNew', 'post', 'comment', 'like', 'update', 'delete'],
                'rules' => [
                    [ 'actions' => ['index', 'view', 'viewNew', 'post', 'comment', 'like', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
            ]],
            'verbs' => ['class' => VerbFilter::className(),
	'actions' => ['logout' => ['post']],
            ], 
        ];
    }
	
    public function actionIndex()
    {
     //    $session = new yii\web\Session(); 
          
       return $this->render('index');
    }
    
    /** This action displays the publication of a given community
     ** @param integer $idComm is the community id, the publications of that community will be displayed 
     ** @param boolean $new specified whether only the new publication will be displayed or not.
    **/
    public function actionView($idComm, $new=false)
    {
       if(isset( $idComm) && !empty($idComm) && is_numeric($idComm) ){
        $pageIndex = (Yii::$app->session['publPageIndex']);
        /**  To delete after Ajax call implementation**/
        $pageIndex = 0;
        $id = \Yii::$app->user->identity->id;
       $query = new \yii\db\Query;
      
           $tab =  ($new == false) ? [] : ['affiche'=> 'non', 'nouveau'=>'oui' ];
      
        $publs = $query->select('p.id_publ id_publ,p.id_comm idComm, contenu, u2.nom nom, f.nom nom_fich, f2.nom photo_profil')
                                                                                               ->offset($pageIndex)
                                                                                                ->limit(self::PUBLBYPAGE)
                                                                                                ->from('recevoir_publ rp')
                                                                                                ->innerJoin('publication p', 'p.id_publ=rp.id_publ')
                                                                                                ->leftJoin('fichier_assoc_publ fp', 'p.id_publ = fp.id_publ')
                                                                                                ->leftJoin('fichier f', 'fp.id_fichier=f.id_fichier') 
                                                                                                 ->innerJoin('user u', 'u.id = rp.id_user')
                                                                                                 ->innerJoin('user u2', 'u2.id = p.id_auteur')
                                                                                               ->leftJoin('fichier f2', 'f2.id_user=u.id and f2.statut="photo_profil"') 
                                                                                                ->where([ 'p.id_comm'=>$idComm])
                                                                                                  ->andWhere($tab)
                                                                                                  ->orderBy('p.id_publ DESC')
                                                                                                   ->all();
        if(!empty($publs)){
            $model = new PostForm(); 
            /** Updates table recevoir_publ to menton consulted publs **/
            $connection = \Yii::$app->db; 
            foreach($publs as $publ){   
                $command = $connection->createCommand()->update('recevoir_publ', ['affiche'=>'oui'], [ 'affiche'=>'non','id_publ'=>$publ['id_publ']] )
                                                                                    ->execute();
                $command2 = $connection->createCommand()->update('recevoir_publ', ['nouveau'=>'oui'], [ 'nouveau'=>'non','id_publ'=>$publ['id_publ']] )
                                                                                    ->execute();
            }

           Yii::$app->session['publPageIndex'] = Yii::$app->session['publPageIndex'] +1;  

                //return Yii::$app->session['publPageIndex'].''.$new;

            return $this->render('publication', ['publs'=>$publs, 'model'=>$model]);
        }
        }
           return $this->render('index');
       
    }
    
    
    
      /** Check the post form submittion   and call the post method to handle it
       * @param $idComm is the id of the community where the post will be visible
       * **/ 
    public function actionPost()
    {
     $publ = new PostForm();
    
     if( $publ->load( \Yii::$app->request->post())  ){
          $publ->file =UploadedFile::getInstance($publ, 'file');
        //return $publ->idComm;
          if( $publ->validate() ){
           if( $publ->post()){
                    return  $this->actionView($publ->idComm);
                }
           }
            return ('publication');
     
     }
       
    }
     
    /** 
     * User likes a publication
     * **/
    public function actionLike($idPubl){
        if(isset( $idPubl) && !empty($idPubl) && is_numeric($idPubl) ){
            //For security issue, the following sql request verify whether the $idPubl param is a valid publication id
            $isValidPubl = (empty(Publication::find()->where(['id_publ'=>$idPubl])->scalar())) ? false: true;
            if($isValidPubl){
                $likePubl = new AimerPubl();
                $likePubl->id_publ = $idPubl;
                $likePubl->id_user = \Yii::$app->user->identity->id;
                $likePubl->save();

                $idComm = Publication::find()->select('id_comm')->where(['id_publ'=>$idPubl])->scalar();
                return $this->actionView($idComm);
            }
        }else{
            return $this->render(['index']);
        }
     }
     /**
      ** This action is called when a user comment a publication
      ** @param integer $idPubl is the publication id
      **/
     public function actionComment($idPubl=NULL){
          $comment = new CommentForm();
         //if the form is not submitted, render the view conaining the form
          if(isset( $idPubl) && !empty($idPubl) && is_numeric($idPubl)){
            //For security issue, the following sql request verify whether the $idPubl param is a valid publication id
            $isValidPubl = (empty(Publication::find()->where(['id_publ'=>$idPubl])->scalar())) ? false: true;
           if($isValidPubl){
            return $this->render('commentPubl', [
                                                                            'comment'=>$comment,
                                                                            'idPubl'=>$idPubl
                                                    ]);
           }  
           /**   
           $idComment= new AimerComment();
            $idComment->id_comment = $idPubl;
            $idComment->id_user = \Yii::$app->user->id;
            $idComment->save();
            * **/
        }else{
             
            if($comment->load(\Yii::$app->request->post())){
                $comment->file = UploadedFile::getInstance($comment, 'file');
          if( $comment->validate()){
              if($comment->comment()){     
              $idComm = Publication::find()->select('id_comm')->where(['id_publ'=>$comment->idPubl])->scalar();
                    return  $this->actionView($idComm);
              }       
                
           }
                
            }
        }
        return ('Echec commentaire');
     }
     
     
    
}
