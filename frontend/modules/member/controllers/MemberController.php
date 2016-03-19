<?php

namespace frontend\modules\member\controllers;
use Yii;
use common\models\LoginForm;

use yii;
use frontend\modules\member\models\SignupForm;


/**
 *  controller of member
 */

class MemberController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
        return $this->goHome(); //render('index');
     }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack(); //render('index');
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

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {

            if ($user = $model->signup()) {
                
                if (Yii::$app->getUser()->login($user)) { 
                   return $this->render('index');
                }
            }
        }

        return $this->render('signup', ['model' => $model,]);
        
    }

}
