<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model backend\models\Personas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personas-form">

    <?php $form = ActiveForm::begin(['id' => 'form-persona']); ?>

    <?= $form->field($model, 'nombre_persona')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ap_pat_persona')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ap_mat_persona')->textInput(['maxlength' => true]) ?>
    
    <?= $this->render('_telefono', [
        'form' => $form,
        'modelsTelefono' => $modelsTelefono,
    ]) ?>

    <?= $this->render('_correo', [
        'form' => $form,
        'modelsCorreo'=> $modelsCorreo,
    ]) ?>

    <?= $this->render('_direccion', [
        'form' => $form,
        'modelsDireccion'=> $modelsDireccion,
    ]) ?>

    <?= $this->render('_redSocial', [
        'form' => $form,
        'modelsRedesSociales'=> $modelsRedesSociales,
    ]) ?>

    <?= \himiklab\yii2\recaptcha\ReCaptcha::widget([
        'name' => 'reCaptcha',
        'siteKey' => '6LfzIgkUAAAAAPyojLSm_IxM6MPfRSDn55yaE-HJ',
        'widgetOptions' => ['class' => 'col-sm-offset-3']
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
