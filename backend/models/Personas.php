<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Personas".
 *
 * @property integer $id_personas
 * @property string $nombre_persona
 * @property string $ap_pat_persona
 * @property string $ap_mat_persona
 *
 * @property Direcciones[] $direcciones
 * @property Telefono[] $telefonos
 * @property Correos[] $correos
 */
class Personas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Personas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_persona', 'ap_pat_persona', 'ap_mat_persona'], 'required'],
            [['nombre_persona', 'ap_pat_persona', 'ap_mat_persona'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_personas' => 'Id Personas',
            'nombre_persona' => 'Nombre Persona',
            'ap_pat_persona' => 'Ap Pat Persona',
            'ap_mat_persona' => 'Ap Mat Persona',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDirecciones()
    {
        return $this->hasMany(Direcciones::className(), ['id_persona' => 'id_personas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTelefonos()
    {
        return $this->hasMany(Telefono::className(), ['id_persona' => 'id_personas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCorreos()
    {
        return $this->hasMany(Correos::className(), ['id_persona' => 'id_personas']);
    }
}
