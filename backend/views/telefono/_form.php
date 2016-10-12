<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Telefono */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="telefono-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'contacto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'typo_telefono')->dropDownList([ 'casa' => 'Casa', 'movil' => 'Movil', 'oficina' => 'Oficina', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'id_persona')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
