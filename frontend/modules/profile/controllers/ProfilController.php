<?php

namespace frontend\modules\profile\controllers;

use Yii;
use common\models\User;
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
                'only' => ['logout', 'signup', 'createAdmin'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'createAdmin'],
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
        


       if ($model->load(Yii::$app->request->post()))  {
            $id=Yii::$app->getUser()->getId();
           $connection = \Yii::$app->db;
           $connection->open();
           $connection->createCommand()->update('user' , ['username' =>$model->username,'email'=>$model->email],"id=$id")
                                       ->execute();


            return $this->redirect(['view-profile']);
        } else {
            return $this->render('updateprofile', [
                'model' => $model,
            ]);
        }
   }
    
      public function actionViewProfile()
    {
        return $this->render('viewprofile', [
            'model' => $this->findModel(),
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
