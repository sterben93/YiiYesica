<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Redes_Sociales".
 *
 * @property integer $id_red_social
 * @property string $tipo
 * @property string $cuenta
 * @property integer $id_persona
 */
class RedesSociales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Redes_Sociales';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo', 'cuenta', 'id_persona'], 'required'],
            [['tipo'], 'string'],
            [['id_persona'], 'integer'],
            [['cuenta'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_red_social' => 'Id Red Social',
            'tipo' => 'Tipo de Cuenta',
            'cuenta' => 'Usuario',
            'id_persona' => 'Id Persona',
        ];
    }
}
