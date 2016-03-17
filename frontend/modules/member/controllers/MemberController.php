<?php

namespace frontend\modules\member\controllers;

class MemberController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) { 
                   return $this->render('home');
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

}
