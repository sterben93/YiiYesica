<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Telefono;

/**
 * telefonoSearch represents the model behind the search form about `backend\models\Telefono`.
 */
class telefonoSearch extends Telefono
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_telefono', 'id_persona'], 'integer'],
            [['contacto', 'typo_telefono'], 'safe'],
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
        $query = Telefono::find();

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
            'id_telefono' => $this->id_telefono,
            'id_persona' => $this->id_persona,
        ]);

        $query->andFilterWhere(['like', 'contacto', $this->contacto])
            ->andFilterWhere(['like', 'typo_telefono', $this->typo_telefono]);

        return $dataProvider;
    }
}
