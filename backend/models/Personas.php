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
    public $reCaptcha;
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
            [['id_personas'],'integer'],
            [['nombre_persona', 'ap_pat_persona', 'ap_mat_persona'], 'string', 'max' => 50],
            [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator::className(), 'secret' => '6LfzIgkUAAAAAP3ei6D2VwE4pePA-ZGH8yMAkC0_']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_personas' => 'Id Personas',
            'nombre_persona' => 'Tu Nombre',
            'ap_pat_persona' => 'Primer Apellido',
            'ap_mat_persona' => 'Segundo Apellido',
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
