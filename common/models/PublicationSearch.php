<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Publication;

/**
 * PublicationSearch represents the model behind the search form about `common\models\Publication`.
 */
class PublicationSearch extends Publication
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_publ', 'id_auteur'], 'integer'],
            [['contenu', 'date_post'], 'safe'],
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
        $query = Publication::find();

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
            'id_publ' => $this->id_publ,
            'id_auteur' => $this->id_auteur,
            'date_post' => $this->date_post,
        ]);

        $query->andFilterWhere(['like', 'contenu', $this->contenu]);

        return $dataProvider;
    }
}
