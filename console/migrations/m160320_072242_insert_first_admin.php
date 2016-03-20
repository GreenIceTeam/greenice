<?php

use yii\db\Schema;
use yii\db\Migration;

class m160320_072242_insert_first_admin extends Migration
{
    public function up()
    {
          $user = new common\models\User();
          $user->setPassword('Adm_pwd?');
          $user->generateAuthKey();
        $this->insert('{{%user}}', [    'id'=>1,
                                            'username'=>'admin1' , 
                                           'nom'=> 'admin1', 
                                           'sexe'=> 'H', 
                                            'role'=>'admin', 
                                            'auth_key'=>$user->auth_key ,
                                            'password_hash' =>$user->password_hash, 
                                           'email'=>'jospintedjou@yahoo.fr' ]);
    }

    public function down()
    {
        $this->delete('{{%user}}', ['id'=>1]);
       
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
