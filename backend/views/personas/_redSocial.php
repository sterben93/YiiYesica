<?php
use wbraganca\dynamicform\DynamicFormWidget;
?>
<div class="row">
        <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i>Redes Sociales</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-red', // required: css class selector
                'widgetItem' => '.item-red', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-red', // css class
                'deleteButton' => '.remove-red', // css class
                'model' => $modelsRedesSociales[0],
                'formId' => 'form-persona',
                'formFields' => [
                    'tipo',
                    'cuenta',
                ],
            ]); ?>
 
            <div class="container-red"><!-- widgetContainer -->
            <?php foreach ($modelsRedesSociales as $i => $modelRedesSociales): ?>
                <div class="item-red panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Red Social</h3>
                        <div class="pull-right">
                            <button type="button" class="add-red btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-red btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelRedesSociales->isNewRecord){  
                                echo Html::activeHiddenInput($modelRedesSociales, "[{$i}]$id_red_social");
                            }
                        ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelRedesSociales, "[{$i}]tipo")->dropDownList([ 'Facebook' => 'Facebook', 'Gmail' => 'Gmail', 'GitHub' => 'GitHub', 'Instagram' => 'Instagram', ], ['prompt' => 'Red Social']) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelRedesSociales, "[{$i}]cuenta")->textInput(['maxlength' => true]) ?>
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