<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Departments;

/**
 * DepartmentsSeacrh represents the model behind the search form about `backend\models\Departments`.
 */
class DepartmentsSeacrh extends Departments
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['department_id'], 'integer'],
            [['department_name',
             'department_create_date',
             'department_status', 
             'branches_branch_id', 
             'companies_company_id'], 'safe'],
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
        $query = Departments::find();

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
        $query->joinWith('branchesBranch');
        $query->joinWith('companiesCompany');
    
        $query->andFilterWhere([
            'department_id' => $this->department_id,
            'department_create_date' => $this->department_create_date,
        ]);

        $query->andFilterWhere(['like', 'department_name', $this->department_name])
            ->andFilterWhere(['like', 'department_status', $this->department_status])
                ->andFilterWhere(['like', 'branches.branch_name', $this->branches_branch_id])
                ->andFilterWhere(['like', 'companies.company_name', $this->companies_company_id,]);

        return $dataProvider;
    }
}
