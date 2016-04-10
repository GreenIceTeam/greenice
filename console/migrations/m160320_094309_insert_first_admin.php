<?php

use yii\db\Schema;
use yii\db\Migration;

class m160320_094309_insert_first_admin extends Migration
{
    public function up()
    {
        $user=new common\models\User();
         $user->setPassword('Adm_pwd?');
         $user->generateAuthKey();
                $this->insert('{{%user}}',  [ 'id' => 1,
                                                          'username' => 'admin1', 
                                                           'nom' => 'admin1', 
                                                          'sexe'=> 'H', 
                                                          'role'=>'admin', 
                                                          'password_hash'=>$user->password_hash, 
                                                          'auth_key'=>$user->auth_key,
                                                          'email'=> 'tedjoujospin@yahoo.fr'
                                                     ]);
		/** Quelques domaines juste pour tester le système, ils seront 
			supprimés une fois les listes de domaines etsous-domaines validées **/			
					$this->insert('{{%domaine}}',  [ 'id_domaine' => 1,
													  'nom'=>'informatique',
													  'type'=>'mixte',
													  'valide'=>'oui'
													]);
													
					$this->insert('{{%domaine}}',  [ 'id_domaine' => 2,
													  'nom'=>'batiments et travaux publics',
													  'type'=>'mixte','valide'=>'oui'
													]);
													
					$this->insert('{{%domaine}}',  [ 'id_domaine' => 3,
													  'nom'=>'médecine',
													  'type'=>'mixte',
													  'valide'=>'oui'
													]);
		/** Quelques domaines juste pour tester le système, ils seront 
			supprimé une fois les listes de domaines etsous-domaines validées **/ 
					
					/**sous domaines de l'informatique **/
					$this->insert('{{%sous_domaine}}',  [ 'id_sous_dom' => 1,
													'id_domaine'=>1,
													  'nom'=>'génie logiciel',
													  'valide'=>'oui'
													]);			
					$this->insert('{{%sous_domaine}}',  [ 'id_sous_dom' => 2,
													'id_domaine'=>1,
													  'nom'=>'sécurité informatique',
													  'valide'=>'oui'
													]);		
					$this->insert('{{%sous_domaine}}',  [ 'id_sous_dom' => 3,
													'id_domaine'=>1,
													  'nom'=>'systèmes et réseaux',
													  'valide'=>'oui'
													]);		
					/**sous domaines du batiments et travaux publics **/		
					$this->insert('{{%sous_domaine}}',  [ 'id_sous_dom' => 4,
													'id_domaine'=>2,
													  'nom'=>'génie civil',
													  'valide'=>'oui'
													]);
					$this->insert('{{%sous_domaine}}',  [ 'id_sous_dom' => 5,
													'id_domaine'=>2,
													  'nom'=>'topographie',
													  'valide'=>'oui'
													]);
					$this->insert('{{%sous_domaine}}',  [ 'id_sous_dom' => 6,
													'id_domaine'=>2,
													  'nom'=>'briquetage-maçonnerie',
													  'valide'=>'oui'
													]);

					/**sous domaines de la médecine **/		
					$this->insert('{{%sous_domaine}}',  [ 'id_sous_dom' => 7,
													'id_domaine'=>3,
													  'nom'=>'médecine Générale',
													  'valide'=>'oui'
													]);
					$this->insert('{{%sous_domaine}}',  [ 'id_sous_dom' => 8,
													'id_domaine'=>3,
													  'nom'=>'ophtalmologie',
													  'valide'=>'oui'
													]);
					$this->insert('{{%sous_domaine}}',  [ 'id_sous_dom' => 9,
													'id_domaine'=>3,
													  'nom'=>'dermatologie',
													  'valide'=>'oui'
													]);
					
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
