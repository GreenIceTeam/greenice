<?php

namespace backend\modules\admin\controllers;

use Yii;
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
            }
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
    
    /*
     * cette fonction permet a un administrateur de se deconnecter
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
