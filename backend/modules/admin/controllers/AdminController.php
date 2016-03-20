<?php

namespace backend\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use common\models\User;

class AdminController extends Controller
{
  
    
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
        if ($model->load(Yii::$app->request->post()) ) {
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

public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    
    public function actionSignup()
    {
       /* action signup use to create first user admin ;*/
    $count=User::find()
            ->where (['id' =>1])
            ->count();
    if ($count == 1) {
        
    return $this->render('index');
    }
    
    $user=new User(); 
    $user->email= 'jospintedjou@yahoo.fr';
    $user->nom= 'admin1';
    
    $user->date_insc= date('Y-M-D H:i:s');
 
    $user->sexe= 'H';
   
    $user->role='admin';
    $user->username='admin1'  ;
    $user->setPassword('Adm_pwd?');
    //$user->id_domaine=1;
    //$user->id_sous_dom=1;
  // $user->created_at = '1555239878';
   //$user->updated_at = '1555239878';
    $user->generateAuthKey();
    
   $user->save();
    return ('signup validate');
               
            
    }
}

   
