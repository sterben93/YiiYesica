<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\Companies;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model backend\models\Branches */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="branches-form">

    <?php 
        $form = \yii\widgets\ActiveForm::begin(['options'=>['entyce'=>'multipart/form-data']]);
    ?>

    <?php
    /* 
        echo $form->field($model, 'companies_company_id')
        ->dropDownList(
            \yii\helpers\ArrayHelper::map(
                \backend\models\Companies::find()->all(),
                'company_id', 'company_name'
            ),
            ['prompt' => 'Select Company']);
    */
    ?>

    <?=
        $form->field($model, 'companies_company_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(\backend\models\Companies::find()->all(),
                'company_id', 'company_name'
            ),
            'language' => 'es',
            'options' => ['placeholder' => 'Select a state ...'],
            'pluginOptions' => [
            'allowClear' => true
            ],
        ]);
    ?>

    <?php 
        echo $form->field($model, 'branch_name')->textInput(['maxlength' => true]);
    ?>

    <?php 
        echo $form->field($model, 'branch_address')->textInput(['maxlength' => true]);
    ?>

    <?php 
        echo $form->field($model, 'branch_status')->dropDownList(
            ['active' => 'Active', 'inactive' => 'Inactive'],
            ['prompt' => 'Status']
        );
    ?>

    <div class="form-group">
        <?php 
            echo \yii\helpers\Html::submitButton($model->isNewRecord ? 'Create' : 'Update',
                ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
             );
    ?>
    </div>

    <?php 
        \yii\widgets\ActiveForm::end();
    ?>

</div>

<?php
    $script = "
    $('form#{model->formName()}').on('beforeSubmit', function(e){
        var \$form =$(this);
        $.post(
            \$form.attr('action'),
            \$form.serialize()
        ).done(function(result){
            if(result == 1){
                $(\$form).trigger('reset');
                $.pjax.reload({container:'#branchesGrid'});
            }else{
                $('#menssage').html(result);
            }
        }).fail(function(){
            console.log('server error');
        });
        return false;
    });";
    $this->registerJs($script);
?>