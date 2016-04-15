<?php

namespace frontend\modules\member\controllers;
use Yii;
use common\models\LoginForm;

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

}
