<?php

namespace frontend\modules\member\controllers;

class MemberController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
