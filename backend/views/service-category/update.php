<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ServiceCategory */

$this->title = 'Изменить категории услуг: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Изменить категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="service-category-update container box">

    <br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
