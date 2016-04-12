<?php

namespace frontend\modules\communaute\controllers;

use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class CommunityController extends Controller
{
	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup', 'createAdmin'],
                'rules' => [
                    [ 'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    ['actions' => ['logout', 'createAdmin'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => ['class' => VerbFilter::className(),
						'actions' => ['logout' => ['post']],
            ], 
        ];
    }
	
    public function actionIndex()
    {
        return $this->render('index');
    }
}
