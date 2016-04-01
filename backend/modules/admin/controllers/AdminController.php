<?php

namespace backend\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use common\models\User;
use common\models\LoginForm;
use backend\modules\admin\models\SignupForm;

class AdminController extends Controller
{
  
    
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->render('index');
        }
        
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) ) {
            $isAdmin = User::find()->select('id')->where(['role'=>'admin', 'username'=>$model->username]);
            if(!empty($isAdmin) && $model->login() ){
                return $this->render('index');
            }
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
       }
    }

public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    
    
   /**
    * adding action to create action whose will create an admin
    */
    
     public function actionSignupAdmin()
    {
        $model = new SignupForm();
        
        if ($model->load(Yii::$app->request->post())) {

            if ($user = $model->signup()) {
                
                if (Yii::$app->getUser()->login($user)) { 
                   return $this->render('index');
                }
            }
        } 
           return $this->render('createadmin',['model' => $model]);
         
                                 
         
    }
     
}

   
