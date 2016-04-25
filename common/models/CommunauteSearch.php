<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Communaute;

/**
 * CommunauteSearch represents the model behind the search form about `common\models\Communaute`.
 */
class CommunauteSearch extends Communaute
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_comm', 'id_createur', 'id_supp'], 'integer'],
            [['nom', 'type'], 'safe'],
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
        $query = Communaute::find();

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
            'id_comm' => $this->id_comm,
            'id_createur' => $this->id_createur,
            'id_supp' => $this->id_supp,
        ]);

        $query->andFilterWhere(['like', 'nom', $this->nom])
            ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }
}
