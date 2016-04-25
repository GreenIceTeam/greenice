<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Fichier;

/**
 * FichierSearch represents the model behind the search form about `common\models\Fichier`.
 */
class FichierSearch extends Fichier
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_fichier', 'id_user'], 'integer'],
            [['nom', 'statut'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Fichier::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_fichier' => $this->id_fichier,
            'id_user' => $this->id_user,
        ]);

        $query->andFilterWhere(['like', 'nom', $this->nom])
            ->andFilterWhere(['like', 'statut', $this->statut]);

        return $dataProvider;
    }
}
