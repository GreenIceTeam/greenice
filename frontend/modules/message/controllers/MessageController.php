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
    
    /*
     *  This action allows to the user to send a message
     * 
     *  @params array $idUser if the message is send to several users
     *  return View
     */
    public function actionSend($idUser)
    {
        $model = new MessageForm;
        $model->receiver = $idUser;
        
        if (Yii::$app->request->ispost){
            $model->load(Yii::$app->request->post());
            $model->fichier = \yii\web\UploadedFile::getInstance($model, 'fichier');
            
            if ($model->send()){
                
                return $this->goBack();
            }
        }
        return $this->render('send', ['model' => $model]);
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
        $idUtil = Yii::$app->getUser()->getId();
        $query = Message::find()->innerJoinWith('recevoirMesses')->where('id_dest = :id_dest', [':id_dest' => $idUtil])->andWhere(['id_source' => $idSender]);
        
        if ($new == false){
            
            $messages = $query->all();
            foreach ($messages as $message){
                $id = $message->getRecevoirMesses()->one()->id_dest;
                $m = RecevoirMess::findAll($id);
                foreach ($m as $me){
                    $me->affiche = 'oui';
                    $me->save();
                }
            }

            return $this->render('view-mess', ['messages' => $messages]);
            
        }  else {
        
            $messages = $query->andWhere(['nouveau' => 'oui', 'affiche' => 'non'])->orderBy('id_mess')->all();
            foreach ($messages as $message){
                $id = $message->getRecevoirMesses()->one()->id_dest;
                $m = RecevoirMess::findAll($id);
                foreach ($m as $me){
                    $me->affiche = 'oui';
                    $me->save();
                }
            }
            return $this->render('view-new-mess', ['messages' => $messages]);
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
        $idUtil = Yii::$app->getUser()->getId();
        
        RecevoirMess::deleteAll('id_dest = :id_dest AND id_mess = :id_mess', [':id_dest' => $idUtil, ':id_mess' => $idMess]);
        
        return $this->goBack();
    }
    
    /*
     *  This action allows to the user to see the list of all unreaded messages senders
     *
     *  return View
     */
    public function actionViewGroup()
    {
        $idUtil = Yii::$app->getUser()->getId();
        
        $messagesrecus = RecevoirMess::find()->where('id_dest = :id_dest', [':id_dest' => $idUtil])->all();
        
        $id_utilisateurs = Message::find()->select(['id_source'])->distinct()->innerJoinWith('recevoirMesses')->where('id_dest = :id_dest', [':id_dest' => $idUtil])->all();
        
        foreach ($id_utilisateurs as $id_utilisateur){
            $nombre[$id_utilisateur->id_source] = 0;
            foreach ($messagesrecus as $m){
                if ($id_utilisateur->id_source == $m->getIdMess()->one()->id_source){
                    $nombre[$id_utilisateur->id_source] = $nombre[$id_utilisateur->id_source] + 1;
                }
            }
        }
        return $this->render('view-group', ['id_utilisateurs' => $id_utilisateurs, 'nombre' => $nombre]);
    }
    
}
