<?php

namespace frontend\modules\publication\controllers;

use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use \yii\web\UploadedFile;
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
    private $pageIndex = 0;
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
        
       return $this->actionView();
    }
    
    public function actionView()
    {
        $publs = Publication::find()->limit(self::PUBLBYPAGE)->with('recevoirPubls')->all();
       
        $model = new PostForm();
        /** Updates table recevoir_publ to menton consulted publs **/
        
        
        return $this->render('publication', ['publs'=>$publs, 'model'=>$model]);
    }
    
    public function actionViewNew()
    {
        $publs = RecevoirPubl::find()->limit(self::PUBLBYPAGE)->with('recevoirPubls')->where(['affiche'=>'non'])->all();
        /** Updates table recevoir_publ to menton consulted publs  **/
        
        
        return $this->render('publication', ['publs'=>$publs]);
    }
    
      /** Check the post form submittion   and call the post method to handle it
       * @param $idComm is the id of the community where the post will be visible
       * **/ 
    public function actionPost()
    {
        
     $publ = new PostForm();
    
     
     if( $publ->load( \Yii::$app->request->post())  ){
          $publ->file =UploadedFile::getInstance($publ, 'file');
        
          if( $publ->validate() ){
           if( $publ->post()){
               // return('bbb');  
                    return  $this->render('index');
                }
           }
            return ('publication');
     
     }
       
    }
     
    
    
    
    
    
    
}
