<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Correos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="correos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo')->dropDownList([ 'personal' => 'Personal', 'oficina' => 'Oficina', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'cuenta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_persona')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
