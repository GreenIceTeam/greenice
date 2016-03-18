<?php

namespace frontend\modules\member\controllers;

use yii;
use frontend\modules\member\models\SignupForm;


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
                   return $this->render('index');
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

}
