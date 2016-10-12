<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DireccionesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="direcciones-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_Direccion') ?>

    <?= $form->field($model, 'calle') ?>

    <?= $form->field($model, 'colonia') ?>

    <?= $form->field($model, 'codigo_postal') ?>

    <?= $form->field($model, 'tipo') ?>

    <?php // echo $form->field($model, 'id_persona') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
