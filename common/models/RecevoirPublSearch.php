<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\RecevoirPubl;

/**
 * RecevoirPublSearch represents the model behind the search form about `common\models\RecevoirPubl`.
 */
class RecevoirPublSearch extends RecevoirPubl
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_publ'], 'integer'],
            [['affiche'], 'safe'],
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
        $query = RecevoirPubl::find();

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
            'id_user' => $this->id_user,
            'id_publ' => $this->id_publ,
        ]);

        $query->andFilterWhere(['like', 'affiche', $this->affiche]);

        return $dataProvider;
    }
}
