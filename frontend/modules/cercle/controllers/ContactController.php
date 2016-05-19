<?php

namespace frontend\modules\cercle\controllers;
use Yii;
use common\models\ContactForm;

class ContactController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
   
    public function actionCreateList()
    {
       $model = new CreateListForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

    }
    }

public function actionViewMembers()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    public function actionAddMembers()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    public function actionViewConnected()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
