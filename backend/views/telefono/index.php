<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\telefonoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Telefonos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="telefono-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Telefono', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_telefono',
            'contacto',
            'typo_telefono',
            'id_persona',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
