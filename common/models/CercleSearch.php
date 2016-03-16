<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Cercle;

/**
 * CercleSearch represents the model behind the search form about `common\models\Cercle`.
 */
class CercleSearch extends Cercle
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cercle', 'id_createur', 'id_supp'], 'integer'],
            [['nom', 'type', 'date_creation'], 'safe'],
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
        $query = Cercle::find();

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
            'id_cercle' => $this->id_cercle,
            'id_createur' => $this->id_createur,
            'id_supp' => $this->id_supp,
            'date_creation' => $this->date_creation,
        ]);

        $query->andFilterWhere(['like', 'nom', $this->nom])
            ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }
}
