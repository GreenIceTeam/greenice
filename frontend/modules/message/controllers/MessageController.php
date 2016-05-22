<?php

namespace frontend\modules\message\controllers;

use frontend\modules\message\models\MessageForm;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use Yii;
use \yii\data\Pagination;
use common\models\Message;
use common\models\RecevoirMess;

class MessageController extends Controller
{
    
    const MESSBYPAGE = 10;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['view-mess', 'view-group', 'send', 'delete'],
                'rules' => [
                    [ 'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    ['actions' => ['view-mess', 'view-group', 'send', 'delete'],
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
    
    /*
     *  This action allows to the user to send a message
     *  The action only handle form submittion. It doesn't display the form.
     *  @params array $idUser if the message is send to several users
     *  return View
     */
    public function actionSend()
    {
        $model = new MessageForm;
        
        //if (Yii::$app->request->ispost){
            $model->load(Yii::$app->request->post());
            $model->fichier = \yii\web\UploadedFile::getInstance($model, 'fichier');
            
            if ($model->send()){
          //       return $this->render('do it');
                return $this->actionViewMess($model->idReceiver);
            }
        //}
        return ('echec de l\'operation');
    }
    /** 
     * That function make an SQl request to retrieve datas about the receives messages of the current user
     * @return an ActicveQuery object
     */
    private function getMessAndSenders($idSender, $new){
        $req = $new==false ? [] : ['nouveau'=>'oui']; 
        $idUtil = Yii::$app->getUser()->getId();
        $query = new yii\db\Query();
       $res =  $query->select('u2.nom nom,u2.id id,  m.id_source, id_dest, m.id_mess, date_env, contenu, f.nom nom_fich, f2.nom photo_profil')
                                        ->from('recevoir_mess rm')
                                        ->innerJoin('message m', 'rm.id_mess=m.id_mess')
                                       ->innerJoin('user u', 'u.id = rm.id_dest')
                                        ->innerJoin('user u2', 'u2.id = m.id_source')
                                        ->leftJoin('fichier_assoc_mess fm', 'fm.id_mess = m.id_mess')
                                        ->leftJoin('fichier f', 'fm.id_fichier=f.id_fichier') 
                                        ->leftJoin('fichier f2', 'f2.id_user=u2.id  and f2.statut="photo_profil"') 
                                        ->where(['m.id_source' => $idSender, 'rm.id_dest'=>$idUtil])
                                        ->orWhere(['m.id_source' => $idUtil, 'rm.id_dest'=>$idSender])
                                        ->andWhere($req)
                                        ->andWhere(['m.supprime'=>'non'])
                                        ->orderBy('m.id_mess desc')
                                        ->all();
         return $res;
        
    }
    
    /*
     *  This action allows to the current user to see the messages of a sender if is not null
     *  If sender is null, this action allow to see new messages
     * 
     *  @params int $idSender which is the id of the sender
     *  return View with messages
     */
    public function actionViewMess($idSender, $new = false)
    {
        if(isset($idSender) && !empty($idSender) && is_numeric($idSender)){
        $model = new MessageForm;
        $model->idReceiver = $idSender;
        
        
        $query = new \yii\db\Query;
        $messages = $this->getMessAndSenders($idSender, $new);
      
        if ($new == false){
            
         //   $messages = $query->all();
            
            foreach ($messages as $message){
                
              //   return 'aaaaaaaaaaaa'.print_r($message);
                
                $id = $message['id_dest'];
                $m = RecevoirMess::findAll($id);
                foreach ($m as $me){
                    $me->affiche = 'oui';
                    $me->save();
                }
            }

            return $this->render('view-mess', ['messages' => $messages,
                                                                    'model'=>$model]);
            
        }  else {
        
            $messages = $query->andWhere(['nouveau' => 'oui', 'affiche' => 'non'])->orderBy('id_mess')->all();
            foreach ($messages as $message){
                $id = $message->id_dest;
                $m = RecevoirMess::findAll($id);
                foreach ($m as $me){
                    $me->affiche = 'oui';
                    $me->save();
                }
            }
            return $this->render('view-new-mess', ['messages' => $messages]);
        }
    }else{
        return $this->render('index');
    }
    }
    /*
     *  This action allows to the user to delete a specific message
     * 
     *  @params array $idMess which is the identifiers of all messages to delete
     *  return View
     */
    public function actionDelete($idMess)
    {
        if(isset($idMess) && !empty($idMess) && is_numeric($idMess)){
            $idSender = Message::find()->select('id_source')->where(['id_mess'=>$idMess])->scalar();
        $idUtil = Yii::$app->getUser()->getId();
        $connection = \Yii::$app->db;
        /**
         * Si le user est l'auteur du message qu'il veut supprimer, on met le champ 'supprime' à oui dans la ta table 'message'
         * S'il n'est pas  auteur masi destinataire du message, on efface le tuple correspondant dans la table recevoir_mess
         */
        if($idSender == $idUtil){
        $command = $connection->createCommand()->update('message', ['supprime'=>'oui'], ['id_mess'=>$idMess])->execute();
        }else{    
            $command2 = $connection->createCommand()->delete('recevoir_mess', ['id_dest'=>$idUtil, 'id_mess'=>$idMess])->execute();
        }
         
    //    RecevoirMess::deleteAll('id_dest = :id_dest AND id_mess = :id_mess', [':id_dest' => $idUtil, ':id_mess' => $idMess]);
        
        //return $this->goBack();
        return $this->actionViewMess($idSender);
        }  else {
            
       $this->render('index');
       
        }
    }
    
    /*
     *  This action allows to the user to see the list of all unreaded messages senders
     *
     *  return View
     */
    public function actionViewGroup()
    {
        $idUtil = Yii::$app->getUser()->getId();
        $query = new \yii\db\Query();
        $messGroupSenders =$query->select('m.id_source id, count(m.id_mess) nb_mess, u2.nom nom, f.nom nom_fich')
                                                                                 ->from('message m')
                                                                                 ->distinct()
                                                                                  ->innerJoin('recevoir_mess rm', 'rm.id_mess=m.id_mess')
                                                                                  ->innerJoin('user u', 'u.id=rm.id_dest')
                                                                                  ->innerJoin('user u2', 'u2.id=m.id_source')
                                                                                 ->leftJoin('fichier f', "f.id_user=m.id_source  and f.statut='photo_profil' ")
                                                                                ->groupBy('m.id_source')
                                                                                ->orderBy('m.id_mess desc')
                                                                                 ->where(['rm.id_dest' => $idUtil])
                                                                                 ->all();
        return $this->render('view-group', ['messGroupSenders' => $messGroupSenders]);
    }
    
}
