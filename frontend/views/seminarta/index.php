<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SeminarTASearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Seminar Tas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seminar-ta-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Seminar Ta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'tanggal',
            'judul',
            'pembimbing',
            'tempat',
            // 'mahasiswa_nim',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
