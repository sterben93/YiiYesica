<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "companies".
 *
 * @property integer $company_id
 * @property string $company_name
 * @property string $company_email
 * @property string $company_address
 * @property string $company_create_date
 * @property string $company_status
 * @property string $company_start_date
 * @property string $company_logo
 *
 * @property Branches[] $branches
 * @property Departments[] $departments
 */
class Companies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;

    public static function tableName()
    {
        return 'companies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_name', 'company_email', 'company_address', 'company_create_date', 'company_status', 'company_start_date'], 'required'],
            [['company_create_date', 'company_start_date'], 'safe'],
            ['company_start_date', 'checkDate'],
            [['company_status'], 'string'],
            [['company_name', 'company_email'], 'string', 'max' => 100],
            [['company_address'], 'string', 'max' => 255],
            [['company_logo'], 'string', 'max' => 500],
            [['file'],'file']
        ];
    }

    public function checkDate($attribute, $params)
    {
        $today = date('y-m-d');
        $selectedDate = date($this->company_start_date);
        if($selectedDate > $today){
            $this->addError($attribute, 'Company Start Date Must be smaller');
        }
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'Company ID',
            'company_name' => 'Company Name',
            'company_email' => 'Company Email',
            'company_address' => 'Company Address',
            'company_create_date' => 'Company Create Date',
            'company_status' => 'Company Status',
            'company_start_date' => 'Company Start Date',
            'file'=>'Company Logo'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBranches()
    {
        return $this->hasMany(Branches::className(), ['companies_company_id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Departments::className(), ['companies_company_id' => 'company_id']);
    }
}
