<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Direcciones".
 *
 * @property integer $id_Direccion
 * @property string $calle
 * @property string $colonia
 * @property integer $codigo_postal
 * @property string $tipo
 * @property integer $id_persona
 *
 * @property Personas $idPersona
 */
class Direcciones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Direcciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['calle', 'colonia', 'codigo_postal', 'tipo', 'id_persona'], 'required'],
            [['codigo_postal', 'id_persona'], 'integer'],
            [['tipo'], 'string'],
            [['calle', 'colonia'], 'string', 'max' => 100],
            [['id_persona'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['id_persona' => 'id_personas']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_Direccion' => 'Id  Direccion',
            'calle' => 'Calle',
            'colonia' => 'Colonia',
            'codigo_postal' => 'Codigo Postal',
            'tipo' => 'Tipo',
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
