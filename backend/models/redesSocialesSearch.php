<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\RedesSociales;

/**
 * redesSocialesSearch represents the model behind the search form about `backend\models\RedesSociales`.
 */
class redesSocialesSearch extends RedesSociales
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_red_social', 'id_persona'], 'integer'],
            [['tipo', 'cuenta'], 'safe'],
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
        $query = RedesSociales::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_red_social' => $this->id_red_social,
            'id_persona' => $this->id_persona,
        ]);

        $query->andFilterWhere(['like', 'tipo', $this->tipo])
            ->andFilterWhere(['like', 'cuenta', $this->cuenta]);

        return $dataProvider;
    }
}
