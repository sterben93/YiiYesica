<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\redesSocialesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Redes Sociales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="redes-sociales-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Redes Sociales', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_red_social',
            'tipo',
            'cuenta',
            'id_persona',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
