<?php

use yii\db\Schema;
use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

         $this->createTable('{{%domaine}}', [
            'id_domaine' => $this->primaryKey(),
            'nom' => $this->string()->notNull(),
             'valide'=>$this->string(3)->notNull()->check("type in ('oui', 'non')")
        ],$tableOptions);
         
         
         $this->createTable('{{%sous_domaine}}', [
            'id_sous_dom' => $this->primaryKey(),
            'id_domaine' => $this->integer(11)->notNull(),
            'nom' => $this->string()->notNull(),
            'valide'=>$this->string(3)->notNull()->check("type in ('oui', 'non')")
        ],$tableOptions);
         $this->addForeignKey('fk1_sous_domaine', 'sous_domaine', 'id_domaine', 'domaine', 'id_domaine');
         
         
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'id_domaine'=>$this->integer(11),
            'id_sous_dom'=>$this->integer(11),
            'username' => $this->string(20)->notNull(),
            'nom' => $this->string(20)->notNull(),
            'prenom' => $this->string(20),
            'sexe' => $this->string(1)->notNull()->check("sexe in ('H','F')"),
            'role' => $this->string()->notNull()->check("role in ('admin','member')"),
            'ville' => $this->string(20),
            'date_naiss' => $this->date(),
            'date_insc' => $this->dateTime(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'last_active_time' => $this->dateTime(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull()
        ], $tableOptions);
        $this->addForeignKey('fk1_user', 'user', 'id_domaine', 'domaine', 'id_domaine');
        $this->addForeignKey('fk2_user', 'user', 'id_sous_dom', 'sous_domaine', 'id_sous_dom');
        
        
          $this->createTable('{{%communaute}}', [
            'id_comm' => $this->primaryKey(),
            'id_createur' => $this->integer(11),
            'id_supp' => $this->integer(11),
            'nom' => $this->string()->notNull(),
            'type' => $this->string()->notNull()->check("type in ('comm_domaine', 'comm_util')")
        ],$tableOptions);
          $this->addForeignKey('fk1_communaute', 'communaute', 'id_createur', 'user', 'id');
          $this->addForeignKey('fk2_communaute', 'communaute', 'id_supp', 'user', 'id');
          
          
          $this->createTable('{{%comm_lier_sous_dom}}', [
            'id_sous_dom' => $this->integer(11),
            'id_comm' => $this->integer(11)
          ],$tableOptions);
          $this->addPrimaryKey('pk1_comm_lier_sous_dom', 'comm_lier_sous_dom', ['id_sous_dom', 'id_comm']);
          $this->addForeignKey('fk1_comm_lier_sous_dom', 'comm_lier_sous_dom', 'id_sous_dom', 'sous_domaine', 'id_sous_dom');
          $this->addForeignKey('fk2_comm_lier_sous_dom', 'comm_lier_sous_dom', 'id_comm', 'communaute', 'id_comm');
          
          
           $this->createTable('{{%appartenir_comm}}', [
            'id_user' => $this->integer(11),
            'id_comm' => $this->integer(11)
          ],$tableOptions);
           $this->addPrimaryKey('pk1_appartenir_comm', 'appartenir_comm', ['id_user', 'id_comm']);
          $this->addForeignKey('fk1_appartenir_comm', 'appartenir_comm', 'id_comm', 'communaute', 'id_comm');
          
          
           $this->createTable('{{%cercle}}', [  
            'id_cercle' => $this->primaryKey(),
            'id_createur' => $this->integer(11),
            'id_supp' => $this->integer(11),
            'nom' => $this->string(30),
            'type' => $this->string(30)->check("type in('amis', 'famille', 'connaissance', 'collegue')"),
             'date_creation'=> $this->dateTime()
          ],$tableOptions);
            $this->addForeignKey('fk1_cercle', 'cercle', 'id_createur', 'user', 'id');
            $this->addForeignKey('fk2_cercle', 'cercle', 'id_supp', 'user', 'id');
           
            
            $this->createTable('{{%appartenir_cercle}}', [
            'id_user' => $this->integer(11),
            'id_cercle' => $this->integer(11)
          ],$tableOptions);
           $this->addPrimaryKey('pk1_appartenir_cercle', 'appartenir_cercle', ['id_user', 'id_cercle']);
           $this->addForeignKey('fk1_appartenir_cercle', 'appartenir_cercle', 'id_user', 'user', 'id');
           $this->addForeignKey('fk2_appartenir_cercle', 'appartenir_cercle', 'id_cercle', 'cercle', 'id_cercle');
           
           
           $this->createTable('{{%publication}}', [
            'id_publ' => $this->primaryKey(),
            'id_auteur' => $this->integer(11),
            'contenu' => $this->text(),
             'date_post'=> $this->dateTime()
          ],$tableOptions);
            $this->addForeignKey('fk1_publication', 'publication', 'id_auteur', 'user', 'id');
            
            $this->createTable('{{%recevoir_publ}}', [
            'id_user' => $this->integer(11),
            'id_publ' => $this->integer(11),
            'affiche' => $this->string(3)->check("affiche in ('oui', 'non')")
          ],$tableOptions);
            $this->addPrimaryKey('pk1_recevoir_publ', 'recevoir_publ', ['id_user', 'id_publ']);
            $this->addForeignKey('fk1_recevoir_publ', 'recevoir_publ', 'id_user', 'user', 'id');
            $this->addForeignKey('fk2_recevoir_publ', 'recevoir_publ', 'id_publ', 'publication', 'id_publ');
            
            
            $this->createTable('{{%aimer_publ}}', [
            'id_user' => $this->integer(11),
            'id_publ' => $this->integer(11),
            'date_aime' => $this->dateTime()
          ],$tableOptions);
            $this->addPrimaryKey('pk1_aimer_publ', 'aimer_publ', ['id_user', 'id_publ']);
            $this->addForeignKey('fk1_aimer_publ', 'aimer_publ', 'id_user', 'user', 'id');
            $this->addForeignKey('fk2_aimer_publ', 'aimer_publ', 'id_publ', 'publication', 'id_publ');
            
            
            $this->createTable('{{%fichier}}', [
            'id_fichier' => $this->primaryKey(),
            'id_user' => $this->integer(11),
            'nom' => $this->string(),
            'statut' => $this->string(20)->check("statut in ('photo_profil', 'publication', 'message', 'biblio')")
          ],$tableOptions);
            $this->addForeignKey('fk1_fichier', 'fichier', 'id_user', 'user', 'id');
            
            
            $this->createTable('{{%fichier_assoc_publ}}', [
            'id_fichier' => $this->integer(11),
            'id_publ' => $this->integer(11)
          ],$tableOptions);
            $this->addPrimaryKey('pk1_fichier_assoc_publ', 'fichier_assoc_publ', ['id_fichier', 'id_publ']);
            $this->addForeignKey('fk1_fichier_assoc_publ', 'fichier_assoc_publ', 'id_fichier', 'fichier', 'id_fichier');
            $this->addForeignKey('fk2_fichier_assoc_publ', 'fichier_assoc_publ', 'id_publ', 'publication', 'id_publ');
            
            
             $this->createTable('{{%commentaire}}', [
            'id_comment' => $this->primaryKey(),
            'id_auteur' => $this->integer(11),
            'id_publ' => $this->integer(11),
            'contenu' => $this->text(),
            'date' => $this->dateTime()
          ],$tableOptions);
            $this->addForeignKey('fk1_commentaire', 'commentaire', 'id_auteur', 'user', 'id');
            $this->addForeignKey('fk2_commentaire', 'commentaire', 'id_publ', 'publication', 'id_publ');
            
            
            $this->createTable('{{%aimer_comment}}', [
            'id_user' => $this->integer(11),
            'id_comment' => $this->integer(11),
            'date' => $this->dateTime()
          ],$tableOptions);
            $this->addPrimaryKey('pk1_aimer_comment', 'aimer_comment', ['id_user', 'id_comment']);
            $this->addForeignKey('fk1_aimer_comment', 'aimer_comment', 'id_user', 'user', 'id');
            $this->addForeignKey('fk2_aimer_comment', 'aimer_comment', 'id_comment', 'commentaire', 'id_comment');
            
            
             $this->createTable('{{%fichier_assoc_comment}}', [
            'id_fichier' => $this->integer(11),
            'id_comment' => $this->integer(11)
          ],$tableOptions);
            $this->addPrimaryKey('pk1_fichier_assoc_comment', 'fichier_assoc_comment', ['id_fichier', 'id_comment']);
            $this->addForeignKey('fk1_fichier_assoc_comment', 'fichier_assoc_comment', 'id_fichier', 'fichier', 'id_fichier');
            $this->addForeignKey('fk2_fichier_assoc_comment', 'fichier_assoc_comment', 'id_comment', 'commentaire', 'id_comment');
            
            
            $this->createTable('{{%message}}', [
            'id_mess' => $this->primaryKey(),
            'id_source' => $this->integer(11),
            'contenu' => $this->text(),
            'date_env' => $this->dateTime()
          ],$tableOptions);
            $this->addForeignKey('fk1_message', 'message', 'id_source', 'user', 'id');
            
            
          $this->createTable('{{%recevoir_mess}}', [
            'id_dest' => $this->integer(11),
            'id_mess' => $this->integer(11),
            'affiche' => $this->string(3)->notNull()->check("type in ('oui', 'non')"),
            'lu' => $this->string(3)->notNull()->check("type in ('oui', 'non')")
          ],$tableOptions);
            $this->addPrimaryKey('pk1_recevoir_mess', 'recevoir_mess', ['id_dest', 'id_mess']);
            $this->addForeignKey('fk1_recevoir_mess', 'recevoir_mess', 'id_dest', 'user', 'id');
            $this->addForeignKey('fk2_recevoir_mess', 'recevoir_mess', 'id_mess', 'message', 'id_mess');
            
            
            $this->createTable('{{%fichier_assoc_mess}}', [
            'id_fichier' => $this->integer(11),
            'id_mess' => $this->integer(11)
          ],$tableOptions);
            $this->addPrimaryKey('pk1_fichier_assoc_mess', 'fichier_assoc_mess', ['id_fichier', 'id_mess']);
            $this->addForeignKey('fk1_fichier_assoc_mess', 'fichier_assoc_mess', 'id_fichier', 'fichier', 'id_fichier');
            $this->addForeignKey('fk2_fichier_assoc_mess', 'fichier_assoc_mess', 'id_mess', 'message', 'id_mess');
            
            $this->createTable('{{%critique}}', [
            'id_critique' => $this->primaryKey(),
            'id_auteur' => $this->integer(11),
            'contenu' => $this->text(),
            'date' => $this->dateTime()
          ],$tableOptions);
            $this->addForeignKey('fk1_critique', 'critique', 'id_auteur', 'user', 'id');
    }

    public function down()
    {     
        $this->dropTable('{{%fichier_assoc_mess}}');
        $this->dropTable('{{%fichier_assoc_comment}}');
        $this->dropTable('{{%fichier_assoc_publ}}');
        
        $this->dropTable('{{%aimer_comment}}');
        $this->dropTable('{{%aimer_publ}}');
        $this->dropTable('{{%recevoir_publ}}');
        $this->dropTable('{{%appartenir_cercle}}');
        $this->dropTable('{{%appartenir_comm}}');
        $this->dropTable('{{%comm_lier_sous_dom}}');
        $this->dropTable('{{%recevoir_mess}}');
       
        $this->dropTable('{{%critique}}');
        
        $this->dropTable('{{%communaute}}');
        $this->dropTable('{{%cercle}}');
        
        $this->dropTable('{{%commentaire}}');
        $this->dropTable('{{%fichier}}');
        $this->dropTable('{{%publication}}');
        $this->dropTable('{{%message}}');
        $this->dropTable('{{%user}}');
        $this->dropTable('{{%sous_domaine}}');
        $this->dropTable('{{%domaine}}');
        
        
    }
    
}
