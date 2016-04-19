<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Domaine;

/**
 * DomaineSearch represents the model behind the search form about `common\models\Domaine`.
 */
class DomaineSearch extends Domaine
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_domaine'], 'integer'],
            [['nom', 'type', 'valide'], 'safe'],
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
        $query = Domaine::find();

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
            'id_domaine' => $this->id_domaine,
        ]);

        $query->andFilterWhere(['like', 'nom', $this->nom])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'valide', $this->valide]);

        return $dataProvider;
    }
}
