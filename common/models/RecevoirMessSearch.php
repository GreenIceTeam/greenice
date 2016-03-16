<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\RecevoirMess;

/**
 * RecevoirMessSearch represents the model behind the search form about `common\models\RecevoirMess`.
 */
class RecevoirMessSearch extends RecevoirMess
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_dest', 'id_mess'], 'integer'],
            [['affiche', 'lu'], 'safe'],
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
        $query = RecevoirMess::find();

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
            'id_dest' => $this->id_dest,
            'id_mess' => $this->id_mess,
        ]);

        $query->andFilterWhere(['like', 'affiche', $this->affiche])
            ->andFilterWhere(['like', 'lu', $this->lu]);

        return $dataProvider;
    }
}
