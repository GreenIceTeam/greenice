<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CommLierSousDom;

/**
 * CommLierSousDomSearch represents the model behind the search form about `common\models\CommLierSousDom`.
 */
class CommLierSousDomSearch extends CommLierSousDom
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_sous_dom', 'id_comm'], 'integer'],
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
        $query = CommLierSousDom::find();

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
            'id_sous_dom' => $this->id_sous_dom,
            'id_comm' => $this->id_comm,
        ]);

        return $dataProvider;
    }
}
