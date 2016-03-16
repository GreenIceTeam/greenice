<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Critique;

/**
 * CritiqueSearch represents the model behind the search form about `common\models\Critique`.
 */
class CritiqueSearch extends Critique
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_critique', 'id_auteur'], 'integer'],
            [['contenu', 'date'], 'safe'],
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
        $query = Critique::find();

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
            'id_critique' => $this->id_critique,
            'id_auteur' => $this->id_auteur,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'contenu', $this->contenu]);

        return $dataProvider;
    }
}
