<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\RombonganBelajar */

$this->title = 'Create Rombongan Belajar';
$this->params['breadcrumbs'][] = ['label' => 'Rombongan Belajars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rombongan-belajar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
