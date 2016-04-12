<?php

namespace backend\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use common\models\User;
use common\models\LoginForm;
use backend\modules\admin\models\SignupForm;

class AdminController extends Controller
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
  
    	
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
    
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

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
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
    
    /*
     * cette fonction permet a un administrateur de se deconnecter
     */
    
public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


   /**
    * adding action to create action whose will create an admin
    */
    
     public function actionCreateAdmin()
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

   