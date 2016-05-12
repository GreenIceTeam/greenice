<?php

namespace frontend\modules\profile\controllers;

use Yii;
use yii\web\UploadedFile;
use common\models\User;
use common\models\Fichier;
use common\models\Domaine;
use common\models\SousDomaine;
use frontend\modules\profile\models\ProfileForm;
use frontend\modules\profile\models\PhotoForm;
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
                'only' => ['index', 'update',  'updatePicture','view'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['index', 'update',  'updatePicture','view'],
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
    
 /** Updates the user's profile informations **/
    public function actionUpdate()
    {    
            $model=new ProfileForm();
           $model->init();

/*  don du nom de fichier au fichier qu'on ajoute(modification du fichier chargé) **/
 
            $idFich= (Fichier::find()->select("max(id_fichier)")->scalar())+1;
            $statut='photo_profil';

        if(Yii::$app->request->isPost)
        {
            if ($model->load(Yii::$app->request->post())) 
            {
                    $model->photo = UploadedFile::getInstance($model,'photo');
                if ($model->validate())
                {
            /* * it's validate  and save the name file in uploads **/
                    if(!empty($model->photo)) 
                    {      
                            $nomFich='Photoprofil_'.date("YmdHis").'_'.$idFich.'.'.$model->photo->extension;
                            $model->photo->saveAs('uploads/'.$nomFich);

                             $id=Yii::$app->getUser()->getId();
                             $connection = \Yii::$app->db;
                             $connection->open();

                            $connection->createCommand()->update('fichier' , [ 'statut'=>'ancien_profil'],
                                                                                                    ['id_user'=>$id,'statut'=>$statut] )->execute();

                            $connection->createCommand()->insert('fichier' , [ 'id_user' =>$id, 'nom'=>$nomFich,'statut'=>$statut])
                                                                                  ->execute();
                    }
                    
                    $id=Yii::$app->getUser()->getId();
                    $connection = \Yii::$app->db;
                    $connection->open();
    
              /**  update dans la table  user;fichier et l'insertion d'une nouvelle photo de photo_profil **/
 
                    $connection->createCommand()->update('user' , ['username' =>$model->username,'email'=>$model->email,
                        'nom'=>$model->nom,
                        'prenom'=>$model->prenom,
                        'ville'=>$model->ville,
                        'date_naiss'=>$model->date_naiss,
                        'ville'=>$model->ville,
                        'statut_social'=>$model->statutSocial,
                        'id_domaine'=> empty($model->domaineEtude)?$model->domaineActivite: $model->domaineEtude,
	     'id_sous_dom'=> $model->sousDomaine ],"id=$id")
                         ->execute();
    
                        return $this->redirect(['view']);
                }
            } 
        }else {
            return $this->render('updateprofile', [ 'model' => $model]);
        }
    }
    
    public function actionUpdatePicture()
    {
        $model = new PhotoForm();
        
/*don du nom de fichier
 * 
 */
        $idFich= (Fichier::find()->select("max(id_fichier)")->scalar())+1;
        $id=Yii::$app->getUser()->getId();
       if ($model->load(Yii::$app->request->post())) {
           
        $model->photo = UploadedFile::getInstance($model,'photo');
        $statut='photo_profil';
        
         if ($model->validate())
            { 
/* *don du nom au fichier image telecharge et save son nom dans uploads */

            $nomFich='Photoprofil_'.date("YmdHis").'_'.$idFich.'.'.$model->photo->extension;
            $model->photo->saveAs('uploads/'.$nomFich);
            
/*creation et ouverture d'une connexion puis modification des valeurs de notre table fichier 
 *un update et ensuite un insert de nouveau de fichier.*/
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
             
            return $this->redirect(['view']);
           }
       }
       return $this->render('photoupdate', [
                            'model' => $model,]);
    }
    
      public function actionView()
    {
                $id=Yii::$app->getUser()->getId();
                $model=new ProfileForm();
                $model->init();
               $photo=(Fichier::find()->select('nom')->where(['id_user'=>$id,'statut'=>'photo_profil'])->scalar());

        return $this->render('viewprofile', [
            'model' => $model,
            'photo'=>$photo
            ]);
    }
    
    
}
