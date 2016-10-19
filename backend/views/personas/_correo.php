<?php
use wbraganca\dynamicform\DynamicFormWidget;
?>
<div class="row">
        <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i>Correos</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-correo', // required: css class selector
                'widgetItem' => '.item-correo', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-correo', // css class
                'deleteButton' => '.remove-correo', // css class
                'model' => $modelsCorreo[0],
                'formId' => 'form-persona',
                'formFields' => [
                    'Tipo',
                    'Cuenta',
                ],
            ]); ?>

            <div class="container-correo"><!-- widgetContainer -->
            <?php foreach ($modelsCorreo as $i => $modelCorreo): ?>
                <div class="item-correo panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Correo</h3>
                        <div class="pull-right">
                            <button type="button" class="add-correo btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-correo btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelCorreo->isNewRecord){  
                                echo Html::activeHiddenInput($modelCorreo, "[{$i}]id_correo");
                            }
                        ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelCorreo, "[{$i}]tipo")->dropDownList([ 'personal' => 'Personal', 'oficina' => 'Oficina', ], ['prompt' => '']) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelCorreo, "[{$i}]cuenta")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>
    </div>