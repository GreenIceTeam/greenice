<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\FichierAssocPubl;

/**
 * FichierAssocPublSearch represents the model behind the search form about `common\models\FichierAssocPubl`.
 */
class FichierAssocPublSearch extends FichierAssocPubl
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_fichier', 'id_publ'], 'integer'],
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
        $query = FichierAssocPubl::find();

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
            'id_publ' => $this->id_publ,
        ]);

        return $dataProvider;
    }
}
