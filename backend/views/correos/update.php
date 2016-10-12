<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Correos */

$this->title = 'Update Correos: ' . $model->id_correo;
$this->params['breadcrumbs'][] = ['label' => 'Correos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_correo, 'url' => ['view', 'id' => $model->id_correo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="correos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
