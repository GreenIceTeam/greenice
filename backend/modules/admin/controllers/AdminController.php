<?php

namespace backend\modules\admin\controllers;

use Yii;
<<<<<<< HEAD
use common\models\LoginForm;

class AdminController extends \yii\web\Controller
{
    /*
     * cette action permet à un administrateur de se connecter
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
            $user = User::find()->select('id')->where(['role' => 'admin', 'username' => $model->username ])->scalar();
            if(!empty($user) && $model->login())
            {
                 return $this->goBack();
=======
use yii\web\Controller;
use common\models\User;

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
>>>>>>> dd3a41e69cd6bbc25acfa876dcd114a200fc45b3
            }
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
<<<<<<< HEAD
        }
    }
    
    /*
     * cette fonction permet a un administrateur de se deconnecter
     */
    public function actionLogout()
=======
       }
    }

public function actionLogout()
>>>>>>> dd3a41e69cd6bbc25acfa876dcd114a200fc45b3
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
<<<<<<< HEAD

}
=======
    
    
}

   
>>>>>>> dd3a41e69cd6bbc25acfa876dcd114a200fc45b3
