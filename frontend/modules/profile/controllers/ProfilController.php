<?php

namespace frontend\modules\profile\controllers;

use Yii;
use common\models\User;
use yii\web\UploadedFile;
use common\models\Fichier;
use frontend\modules\profile\models\ProfileForm;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class ProfilController extends Controller
{
	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout','change','update','view-profile', 'signup', 'createAdmin'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout','change','view-profile','update', 'createAdmin'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ], 
        ];
    }
	
    public function actionIndex()
    {
        return $this->render('index');
    }
    
     public function actionUpdate($id)
    {    
        $model=new ProfileForm();
        $model->username= $this->findModel($id)->username;
        $model->email= $this->findModel($id)->email;
        $model->nom= $this->findModel($id)->nom;
        $model->prenom= $this->findModel($id)->prenom;
        $model->date_naiss= $this->findModel($id)->date_naiss;
        $model->ville= $this->findModel($id)->ville;
        $model->sexe= $this->findModel($id)->sexe;
        $model->statutSocial= $this->findModel($id)->statut_social;
        //$model->photo= (Fichier::find()->select('nom')->where(['id_user'=>$id,'statut'=>'photo_profil']));
        /*$model->sousDomaine= $this->findModel($id)->sousDomaine;
        $model->domaineEtude= $this->findModel($id)->domaineEtude;
        $model->domaine_Activite= $this->findModel($id)->domaineActivite;*/
            
        


       if ($model->load(Yii::$app->request->post()))  {
            $id=Yii::$app->getUser()->getId();
           $connection = \Yii::$app->db;
           $connection->open();
           $connection->createCommand()->update('user' , 
            [  'username' =>$model->username,
               'email'=>$model->email,
               'nom'=>$model->nom,
               'prenom'=>$model->prenom,
               'date_naiss'=>$model->date_naiss,
               'ville'=>$model->ville,
               'sexe'=>$model->sexe,
               'statut_social'=>$model->statutSocial,
                
            ],   
                   "id=$id"     ) ->execute();
           
        return $this->actionChange();


            //return $this->redirect(['view-profile']);
            
        } else {
            return $this->render('updateprofile', [
                'model' => $model,
            ]);
        }
    }
   
   
      public function actionChange()
    {
        $model = new ProfileForm();
        $idFich= (Fichier::find()->select("max(id_fichier)")->scalar())+1;
        $id=Yii::$app->getUser()->getId();
       if ($model->load(Yii::$app->request->post())) {
        $model->photo = UploadedFile::getInstance($model,'photo');
        $statut='photo_profil';
        
         if ($model->validate())
            { 
             $nomFich='Photoprofil_'.date("YmdHis").'_'.$idFich.'.'.$model->photo->extension;
            $model->photo->saveAs('uploads/'.$nomFich);
            $connection1 = \Yii::$app->db;
            $connection1->open();
            $connection1->createCommand()->update('fichier' , [
                                    'statut'=>'ancien_profil'],
                    
                   ['id_user'=>$id,'statut'=>$statut] )->execute();
            
            $connection1->createCommand()->insert('fichier' , [
                                    'id_user' =>$id,
                                    'nom'=>$nomFich,
                                    'statut'=>$statut])
                   ->execute();
             $photo='uploads/'.(Fichier::find()->select('nom')->where(['id_user'=>$id,'statut'=>'photo_profil'])->scalar());
             
            return $this->redirect(['view-profile']);
           }
       }
       return $this->render('photoupdate', [
                            'model' => $model,]);
    }
    
      public function actionViewProfile()
    {   
          $id=Yii::$app->getUser()->getId();
          $photo='uploads/'.(Fichier::find()->select('nom')->where(['id_user'=>$id,'statut'=>'photo_profil'])->scalar());
          
        return $this->render('viewprofile', [
            'model' => $this->findModel(),
            'photo'=>$photo
            ]);
    }
    
     protected function findModel()
    {
        if (($model = User::findOne(Yii::$app->getUser()->getId())) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
