<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Commentaire;

/**
 * CommentaireSearch represents the model behind the search form about `common\models\Commentaire`.
 */
class CommentaireSearch extends Commentaire
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_comment', 'id_auteur', 'id_publ'], 'integer'],
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
        $query = Commentaire::find();

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
            'id_comment' => $this->id_comment,
            'id_auteur' => $this->id_auteur,
            'id_publ' => $this->id_publ,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'contenu', $this->contenu]);

        return $dataProvider;
    }
}
