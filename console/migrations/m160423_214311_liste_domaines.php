<?php

use yii\db\Schema;
use yii\db\Migration;

class m160423_214311_liste_domaines extends Migration {
    /* liste des domaines d'etudes et sous-domaines */

    public function up() {
        $this->insert('{{%domaine}}', ['id_domaine' => 1, 'nom' => 'Arts', 'type' => 'mixte', 'valide' => 'oui']);
        $this->insert('{{%domaine}}', ['id_domaine' => 2, 'nom' => 'Administration,commerce et informatique', 'type' => 'mixte', 'valide' => 'oui']);
        $this->insert('{{%domaine}}', ['id_domaine' => 3, 'nom' => 'Agriculture et peche', 'type' => 'mixte', 'valide' => 'oui']);
        $this->insert('{{%domaine}}', ['id_domaine' => 4, 'nom' => 'Administration', 'type' => 'mixte', 'valide' => 'oui']);
        $this->insert('{{%domaine}}', ['id_domaine' => 5, 'nom' => 'Alimentation et tourisme', 'type' => 'mixte', 'valide' => 'oui']);
        $this->insert('{{%domaine}}', ['id_domaine' => 6, 'nom' => 'Lettres', 'type' => 'mixte', 'valide' => 'oui']);
        $this->insert('{{%domaine}}', ['id_domaine' => 7, 'nom' => 'Batiments et travaux publics', 'type' => 'mixte', 'valide' => 'oui']);
        $this->insert('{{%domaine}}', ['id_domaine' => 8, 'nom' => 'Bois et materiaux connexes', 'type' => 'mixte', 'valide' => 'oui']);
        $this->insert('{{%domaine}}', ['id_domaine' => 9, 'nom' => 'Communication et documentation', 'type' => 'mixte', 'valide' => 'oui']);
        $this->insert('{{%domaine}}', ['id_domaine' => 10, 'nom' => 'Cuir,textile et habillement', 'type' => 'mixte', 'valide' => 'oui']);
        $this->insert('{{%domaine}}', ['id_domaine' => 11, 'nom' => 'Electronique', 'type' => 'mixte', 'valide' => 'oui']);
        $this->insert('{{%domaine}}', ['id_domaine' => 12, 'nom' => 'Electronique d\'equipements motorises', 'type' => 'mixte', 'valide' => 'oui']);
        $this->insert('{{%domaine}}', ['id_domaine' => 13, 'nom' => 'Entretien d\equipements motorises', 'type' => 'mixte', 'valide' => 'oui']);
        $this->insert('{{%domaine}}', ['id_domaine' => 14, 'nom' => 'Environnement et ammenagement du territoire', 'type' => 'mixte', 'valide' => 'oui']);
        $this->insert('{{%domaine}}', ['id_domaine' => 15, 'nom' => 'Fabrication mecanique', 'type' => 'mixte', 'valide' => 'oui']);
        $this->insert('{{%domaine}}', ['id_domaine' => 16, 'nom' => 'Foresterie et papier', 'type' => 'mixte', 'valide' => 'oui']);
        $this->insert('{{%domaine}}', ['id_domaine' => 17, 'nom' => 'Informatique', 'type' => 'mixte', 'valide' => 'oui']);
        $this->insert('{{%domaine}}', ['id_domaine' => 18, 'nom' => 'Mecanique d\'entretien', 'type' => 'mixte', 'valide' => 'oui']);
        $this->insert('{{%domaine}}', ['id_domaine' => 19, 'nom' => 'Metallurgie', 'type' => 'mixte', 'valide' => 'oui']);
        $this->insert('{{%domaine}}', ['id_domaine' => 20, 'nom' => 'Mine et travaux de chantier', 'type' => 'mixte', 'valide' => 'oui']);
        $this->insert('{{%domaine}}', ['id_domaine' => 21, 'nom' => 'Medecine', 'type' => 'mixte', 'valide' => 'oui']);
        $this->insert('{{%domaine}}', ['id_domaine' => 22, 'nom' => 'Sciences appliquees', 'type' => 'mixte', 'valide' => 'oui']);
        $this->insert('{{%domaine}}', ['id_domaine' => 23, 'nom' => 'Sciences de la sante', 'type' => 'mixte', 'valide' => 'oui']);
        $this->insert('{{%domaine}}', ['id_domaine' => 24, 'nom' => 'Sciences de l\'administration', 'type' => 'mixte', 'valide' => 'oui']);
        $this->insert('{{%domaine}}', ['id_domaine' => 25, 'nom' => 'Sciences de l\'education', 'type' => 'mixte', 'valide' => 'oui']);
        $this->insert('{{%domaine}}', ['id_domaine' => 26, 'nom' => 'Sciences Humaines', 'type' => 'mixte', 'valide' => 'oui']);
        $this->insert('{{%domaine}}', ['id_domaine' => 27, 'nom' => 'Sciences pures', 'type' => 'mixte', 'valide' => 'oui']);
        $this->insert('{{%domaine}}', ['id_domaine' => 28, 'nom' => 'Sciences juridiques et politiques', 'type' => 'mixte', 'valide' => 'oui']);
        $this->insert('{{%domaine}}', ['id_domaine' => 29, 'nom' => 'Sante et sciences de la sante', 'type' => 'mixte', 'valide' => 'oui']);
        $this->insert('{{%domaine}}', ['id_domaine' => 30, 'nom' => 'Soins esthetiques', 'type' => 'mixte', 'valide' => 'oui']);
        $this->insert('{{%domaine}}', ['id_domaine' => 31, 'nom' => 'Services sociaux,educatifs et juridiques', 'type' => 'mixte', 'valide' => 'oui']);
        $this->insert('{{%domaine}}', ['id_domaine' => 32, 'nom' => 'Sciences ecoomiques et de gestion', 'type' => 'mixte', 'valide' => 'oui']);
        $this->insert('{{%domaine}}', ['id_domaine' => 33, 'nom' => 'Transport', 'type' => 'mixte', 'valide' => 'oui']);
        /* insertion des listes de sous-domaines d'etude */
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 1, 'id_domaine' => 1, 'nom' => 'Art dramatique', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 2, 'id_domaine' => 1, 'nom' => 'Arts graphiques (communication graphique)', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 3, 'id_domaine' => 1, 'nom' => 'Arts plastiques (peinture, dessin, sculpture)', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 4, 'id_domaine' => 1, 'nom' => 'Arts du cirque', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 5, 'id_domaine' => 1, 'nom' => 'Beaux-Arts et Arts appliques', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 6, 'id_domaine' => 1, 'nom' => 'Bijouterie-joaillerie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 7, 'id_domaine' => 1, 'nom' => 'Cinématographie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 8, 'id_domaine' => 1, 'nom' => 'Design applique (céramique, tissage, orfèvrerie, décor)', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 9, 'id_domaine' => 1, 'nom' => 'Danse-interprétation', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 10, 'id_domaine' => 1, 'nom' => 'Décoration intérieure et présentation visuelle', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 11, 'id_domaine' => 1, 'nom' => 'Histoire de l\'art', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 12, 'id_domaine' => 1, 'nom' => 'Interprétation théâtrale', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 13, 'id_domaine' => 1, 'nom' => 'Mouvement expressif, danse, mime, rythmique', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 14, 'id_domaine' => 1, 'nom' => 'Musique', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 15, 'id_domaine' => 1, 'nom' => 'Techniques de métiers d\'art', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 16, 'id_domaine' => 1, 'nom' => 'Techniques de design de présentation', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 17, 'id_domaine' => 1, 'nom' => 'Techniques de design d\'intérieur', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 18, 'id_domaine' => 1, 'nom' => 'Techniques de design industriel', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 19, 'id_domaine' => 1, 'nom' => 'Techniques professionnelles de musique et chanson', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 20, 'id_domaine' => 1, 'nom' => 'Théâtre-Production', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 21, 'id_domaine' => 1, 'nom' => 'photographie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 22, 'id_domaine' => 2, 'nom' => 'comptabilite', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 23, 'id_domaine' => 2, 'nom' => 'secretariat', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 24, 'id_domaine' => 2, 'nom' => 'soutient informatique', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 25, 'id_domaine' => 2, 'nom' => 'vente-conseils', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 26, 'id_domaine' => 3, 'nom' => 'Arboriculture-élagage', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 27, 'id_domaine' => 3, 'nom' => 'Aquiculture', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 28, 'id_domaine' => 3, 'nom' => 'Fleuristerie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 29, 'id_domaine' => 3, 'nom' => 'Gestion et exploitation d\'entreprise agricole', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 30, 'id_domaine' => 3, 'nom' => 'Grandes cultures', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 31, 'id_domaine' => 3, 'nom' => 'Horticultureetjardinerie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 32, 'id_domaine' => 3, 'nom' => 'Paysage et commercialisation en horticulture ornementale', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 33, 'id_domaine' => 3, 'nom' => 'Pêche professionnelle', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 34, 'id_domaine' => 3, 'nom' => 'Production acéricole', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 35, 'id_domaine' => 3, 'nom' => 'Production horticole', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 36, 'id_domaine' => 3, 'nom' => 'Production animale', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 37, 'id_domaine' => 3, 'nom' => 'Techniques d\'aquaculture', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 38, 'id_domaine' => 3, 'nom' => 'Techniques de santé animale', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 39, 'id_domaine' => 3, 'nom' => 'Techniques équines', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 40, 'id_domaine' => 3, 'nom' => 'Technologie de la production horticole et de l\'environnement', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 41, 'id_domaine' => 3, 'nom' => 'Technologie du génie agro mécanique', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 42, 'id_domaine' => 3, 'nom' => 'Technologie des productions animales', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 43, 'id_domaine' => 3, 'nom' => 'Technologie de la transformation des produits aquatiques', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 44, 'id_domaine' => 3, 'nom' => 'Techniques équines', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 45, 'id_domaine' => 3, 'nom' => 'Techniques d\'aquaculture', 'valide' => 'oui']);
        /* sous domaines du domaine alimentation et tourisme */
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 46, 'id_domaine' => 5, 'nom' => 'Boulangerie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 47, 'id_domaine' => 5, 'nom' => 'Boucherie de détail', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 48, 'id_domaine' => 5, 'nom' => 'Cuisine', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 49, 'id_domaine' => 5, 'nom' => 'Gestion d\'un établissement de restauration', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 50, 'id_domaine' => 5, 'nom' => 'Pâtisserie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 51, 'id_domaine' => 5, 'nom' => 'Service de la restauration', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 52, 'id_domaine' => 5, 'nom' => 'Techniques de gestion hôtelière', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 53, 'id_domaine' => 5, 'nom' => 'Techniques de tourisme', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 54, 'id_domaine' => 5, 'nom' => 'Techniques du tourisme d\'aventure', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 55, 'id_domaine' => 5, 'nom' => 'Technologie des procédés et de la qualité des aliments', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 56, 'id_domaine' => 5, 'nom' => 'Vente de voyages', 'valide' => 'oui']);
        /* sous-domaines des Lettres */
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 57, 'id_domaine' => 6, 'nom' => 'Anglais en général et langue maternelle', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 58, 'id_domaine' => 6, 'nom' => 'Français en général et langue maternelle', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 59, 'id_domaine' => 6, 'nom' => 'Français, langue seconde', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 60, 'id_domaine' => 6, 'nom' => 'Humanités gréco-latines et archéologie classique', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 61, 'id_domaine' => 6, 'nom' => 'Langues et littératures françaises ou anglaises', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 62, 'id_domaine' => 6, 'nom' => 'Langues et littératures modernes autres que le français et l\'anglais', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 63, 'id_domaine' => 6, 'nom' => 'Linguistique (phonétique, sémantique, philologie)', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 64, 'id_domaine' => 6, 'nom' => 'Littérature comparée', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 65, 'id_domaine' => 6, 'nom' => 'Traduction', 'valide' => 'oui']);
        /* sous-domaines batiments et travaux publiques */
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 66, 'id_domaine' => 7, 'nom' => 'Arpentage et topographie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 67, 'id_domaine' => 7, 'nom' => 'Briquetage-maçonnerie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 68, 'id_domaine' => 7, 'nom' => 'Calorifugeage', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 69, 'id_domaine' => 7, 'nom' => 'Carrelage', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 70, 'id_domaine' => 7, 'nom' => 'Charpenterie-menuiserie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 71, 'id_domaine' => 7, 'nom' => 'Découpe et transformation du verre', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 72, 'id_domaine' => 7, 'nom' => 'Dessin de bâtiment', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 73, 'id_domaine' => 7, 'nom' => 'Entretien de bâtiments nordiques', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 74, 'id_domaine' => 7, 'nom' => 'Entretien général d\'immeubles', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 75, 'id_domaine' => 7, 'nom' => 'Intervention en sécurité incendie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 76, 'id_domaine' => 7, 'nom' => 'Installation et fabrication de produits verriers', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 77, 'id_domaine' => 7, 'nom' => 'Installation de revêtements souples', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 78, 'id_domaine' => 7, 'nom' => 'Mécanique de machines fixes', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 79, 'id_domaine' => 7, 'nom' => 'Mécanique de protection contre les incendies', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 80, 'id_domaine' => 7, 'nom' => 'Peinture en bâtiment', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 81, 'id_domaine' => 7, 'nom' => 'Plâtrage', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 82, 'id_domaine' => 7, 'nom' => 'Plomberie et chauffage', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 83, 'id_domaine' => 7, 'nom' => 'Pose de revêtements de toiture', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 84, 'id_domaine' => 7, 'nom' => 'Pose de systèmes intérieurs', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 85, 'id_domaine' => 7, 'nom' => 'Préparation et finition de béton', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 86, 'id_domaine' => 7, 'nom' => 'Réfrigération', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 87, 'id_domaine' => 7, 'nom' => 'Réparation d\'appareils au gaz naturel', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 88, 'id_domaine' => 7, 'nom' => 'Techniques de sécurité incendie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 89, 'id_domaine' => 7, 'nom' => 'Technologie de la géomatique', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 90, 'id_domaine' => 7, 'nom' => 'Technologie de la mécanique du bâtiment', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 91, 'id_domaine' => 7, 'nom' => 'Technologie de l\'architecture', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 92, 'id_domaine' => 7, 'nom' => 'Technologie du génie civil', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 93, 'id_domaine' => 7, 'nom' => 'Technologie de l\'estimation et de l\'évaluation en bâtiment', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 94, 'id_domaine' => 7, 'nom' => 'Vente des produits de quincaillerie', 'valide' => 'oui']);
        /* sous domaines Bois et materiaux connexes */
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 95, 'id_domaine' => 8, 'nom' => 'Ébénisterie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 96, 'id_domaine' => 8, 'nom' => 'Finition de meubles', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 97, 'id_domaine' => 8, 'nom' => 'Modelage', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 98, 'id_domaine' => 8, 'nom' => 'Rembourrage artisanal', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 99, 'id_domaine' => 8, 'nom' => 'Rembourrage industriel', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 100, 'id_domaine' => 8, 'nom' => 'Techniques du meuble et d\'ébénisterie', 'valide' => 'oui']);
        /* sous-domaines communication et documentation */
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 101, 'id_domaine' => 9, 'nom' => 'Gestion de projet en communications graphiques', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 102, 'id_domaine' => 9, 'nom' => 'Graphisme', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 103, 'id_domaine' => 9, 'nom' => 'Gestion de projet en communications graphiques', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 104, 'id_domaine' => 9, 'nom' => 'Infographie en pré impression', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 105, 'id_domaine' => 9, 'nom' => 'Infographie en pré média', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 106, 'id_domaine' => 9, 'nom' => 'Dessin animé', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 107, 'id_domaine' => 9, 'nom' => 'Techniques d\'animation 3D et de synthèse d\'images', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 108, 'id_domaine' => 9, 'nom' => 'Techniques de communication dans les médias', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 109, 'id_domaine' => 9, 'nom' => 'Techniques de la documentation', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 110, 'id_domaine' => 9, 'nom' => 'Techniques de l\'impression', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 111, 'id_domaine' => 9, 'nom' => 'Techniques de muséologie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 112, 'id_domaine' => 9, 'nom' => 'Techniques de production et de postproduction télévisuelles', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 113, 'id_domaine' => 9, 'nom' => 'Techniques d\'intégration multimédia', 'valide' => 'oui']);

        /* cuir,textile et habillement */
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 114, 'id_domaine' => 10, 'nom' => 'Commercialisation de la mode', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 115, 'id_domaine' => 10, 'nom' => 'Confection de vêtements (Façon tailleur)', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 116, 'id_domaine' => 10, 'nom' => 'Confection de vêtements et d\'articles de cuir', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 117, 'id_domaine' => 10, 'nom' => 'Confection sur mesure et retouche', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 118, 'id_domaine' => 10, 'nom' => 'Dessin de patron', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 119, 'id_domaine' => 10, 'nom' => 'Design de mode', 'valide' => 'oui']);
        /* electronique */
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 120, 'id_domaine' => 11, 'nom' => 'Installation et entretien de systèmes de sécurité', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 121, 'id_domaine' => 11, 'nom' => 'Installation et réparation d\'équipement de télécommunication', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 122, 'id_domaine' => 11, 'nom' => 'Électromécanique de systèmes automatisés', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 123, 'id_domaine' => 11, 'nom' => 'Montage de lignes électriques', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 124, 'id_domaine' => 11, 'nom' => 'Réparation d\'appareils électroménagers', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 125, 'id_domaine' => 11, 'nom' => 'Réparation d\'appareils électroniques audiovidéos', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 126, 'id_domaine' => 11, 'nom' => 'Service technique d\'équipement bureautique', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 127, 'id_domaine' => 11, 'nom' => 'Techniques d\'avionique', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 128, 'id_domaine' => 11, 'nom' => 'Technologie de l\'électronique', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 129, 'id_domaine' => 11, 'nom' => 'Technologie de l\'électronique industrielle', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 130, 'id_domaine' => 11, 'nom' => 'Technologie de systèmes ordinés', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 131, 'id_domaine' => 11, 'nom' => 'Technologie physique', 'valide' => 'oui']);

        /* electronique d'equipements motorises */
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 132, 'id_domaine' => 12, 'nom' => 'Techniques de maintenance d\'aéronefs', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 133, 'id_domaine' => 12, 'nom' => 'Techniques de génie mécanique de marine', 'valide' => 'oui']);
        /* entretien d'equipemets motorises */
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 134, 'id_domaine' => 13, 'nom' => 'Carrosserie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 135, 'id_domaine' => 13, 'nom' => 'Mécanique agricole', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 136, 'id_domaine' => 13, 'nom' => 'Mécanique automobile', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 137, 'id_domaine' => 13, 'nom' => 'Montage de lignes électriques', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 138, 'id_domaine' => 13, 'nom' => 'Mécanique de véhicules lourds routiers', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 139, 'id_domaine' => 13, 'nom' => 'Mécanique d\'engins de chantier', 'valide' => 'oui']);
        /* Environnement et ammenagement du territoire */
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 140, 'id_domaine' => 14, 'nom' => 'Mécanique marine', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 141, 'id_domaine' => 14, 'nom' => 'Protection et exploitation de territoires fauniques', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 142, 'id_domaine' => 14, 'nom' => 'Service-conseil à la clientèle en équipement motorisé', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 143, 'id_domaine' => 14, 'nom' => 'Techniques de bio écologie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 144, 'id_domaine' => 14, 'nom' => 'Techniques du milieu naturel', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 145, 'id_domaine' => 14, 'nom' => 'Techniques d\'aménagement et d\'urbanisme', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 146, 'id_domaine' => 14, 'nom' => 'Techniques d\'aménagement cynégétique et halieutique', 'valide' => 'oui']);
        /* Fabrication */
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 147, 'id_domaine' => 15, 'nom' => 'Conduite et réglage de machines à mouler', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 148, 'id_domaine' => 15, 'nom' => 'Dessin industriel', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 149, 'id_domaine' => 15, 'nom' => 'Fabrication de moules', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 150, 'id_domaine' => 15, 'nom' => 'Matriçage', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 151, 'id_domaine' => 15, 'nom' => 'Mise en œuvre de matériaux composites', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 152, 'id_domaine' => 15, 'nom' => 'Montage de câbles et de circuits', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 153, 'id_domaine' => 15, 'nom' => 'Montage de structures en aérospatiale', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 154, 'id_domaine' => 15, 'nom' => 'Montage mécanique en aérospatiale', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 155, 'id_domaine' => 15, 'nom' => 'Outillage', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 156, 'id_domaine' => 15, 'nom' => 'Opération d\'équipements de production', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 157, 'id_domaine' => 15, 'nom' => 'Technologie de l\'architecture navale', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 158, 'id_domaine' => 15, 'nom' => 'Techniques de construction aéronautique', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 159, 'id_domaine' => 15, 'nom' => 'Techniques de génie mécanique', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 200, 'id_domaine' => 15, 'nom' => 'Techniques de transformation des matériaux composites', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 201, 'id_domaine' => 15, 'nom' => 'Techniques de transformation des matières plastiques', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 202, 'id_domaine' => 15, 'nom' => 'Technologie du génie industriel', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 203, 'id_domaine' => 15, 'nom' => 'Technologie de la production pharmaceutique', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 204, 'id_domaine' => 15, 'nom' => 'Techniques de construction aéronautique', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 205, 'id_domaine' => 15, 'nom' => 'Techniques d\'usinage', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 206, 'id_domaine' => 15, 'nom' => 'Tôlerie de précision', 'valide' => 'oui']);
        /* Foresterie et papier */
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 207, 'id_domaine' => 16, 'nom' => 'Affûtage', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 208, 'id_domaine' => 16, 'nom' => 'Aménagement de la forêt', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 209, 'id_domaine' => 16, 'nom' => 'Abattage manuel et débardage forestier', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 210, 'id_domaine' => 16, 'nom' => 'Classement des bois débités', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 211, 'id_domaine' => 16, 'nom' => 'Technologie de la transformation des produits forestiers', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 212, 'id_domaine' => 16, 'nom' => 'Technologie forestière', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 213, 'id_domaine' => 16, 'nom' => 'Technologies des pâtes et papiers', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 214, 'id_domaine' => 16, 'nom' => 'Travail sylvicole', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 215, 'id_domaine' => 16, 'nom' => 'Pâtes et papiers – Opérations', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 216, 'id_domaine' => 16, 'nom' => 'Sciage', 'valide' => 'oui']);
        /* informatique */
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 217, 'id_domaine' => 17, 'nom' => 'Calcul scientifique', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 218, 'id_domaine' => 17, 'nom' => 'Data Manning', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 219, 'id_domaine' => 17, 'nom' => 'Genie informatique', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 220, 'id_domaine' => 17, 'nom' => 'Intelligence artificielle', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 221, 'id_domaine' => 17, 'nom' => 'Infographie en pré média', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 222, 'id_domaine' => 17, 'nom' => 'Infographie en pré impression', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 223, 'id_domaine' => 17, 'nom' => 'Information de gestion', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 224, 'id_domaine' => 17, 'nom' => 'Maintenance informatique', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 225, 'id_domaine' => 17, 'nom' => 'Réseaux et applications multimédias', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 226, 'id_domaine' => 17, 'nom' => 'Secrétariat Bureautique', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 227, 'id_domaine' => 17, 'nom' => 'Systèmes et Réseaux', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 228, 'id_domaine' => 17, 'nom' => 'Systèmes D’information', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 229, 'id_domaine' => 17, 'nom' => 'Securite des systemes d\'information', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 230, 'id_domaine' => 17, 'nom' => 'Cyptographie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 231, 'id_domaine' => 17, 'nom' => 'Télécommunications', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 232, 'id_domaine' => 17, 'nom' => 'Technologies de L’Information et de la communication', 'valide' => 'oui']);
        /* mecanique d'entretien */
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 233, 'id_domaine' => 18, 'nom' => 'Fabrication de structures métalliques et de métaux ouvrés', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 234, 'id_domaine' => 18, 'nom' => 'Mécanique d\'ascenseur', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 235, 'id_domaine' => 18, 'nom' => 'Mécanique industrielle de construction et d\'entretien', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 236, 'id_domaine' => 18, 'nom' => 'Serrurerie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 237, 'id_domaine' => 18, 'nom' => 'Technologie de maintenance industrielle', 'valide' => 'oui']);
        /* metallurgie */
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 238, 'id_domaine' => 19, 'nom' => 'Chaudronnerie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 239, 'id_domaine' => 19, 'nom' => 'Fonderie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 240, 'id_domaine' => 19, 'nom' => 'Ferblanterie-tôlerie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 241, 'id_domaine' => 19, 'nom' => 'Montage structural et architectural', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 242, 'id_domaine' => 19, 'nom' => 'Soudage-montage', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 243, 'id_domaine' => 19, 'nom' => 'Technologie du génie métallurgique', 'valide' => 'oui']);
        /* Mines et Travaux de chantier */
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 244, 'id_domaine' => 20, 'nom' => 'Conduite d\'engins de chantier', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 245, 'id_domaine' => 20, 'nom' => 'Conduite d\'engins de chantier nordique', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 246, 'id_domaine' => 20, 'nom' => 'Conduite de machines de traitement du minerai', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 247, 'id_domaine' => 20, 'nom' => 'Extraction de minerai', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 248, 'id_domaine' => 20, 'nom' => 'Forage et dynamitage', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 249, 'id_domaine' => 20, 'nom' => 'Technologie minérale', 'valide' => 'oui']);
        /* medecine */
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 250, 'id_domaine' => 21, 'nom' => 'Biophysique, imagerie médicale et radiothérapie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 251, 'id_domaine' => 21, 'nom' => 'Chirurgie et anesthésie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 252, 'id_domaine' => 21, 'nom' => 'Hématologie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 253, 'id_domaine' => 21, 'nom' => 'Gynécologie obstétrique', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 254, 'id_domaine' => 21, 'nom' => 'Microbiologie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 255, 'id_domaine' => 21, 'nom' => 'Médecine interne', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 256, 'id_domaine' => 21, 'nom' => 'Ophtalmologie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 257, 'id_domaine' => 21, 'nom' => 'ORL-stomatologie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 258, 'id_domaine' => 21, 'nom' => 'pharmacie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 259, 'id_domaine' => 21, 'nom' => 'Parasitologie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 260, 'id_domaine' => 21, 'nom' => 'Pédiatrie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 261, 'id_domaine' => 21, 'nom' => 'Sante publique', 'valide' => 'oui']);
        /* sciences appliquees */
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 262, 'id_domaine' => 22, 'nom' => 'Agriculture', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 263, 'id_domaine' => 22, 'nom' => 'Ingenieurie', 'valide' => 'oui']);
        /* sciences de la sante */
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 264, 'id_domaine' => 23, 'nom' => 'Chiropratique', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 265, 'id_domaine' => 23, 'nom' => 'Diététique et nutrition', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 266, 'id_domaine' => 23, 'nom' => 'Ergothérapie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 267, 'id_domaine' => 23, 'nom' => 'Médecine vétérinaire', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 268, 'id_domaine' => 23, 'nom' => 'Médecine dentaire', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 269, 'id_domaine' => 23, 'nom' => 'Médecine Générale', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 270, 'id_domaine' => 23, 'nom' => 'Médecine et chirurgie expérimentales', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 271, 'id_domaine' => 23, 'nom' => 'Optométrie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 272, 'id_domaine' => 23, 'nom' => 'Orthophonie et audiologie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 273, 'id_domaine' => 23, 'nom' => 'Pharmacie et sciences pharmaceutiques', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 274, 'id_domaine' => 23, 'nom' => 'Sciences infirmières et nursing', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 275, 'id_domaine' => 23, 'nom' => 'Sciences fondamentales et sciences appliquées de la santé', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 276, 'id_domaine' => 23, 'nom' => 'Santé communautaire et épidémiologie', 'valide' => 'oui']);
        /* sciences de l'administration */
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 277, 'id_domaine' => 24, 'nom' => 'Administration scolaire', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 278, 'id_domaine' => 24, 'nom' => 'Administration publique', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 279, 'id_domaine' => 24, 'nom' => 'Affaires sur le plan international', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 280, 'id_domaine' => 24, 'nom' => 'Administration des affaires', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 281, 'id_domaine' => 24, 'nom' => 'Bibliothéconomie et archivistique', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 282, 'id_domaine' => 24, 'nom' => 'Comptabilité et sciences comptables', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 283, 'id_domaine' => 24, 'nom' => 'Gestion de la production', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 284, 'id_domaine' => 24, 'nom' => 'Gestion du personnel', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 285, 'id_domaine' => 24, 'nom' => 'Gestion et administration des entreprises', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 286, 'id_domaine' => 24, 'nom' => 'Gestion des services de santé', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 287, 'id_domaine' => 24, 'nom' => 'Marketing et achats', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 288, 'id_domaine' => 24, 'nom' => 'Opérations bancaires et finance', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 289, 'id_domaine' => 24, 'nom' => 'Relations industrielles', 'valide' => 'oui']);
        /**/
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 290, 'id_domaine' => 25, 'nom' => 'Didactique (art d\'enseigner)', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 291, 'id_domaine' => 25, 'nom' => 'Éducation des adultes et formation permanente', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 292, 'id_domaine' => 25, 'nom' => 'Formation des enseignants au préscolaire', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 293, 'id_domaine' => 25, 'nom' => 'Formation des enseignants au préscolaire et au primaire', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 294, 'id_domaine' => 25, 'nom' => 'Formation des enseignants au secondaire', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 295, 'id_domaine' => 25, 'nom' => 'Formation des enseignants de l\'enseignement professionnel au secondaire et au Collégial', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 296, 'id_domaine' => 25, 'nom' => 'Formation des enseignants spécialistes au primaire et au secondaire', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 297, 'id_domaine' => 25, 'nom' => 'Formation des enseignants spécialistes en adaptation scolaire (orthopédagogie)', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 298, 'id_domaine' => 25, 'nom' => 'Pédagogie universitaire', 'valide' => 'oui']);
        /* Sciences humaines */
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 299, 'id_domaine' => 26, 'nom' => 'Anthropologie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 300, 'id_domaine' => 26, 'nom' => 'Animation sociale ou communautaire', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 301, 'id_domaine' => 26, 'nom' => 'Actuariat', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 302, 'id_domaine' => 26, 'nom' => 'Communications et journalisme', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 303, 'id_domaine' => 26, 'nom' => 'Criminologie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 304, 'id_domaine' => 26, 'nom' => 'Démographie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 305, 'id_domaine' => 26, 'nom' => 'Économie rurale et agricole', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 306, 'id_domaine' => 26, 'nom' => 'Ethnologie et ethnographie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 307, 'id_domaine' => 26, 'nom' => 'Économie rurale et agricole', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 308, 'id_domaine' => 26, 'nom' => 'Études urbaines', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 309, 'id_domaine' => 26, 'nom' => 'Études géopolitiques', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 310, 'id_domaine' => 26, 'nom' => 'Géographie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 311, 'id_domaine' => 26, 'nom' => 'Histoire', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 312, 'id_domaine' => 26, 'nom' => 'Orientation, information scolaire et professionnelle', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 313, 'id_domaine' => 26, 'nom' => 'Philosophie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 314, 'id_domaine' => 26, 'nom' => 'Psychologie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 315, 'id_domaine' => 26, 'nom' => 'Psychoéducation', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 316, 'id_domaine' => 26, 'nom' => 'Récréologie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 317, 'id_domaine' => 26, 'nom' => 'Sciences politiques', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 318, 'id_domaine' => 26, 'nom' => 'Sciences religieuses', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 319, 'id_domaine' => 26, 'nom' => 'Sciences sociales', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 320, 'id_domaine' => 26, 'nom' => 'Sciences sociales et humanités', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 321, 'id_domaine' => 26, 'nom' => 'Service social', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 322, 'id_domaine' => 26, 'nom' => 'Sexologie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 323, 'id_domaine' => 26, 'nom' => 'Sociologie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 324, 'id_domaine' => 26, 'nom' => 'Sciences domestiques', 'valide' => 'oui']);
        /*sciences pures*/
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 325, 'id_domaine' => 27, 'nom' => 'Biologie des organismes végétaux', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 326, 'id_domaine' => 27, 'nom' => 'Biologie des organismes animaux', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 327, 'id_domaine' => 27, 'nom' => 'Biochimie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 328, 'id_domaine' => 27, 'nom' => 'Biophysique', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 329, 'id_domaine' => 27, 'nom' => 'Chimie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 330, 'id_domaine' => 27, 'nom' => 'Énergie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 331, 'id_domaine' => 27, 'nom' => 'Génétique', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 332, 'id_domaine' => 27, 'nom' => 'Géologie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 333, 'id_domaine' => 27, 'nom' => 'Geographie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 334, 'id_domaine' => 27, 'nom' => 'Hydrologie et sciences de l\'eau', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 335, 'id_domaine' => 27, 'nom' => 'Mathématiques', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 336, 'id_domaine' => 27, 'nom' => 'Météorologie et sciences de l\'atmosphère', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 337, 'id_domaine' => 27, 'nom' => 'Microbiologie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 338, 'id_domaine' => 27, 'nom' => 'Océanographie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 339, 'id_domaine' => 27, 'nom' => 'Probabilités et statistiques', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 340, 'id_domaine' => 27, 'nom' => 'Sciences physiques', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 341, 'id_domaine' => 27, 'nom' => 'Science de la terre et de l’univers', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 342, 'id_domaine' => 27, 'nom' => 'Zoologie', 'valide' => 'oui']);
        /*sciences juridiques*/
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 343, 'id_domaine' => 28, 'nom' => 'Droit prive fondamental', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 344, 'id_domaine' => 28, 'nom' => 'Droit des affaires', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 345, 'id_domaine' => 28, 'nom' => 'Droit prive Francophone', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 346, 'id_domaine' => 28, 'nom' => 'Droit prive Anglophone', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 347, 'id_domaine' => 28, 'nom' => 'Droit public interne', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 348, 'id_domaine' => 28, 'nom' => 'Droit public International et droit communautaire', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 349, 'id_domaine' => 28, 'nom' => 'Droit d’inspiration Common Law', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 350, 'id_domaine' => 28, 'nom' => 'Droit public', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 351, 'id_domaine' => 28, 'nom' => 'Droit de la propriété intellectuelle', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 352, 'id_domaine' => 28, 'nom' => 'Droit pénal et sciences criminelles', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 353, 'id_domaine' => 28, 'nom' => 'Droit public international', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 354, 'id_domaine' => 28, 'nom' => 'Droit en affaires internationales et fiscalités', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 355, 'id_domaine' => 28, 'nom' => 'Probabilités et statistiques', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 356, 'id_domaine' => 28, 'nom' => 'Sciences physiques', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 357, 'id_domaine' => 28, 'nom' => 'Science de la terre et de l’univers', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 358, 'id_domaine' => 28, 'nom' => 'Zoologie', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 359, 'id_domaine' => 28, 'nom' => 'Probabilités et statistiques', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 360, 'id_domaine' => 28, 'nom' => 'Sciences physiques', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 361, 'id_domaine' => 28, 'nom' => 'Science de la terre et de l’univers', 'valide' => 'oui']);
        $this->insert('{{%sous_domaine}}', [ 'id_sous_dom' => 362, 'id_domaine' => 28, 'nom' => 'Zoologie', 'valide' => 'oui']);
        
    }

    public function down() {
        echo "m160423_214311_liste_domaines cannot be reverted.\n";

        return false;
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
