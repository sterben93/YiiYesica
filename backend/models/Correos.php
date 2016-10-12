<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "correos".
 *
 * @property integer $id_correo
 * @property string $tipo
 * @property string $cuenta
 * @property integer $id_persona
 *
 * @property Personas $idPersona
 */
class Correos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'correos';
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
            [['id_persona'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['id_persona' => 'id_personas']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_correo' => 'Id Correo',
            'tipo' => 'Tipo',
            'cuenta' => 'Cuenta',
            'id_persona' => 'Id Persona',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPersona()
    {
        return $this->hasOne(Personas::className(), ['id_personas' => 'id_persona']);
    }
}
