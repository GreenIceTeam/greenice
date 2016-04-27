<?php

namespace frontend\modules\message\models;

use yii\base\Model;
use common\models\Message;
use common\models\RecevoirMess;
use Yii;
use common\models\User;
	
class MessageForm extends Model
{
    public $content;
    public $receiver;
    public $fichier;


    public function rules()
    {
	return[
				[['receiver', 'content'], 'required'],
                                ['receiver', 'validateReceiver'],
                                ['receiver', 'integer', 'min' => 1],
                                ['fichier', 'file']
		];
    }
    
    /*
     * This function validate the id's receiver.
     * It serves to inline validation for receiver
     * 
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validateReceiver($attribute, $params)
    {
        if (!$this->hasErrors())
        {
            $user = User::findOne($this->receiver);
            if (!$user) {
                $this->addError($attribute, 'Utilisateur inexistant');
            }
        }
    }
    
    /**
     * Register the message using the provided content, receiver and the current user.
     *
     * @return boolean whether the registration successfully
     */
    public function send()
    {
        if ($this->validate())
        {
            $message = new Message;
            $message->contenu = $this->content;
            $message->date_env = date("y-m-d  H:i:s");
            $message->id_source = Yii::$app->getUser()->getId();
            $message->save();
            
            $messageRecu = new RecevoirMess;
            $messageRecu->id_mess = $message->id_mess;
            $messageRecu->id_dest = $this->receiver;
            $messageRecu->lu = 'non';
            $messageRecu->affiche = 'non';
            $messageRecu->nouveau = 'oui';
            $messageRecu->save();
            
            if (!empty($this->fichier)){
                $fich = new \common\models\Fichier;
                $fich->id_user = Yii::$app->getUser()->getId();
                $idFile = (\common\models\Fichier::find()->select('max(id_fichier)')->scalar())+1;
                $fich->nom = 'message_' . date('YmdHis') . '_' . $idFile . '.' .$this->fichier->extension;
                $fich->statut = 'message';
                $fich->save();

                $fichassoc = new \common\models\FichierAssocMess;
                $fichassoc->id_fichier = $fich->id_fichier;
                $fichassoc->id_mess = $message->id_mess;
                $fichassoc->save();

                $this->fichier->saveAs('uploads/' . $fich->nom);
            }
            return true;
        }else{
            return false;
        }
    }
}

