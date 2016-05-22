<?php

namespace frontend\modules\member\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use common\models\SousDomaine;
use common\models\LoginForm;
use frontend\modules\member\models\SignupForm;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;


/**
 *  controller of member
 */

class MemberController extends \yii\web\Controller
{
	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                'logout' => ['post'],
                ],
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
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->render('index');
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
                   return  $this->redirect('member/member/index');
                }
            }
        }
        return $this->render('signup', ['model' => $model,]);
        
    }
    
    /** Retourne du code Html contenant tous les sous-domaines d'un domaine
     * @param int idDomain id du domaine dont on va retourner les sous-domains enveloppés dans du code html
     * @return Html le code Html des sous domaines
     */
    
    public function actionLists(){
        
        if(\Yii::$app->request->isAjax){
                $idDomaine = (integer)Yii::$app->request->getQueryParam('idDomaine');
        
                
                        $sousDoms =SousDomaine::find()->where(['id_domaine'=>$idDomaine])->orderBy('nom desc')->all();
                        $count=SousDomaine::find()->where(['id_domaine'=>$idDomaine])->orderBy('nom desc')->count();
                        $res = '<option value="">Choisir un sous-domaine</option> ';
                        
                        if($count>0){

                                    foreach ($sousDoms as $sousDom){
                                        $res .= '<option value="'.$sousDom->id_sous_dom.'">'.$sousDom->nom.'</option>';
                                    }
                                    
                          }  else {

                                $res = 'pas de sous domaine pour ce domaine';
                          }
                          
                          echo $res;
              }  
        
    }

}
