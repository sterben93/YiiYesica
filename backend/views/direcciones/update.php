<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Direcciones */

$this->title = 'Update Direcciones: ' . $model->id_Direccion;
$this->params['breadcrumbs'][] = ['label' => 'Direcciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_Direccion, 'url' => ['view', 'id' => $model->id_Direccion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="direcciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
