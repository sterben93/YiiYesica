<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\redesSocialesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="redes-sociales-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_red_social') ?>

    <?= $form->field($model, 'tipo') ?>

    <?= $form->field($model, 'cuenta') ?>

    <?= $form->field($model, 'id_persona') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
