<?php
use wbraganca\dynamicform\DynamicFormWidget;
?>
<div class="row">
        <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i>Direcciones</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-direccion', // required: css class selector
                'widgetItem' => '.item-direccion', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-direccion', // css class
                'deleteButton' => '.remove-direccion', // css class
                'model' => $modelsDireccion[0],
                'formId' => 'form-persona',
                'formFields' => [
                    'Calle',
                    'Colonia',
                    'Codigo_postal',
                    'Tipo'
                ],
            ]); ?>
 
            <div class="container-direccion"><!-- widgetContainer -->
            <?php foreach ($modelsDireccion as $i => $modelDireccion): ?>
                <div class="item-direccion panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Direccion</h3>
                        <div class="pull-right">
                            <button type="button" class="add-direccion btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-direccion btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelDireccion->isNewRecord){  
                                echo Html::activeHiddenInput($modelDireccion, "[{$i}]id_Direccion");
                            }
                        ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelDireccion, "[{$i}]calle")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelDireccion, "[{$i}]colonia")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- .row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelDireccion, "[{$i}]codigo_postal")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelDireccion, "[{$i}]tipo")->dropDownList([ 'casa' => 'Casa', 'oficina' => 'Oficina', 'negocio' => 'Negocio', ], ['prompt' => 'Tipo de Domicilio']) ?>
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