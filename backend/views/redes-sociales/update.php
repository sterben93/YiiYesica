<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RedesSociales */

$this->title = 'Update Redes Sociales: ' . $model->id_red_social;
$this->params['breadcrumbs'][] = ['label' => 'Redes Sociales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_red_social, 'url' => ['view', 'id' => $model->id_red_social]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="redes-sociales-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
