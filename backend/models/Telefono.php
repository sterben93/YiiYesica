<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Telefono".
 *
 * @property integer $id_telefono
 * @property string $contacto
 * @property string $typo_telefono
 * @property integer $id_persona
 *
 * @property Personas $idPersona
 */
class Telefono extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Telefono';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contacto', 'typo_telefono', 'id_persona'], 'required'],
            [['typo_telefono'], 'string'],
            [['id_persona'], 'integer'],
            [['contacto'], 'string', 'max' => 100],
            [['id_persona'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['id_persona' => 'id_personas']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_telefono' => 'Id Telefono',
            'contacto' => 'Contacto',
            'typo_telefono' => 'Typo Telefono',
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
