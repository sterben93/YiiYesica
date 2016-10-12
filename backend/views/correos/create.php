<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Correos */

$this->title = 'Create Correos';
$this->params['breadcrumbs'][] = ['label' => 'Correos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="correos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
