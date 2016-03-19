<?php

namespace backend\modules\admin\controllers;

<<<<<<< HEAD
use yii\web\Controller;
use common\models\User;

class AdminController extends Controller
{
  
    
    public function actionIndex()
    {
        return $this->render('index');
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

   
=======
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
>>>>>>> 638cdf04b304b939546b524eb2df4937f936467d
